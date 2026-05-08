<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use App\Models\Question;
use App\Models\UserAnswer;
use App\Models\UserBadge;
use App\Models\Badge;
use App\Services\DailyQuestService;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if (!$user) {
            return redirect()->route('login');
        }
        
        $userId = $user->id;

        // ================= XP =================
        $xp = $user->xp;

        // ================= LEVEL =================
        $levels = Level::all();
        $totalLevel = $levels->count();

        $completedLevel = 0;
        $currentLevel = null;
        $currentProgress = 0;
        $currentAnswered = 0;
        $currentTotal = 0;

        foreach ($levels as $level) {

            $questions = Question::where('level_id', $level->id)->pluck('id');
            $total = $questions->count();

            $answered = UserAnswer::where('user_id', $userId)
                ->whereIn('question_id', $questions)
                ->distinct('question_id')
                ->count();

            if ($total > 0 && $answered >= $total) {
                $completedLevel++;
            } elseif (!$currentLevel) {
                $currentLevel = $level;
                $currentAnswered = $answered;
                $currentTotal = $total;
                $currentProgress = $total > 0 ? ($answered / $total) * 100 : 0;
            }
        }
        if ($completedLevel == $totalLevel) {
            $currentLevel = null;
            $currentProgress = 100;
        }
        // ================= BADGE =================
        $badgeCount = UserBadge::where('user_id', $userId)->count();

        // ================= STREAK =================
        $loginStreak = $user->login_streak ?? 0;
        $streak = $loginStreak;

        // ================= LEADERBOARD =================
        $rank = User::where('xp', '>', $user->xp)->count() + 1;

        $topUsers = User::orderByDesc('xp')
            ->take(5)
            ->get();

        // ================= BADGE TERBARU =================
        $recentBadges = UserBadge::with('badge')
            ->where('user_id', $userId)
            ->orderByDesc('id')
            ->take(4)
            ->get();

        // ================= AKTIVITAS TERBARU =================
        $recentActivities = collect();
        
        // Ambil weekly XP data
        $weekStart = Carbon::now()->startOfWeek();
        $weeklyXp = [];
        
        for ($i = 0; $i < 7; $i++) {
            $date = $weekStart->copy()->addDays($i);
            $dayXp = UserAnswer::where('user_id', $userId)
                ->whereDate('created_at', $date)
                ->sum('xp_earned');
            $weeklyXp[] = $dayXp;
        }
        
        $maxWeeklyXp = max($weeklyXp) > 0 ? max($weeklyXp) : 1;
        $heights = array_map(function ($xp) use ($maxWeeklyXp) {
            return $maxWeeklyXp > 0 ? round(($xp / $maxWeeklyXp) * 100) : 0;
        }, $weeklyXp);
        
        $totalWeeklyXp = array_sum($weeklyXp);
        
        // Ambil semua level completions
        $allAnswers = UserAnswer::where('user_id', $userId)
            ->where('is_correct', true)
            ->join('questions', 'user_answers.question_id', '=', 'questions.id')
            ->join('levels', 'questions.level_id', '=', 'levels.id')
            ->select('user_answers.*', 'levels.id as level_id', 'levels.name as level_name', 'levels.order_number')
            ->orderByDesc('user_answers.created_at')
            ->limit(50)
            ->get();
        
        // Group by level_id (ambil yang terbaru per level)
        $byLevel = [];
        foreach ($allAnswers as $ans) {
            if (!isset($byLevel[$ans->level_id])) {
                $byLevel[$ans->level_id] = $ans;
            }
        }
        
        foreach (array_slice($byLevel, 0, 5) as $cl) {
            $questions = Question::where('level_id', $cl->level_id)->count();
            $correctCount = UserAnswer::where('user_id', $userId)
                ->whereIn('question_id', Question::where('level_id', $cl->level_id)->pluck('id'))
                ->where('is_correct', true)
                ->count();
            $scorePercent = $questions > 0 ? round(($correctCount / $questions) * 100) : 0;
            $xpEarned = $correctCount * 20;
            
            $recentActivities->push([
                'type' => 'level',
                'title' => 'Level ' . $cl->order_number . ': ' . $cl->level_name . ' selesai',
                'subtitle' => 'Skor ' . $scorePercent,
                'xp' => $xpEarned,
                'date' => $cl->created_at,
                'level_id' => $cl->level_id
            ]);
        }

        // Ambil badge earned
        $badgeEarningsData = UserBadge::select('user_badges.*', 'badges.name as badge_name', 'badges.icon')
            ->join('badges', 'user_badges.badge_id', '=', 'badges.id')
            ->where('user_badges.user_id', $userId)
            ->orderByDesc('user_badges.id')
            ->limit(5)
            ->get();
        
        foreach ($badgeEarningsData as $badge) {
            $recentActivities->push([
                'type' => 'badge',
                'title' => 'Badge "' . $badge->badge_name . '" diraih',
                'subtitle' => $badge->earned_at->diffForHumans(),
                'xp' => 0,
                'date' => $badge->earned_at,
                'badge' => $badge
            ]);
        }

        // Urutkan dan ambil 5terakhir
        $recentActivities = $recentActivities->sortByDesc('date')->take(5)->values();

        // ================= DAILY QUEST =================
        $dailyQuest = DailyQuestService::getTodayQuest($userId);

        return view('pages.dashboard', compact(
            'user',
            'xp',
            'completedLevel',
            'totalLevel',
            'currentLevel',
            'currentProgress',
            'currentAnswered',
            'currentTotal',
            'badgeCount',
            'streak',
            'rank',
            'topUsers',
            'recentBadges',
            'recentActivities',
            'heights',
            'totalWeeklyXp',
            'dailyQuest'
        ));
    }
}