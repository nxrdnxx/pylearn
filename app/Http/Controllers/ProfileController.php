<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Level;
use App\Models\Question;
use App\Models\UserAnswer;
use App\Models\UserBadge;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function index() {
        $user = auth()->user();
        
        $userId = $user->id;
        
        $xp = $user->xp;
        $badgeCount = UserBadge::where('user_id', $userId)->count();
        
        // Level completed count
        $levels = Level::all();
        $totalLevel = $levels->count();
        $completedLevel = 0;
        
        foreach ($levels as $level) {
            $questions = Question::where('level_id', $level->id)->pluck('id');
            $total = $questions->count();
            
            $answered = UserAnswer::where('user_id', $userId)
                ->whereIn('question_id', $questions)
                ->distinct('question_id')
                ->count();
            
            if ($total > 0 && $answered >= $total) {
                $completedLevel++;
            }
        }
        
        // Streak
        $streak = UserAnswer::where('user_id', $userId)
            ->selectRaw('DATE(created_at) as date')
            ->groupByRaw('DATE(created_at)')
            ->count();
        
        // Aktivitas / Riwayat
        $activities = UserAnswer::select('user_answers.*', 'levels.name as level_name', 'levels.order_number', 'questions.level_id')
            ->join('questions', 'user_answers.question_id', '=', 'questions.id')
            ->join('levels', 'questions.level_id', '=', 'levels.id')
            ->where('user_answers.user_id', $userId)
            ->orderByDesc('user_answers.created_at')
            ->limit(10)
            ->get()
            ->groupBy(function ($item) {
                return $item->level_id;
            })
            ->map(function ($items, $levelId) {
                $first = $items->first();
                $level = Level::find($levelId);
                $questions = Question::where('level_id', $levelId)->count();
                $correctCount = $items->where('is_correct', true)->count();
                $totalScore = $items->sum('score');
                $scorePercent = $questions > 0 ? round(($correctCount / $questions) * 100) : 0;
                $passed = $questions > 0 && $correctCount >= ($questions * 0.6);
                
                return [
                    'level_name' => 'Lv.' . $first->order_number . ' — ' . $first->level_name,
                    'score' => $scorePercent,
                    'xp' => $totalScore > 0 ? $totalScore : ($correctCount * 20),
                    'date' => Carbon::parse($first->created_at),
                    'status' => $passed ? 'Lulus' : 'Gagal'
                ];
            })
            ->values();

        return view('pages.profile', compact(
            'user',
            'xp',
            'completedLevel',
            'totalLevel',
            'badgeCount',
            'streak',
            'activities'
        ));
    }
}