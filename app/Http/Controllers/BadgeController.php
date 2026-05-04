<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use App\Models\UserBadge;
use App\Models\UserAnswer;
use App\Models\Level;

class BadgeController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        // semua badge
        $allBadges = Badge::all();

        // badge yang sudah dimiliki user
        $myBadges = UserBadge::where('user_id', $userId)
            ->pluck('badge_id')
            ->toArray();

        // pisahkan
        $earned = $allBadges->whereIn('id', $myBadges);
        $locked = $allBadges->whereNotIn('id', $myBadges);

        // progress
        $total = $allBadges->count();
        $owned = count($myBadges);
        $percent = $total > 0 ? ($owned / $total) * 100 : 0;

        return view('pages.badge', [
            'earned' => $earned,
            'locked' => $locked,
            'total' => $total,
            'owned' => $owned,
            'percent' => $percent
        ]);
    }

    public function checkBadges($userId)
    {
        $badges = Badge::all();

        foreach ($badges as $badge) {

            $condition = $badge->condition;
            $isUnlocked = false;

            switch ($condition['type']) {

                // ✅ LEVEL COMPLETE
                case 'level_complete':

                    $levelId = $condition['level'];

                    $total = \App\Models\Question::where('level_id', $levelId)->count();

                    $answered = UserAnswer::where('user_id', $userId)
                        ->whereIn('question_id', function ($q) use ($levelId) {
                            $q->select('id')
                            ->from('questions')
                            ->where('level_id', $levelId);
                        })->distinct('question_id')->count(); // 🔥 FIX DUPLIKAT

                    if ($total > 0 && $answered >= $total) {
                        $isUnlocked = true;
                    }

                break;

                // ✅ ALL LEVEL COMPLETE (LEBIH SIMPLE & AMAN)
                case 'all_levels_complete':

                    $totalLevel = Level::count();

                    $completedLevel = 0;

                    foreach (Level::all() as $level) {

                        $total = \App\Models\Question::where('level_id', $level->id)->count();

                        $answered = UserAnswer::where('user_id', $userId)
                            ->whereIn('question_id', function ($q) use ($level) {
                                $q->select('id')
                                ->from('questions')
                                ->where('level_id', $level->id);
                            })->distinct('question_id')->count();

                        if ($total > 0 && $answered >= $total) {
                            $completedLevel++;
                        }
                    }

                    if ($completedLevel == $totalLevel) {
                        $isUnlocked = true;
                    }

                break;

                // ✅ STREAK (SIMPLE VERSION)
                case 'streak':

                    $days = $condition['days'];

                    $streak = UserAnswer::where('user_id', $userId)
                        ->selectRaw('DATE(created_at) as date')
                        ->groupByRaw('DATE(created_at)')
                        ->count();

                    if ($streak >= $days) {
                        $isUnlocked = true;
                    }

                break;
            }

            // 🔥 SIMPAN (ANTI DUPLIKAT)
            if ($isUnlocked) {
                UserBadge::firstOrCreate([
                    'user_id' => $userId,
                    'badge_id' => $badge->id
                ]);
            }
        }
    }
}