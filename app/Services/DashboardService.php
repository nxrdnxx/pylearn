<?php

namespace App\Services;

use App\Models\User;
use App\Models\Level;
use App\Models\Question;
use App\Models\UserAnswer;
use App\Models\UserBadge;
use App\Models\Badge;
use App\Services\DailyQuestService;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardService
{
    public static function getDashboardData($user)
    {
        $userId = $user->id;

        // ================= XP & RANK =================
        $xp = $user->xp;
        $rank = User::where('xp', '>', $xp)->count() + 1;

        // ================= LEVELS & PROGRESS (Optimized) =================
        $levels = Level::orderBy('order_number')->get();
        
        // Get question counts per level
        $questionCounts = Question::select('level_id', DB::raw('count(*) as total'))
            ->groupBy('level_id')
            ->pluck('total', 'level_id');

        // Get answered counts per level for this user
        $answeredCounts = UserAnswer::where('user_id', $userId)
            ->where('is_correct', true)
            ->join('questions', 'user_answers.question_id', '=', 'questions.id')
            ->select('questions.level_id', DB::raw('count(distinct questions.id) as answered'))
            ->groupBy('questions.level_id')
            ->pluck('answered', 'level_id');

        $completedLevel = 0;
        $currentLevel = null;
        $currentProgress = 0;
        $currentAnswered = 0;
        $currentTotal = 0;

        foreach ($levels as $level) {
            $total = $questionCounts[$level->id] ?? 0;
            $answered = $answeredCounts[$level->id] ?? 0;

            if ($total > 0 && $answered >= $total) {
                $completedLevel++;
            } elseif (!$currentLevel) {
                $currentLevel = $level;
                $currentAnswered = $answered;
                $currentTotal = $total;
                $currentProgress = $total > 0 ? ($answered / $total) * 100 : 0;
            }
        }

        if ($completedLevel == $levels->count()) {
            $currentProgress = 100;
        }

        // ================= BADGES =================
        $badgeCount = UserBadge::where('user_id', $userId)->count();
        $recentBadges = UserBadge::with('badge')
            ->where('user_id', $userId)
            ->orderByDesc('id')
            ->take(4)
            ->get();

        // ================= STREAK =================
        $streak = $user->login_streak ?? 0;

        // ================= LEADERBOARD =================
        $topUsers = User::orderByDesc('xp')
            ->take(5)
            ->get();


        // ================= RECENT ACTIVITIES (Optimized) =================
        $recentActivities = collect();

        // Get recent level completions
        $recentLevelAnswers = UserAnswer::where('user_id', $userId)
            ->where('is_correct', true)
            ->join('questions', 'user_answers.question_id', '=', 'questions.id')
            ->join('levels', 'questions.level_id', '=', 'levels.id')
            ->select('user_answers.created_at', 'levels.id as level_id', 'levels.name as level_name', 'levels.order_number')
            ->orderByDesc('user_answers.created_at')
            ->get()
            ->unique('level_id')
            ->take(5);

        foreach ($recentLevelAnswers as $cl) {
            $totalInLevel = $questionCounts[$cl->level_id] ?? 0;
            $correctInLevel = $answeredCounts[$cl->level_id] ?? 0;
            $scorePercent = $totalInLevel > 0 ? round(($correctInLevel / $totalInLevel) * 100) : 0;
            
            $recentActivities->push([
                'type' => 'level',
                'title' => 'Level ' . $cl->order_number . ': ' . $cl->level_name . ' selesai',
                'subtitle' => 'Skor ' . $scorePercent . '%',
                'xp' => $correctInLevel * config('game.xp.per_correct_answer'),
                'date' => $cl->created_at,
                'level_id' => $cl->level_id
            ]);
        }

        // Get recent badges
        foreach ($recentBadges as $ub) {
            $earnedAt = $ub->earned_at ?? now();
            $timeAgo = $earnedAt instanceof \Carbon\Carbon ? $earnedAt->diffForHumans() : 'Baru saja';
            
            $recentActivities->push([
                'type' => 'badge',
                'title' => 'Badge "' . $ub->badge->name . '" diraih',
                'subtitle' => $timeAgo,
                'xp' => 0,
                'date' => $earnedAt,
                'badge' => $ub
            ]);
        }

        $recentActivities = $recentActivities->sortByDesc('date')->take(config('game.dashboard.recent_activities_limit'))->values();

        // ================= DAILY QUEST =================
        $dailyQuest = DailyQuestService::getTodayQuest($userId);

        $totalBadge = Badge::count();

        return [
            'user' => $user,
            'xp' => $xp,
            'completedLevel' => $completedLevel,
            'totalLevel' => $levels->count(),
            'currentLevel' => $currentLevel,
            'currentProgress' => $currentProgress,
            'currentAnswered' => $currentAnswered,
            'currentTotal' => $currentTotal,
            'badgeCount' => $badgeCount,
            'totalBadge' => $totalBadge,
            'streak' => $streak,
            'rank' => $rank,
            'topUsers' => $topUsers,
            'recentBadges' => $recentBadges,
            'recentActivities' => $recentActivities,
            'dailyQuest' => $dailyQuest
        ];
    }
}
