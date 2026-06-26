<?php

namespace App\Http\Controllers;

use App\Models\Leaderboard;
use App\Models\User;
use App\Models\UserAnswer;
use App\Models\UserBadge;
use Carbon\Carbon;

class LeaderboardController extends Controller
{
    public static function xpToTier($xp)
    {
        $level = floor($xp / 500);
        $tierIndex = min(floor($level / 3), 4);
        $tierNames = ['Bronze', 'Silver', 'Gold', 'Platinum', 'Diamond'];
        $roman = ['I', 'II', 'III'];
        return [
            'name' => $tierNames[$tierIndex],
            'sub' => $roman[$level % 3],
            'level' => $level,
        ];
    }

    public function index()
    {
        // ambil semua user urut XP
        $users = User::where('role', '!=', 'admin')->orderByDesc('xp')->get();

        // ranking manual
        $users->map(function ($user, $index) {
            $user->rank = $index + 1;
            $tier = self::xpToTier($user->xp);
            $user->level = $tier['level'];
            $user->tier_name = $tier['name'];
            $user->tier_sub = $tier['sub'];
            return $user;
        });

        // TOP 3 (podium)
        $top3 = $users->take(3);

        // sisanya
        $others = $users->slice(3);

        // user login
        $me = auth()->user();
        $myRank = '-';
        
        if ($me) {
            $myRank = $users->firstWhere('id', $me->id)?->rank ?? '-';
        }

        return view('pages.leaderboard', compact(
            'users',
            'top3',
            'others',
            'me',
            'myRank'
        ));
    }

    public function myRank()
    {
        $user = auth()->user();

        $rank = User::where('xp', '>', $user->xp)->count() + 1;

        return response()->json([
            'success' => true,
            'rank' => $rank,
            'xp' => $user->xp
        ]);
    }

    public function userProfile($id)
    {
        try {
            $user = User::findOrFail($id);

            $badges = UserBadge::where('user_id', $id)
                ->with('badge')
                ->get()
                ->pluck('badge');

            $tier = self::xpToTier($user->xp);
            $streak = $user->login_streak ?? 0;

            $activities = UserAnswer::select(
                    'user_answers.*', 'levels.name as level_name',
                    'levels.order_number', 'questions.level_id'
                )
                ->join('questions', 'user_answers.question_id', '=', 'questions.id')
                ->join('levels', 'questions.level_id', '=', 'levels.id')
                ->where('user_answers.user_id', $id)
                ->orderByDesc('user_answers.created_at')
                ->limit(10)->get()
                ->groupBy('level_id')
                ->map(function ($items) {
                    $first = $items->first();
                    $correctCount = $items->where('is_correct', true)->count();
                    $questions = $items->count();
                    $scorePercent = $questions > 0 ? round(($correctCount / $questions) * 100) : 0;
                    $passed = $questions > 0 && $correctCount >= ($questions * 0.6);
                    return [
                        'level_name' => 'Lv.' . $first->order_number . ' — ' . $first->level_name,
                        'score' => $scorePercent,
                        'xp' => $items->sum('score') > 0 ? $items->sum('score') : ($correctCount * config('game.xp.per_correct_answer')),
                        'date' => Carbon::parse($first->created_at)->diffForHumans(),
                        'status' => $passed ? 'Lulus' : 'Gagal'
                    ];
                })->values();

            return response()->json([
                'success' => true,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'xp' => $user->xp,
                    'level' => $tier['level'],
                    'tier_name' => $tier['name'],
                    'tier_sub' => $tier['sub'],
                    'streak' => $streak,
                    'profile_picture' => $user->profile_picture,
                ],
                'badges' => $badges,
                'activities' => $activities,
            ]);
        } catch (\Exception $e) {
            \Log::error("LeaderboardController::userProfile failed: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Gagal memuat profil'], 500);
        }
    }
}