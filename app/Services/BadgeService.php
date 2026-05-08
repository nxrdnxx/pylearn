<?php

namespace App\Services;

use App\Models\User;
use App\Models\Badge;
use App\Models\UserBadge;
use App\Models\UserAnswer;
use App\Models\Level;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class BadgeService
{
    public static function checkAndAward($userId, $newXp = 0)
    {
        $user = User::find($userId);
        $earnedBadges = [];

        $existingBadges = UserBadge::where('user_id', $userId)->pluck('badge_id')->toArray();

        // First Blood - Selesaikan Level 1
        $firstBlood = Badge::where('condition', 'first_level')->first();
        if ($firstBlood && !in_array($firstBlood->id, $existingBadges)) {
            $level1Questions = Question::where('level_id', 1)->pluck('id');
            $hasLevel1 = UserAnswer::where('user_id', $userId)
                ->whereIn('question_id', $level1Questions)
                ->where('is_correct', true)
                ->count() > 0;
            if ($hasLevel1) {
                UserBadge::create(['user_id' => $userId, 'badge_id' => $firstBlood->id]);
                $earnedBadges[] = $firstBlood;
            }
        }

        // Diamond - 5000 XP
        $diamond = Badge::where('condition', 'xp_5000')->first();
        if ($diamond && !in_array($diamond->id, $existingBadges) && $user->xp >= 5000) {
            UserBadge::create(['user_id' => $userId, 'badge_id' => $diamond->id]);
            $earnedBadges[] = $diamond;
        }

        // Streak Starter - 3 hari
        $streakStarter = Badge::where('condition', 'streak_3')->first();
        if ($streakStarter && !in_array($streakStarter->id, $existingBadges) && $user->login_streak >= 3) {
            UserBadge::create(['user_id' => $userId, 'badge_id' => $streakStarter->id]);
            $earnedBadges[] = $streakStarter;
        }

        // Python King - #1 rank
        $pythonKing = Badge::where('condition', 'rank_1')->first();
        $rank = User::where('xp', '>', $user->xp)->count() + 1;
        if ($pythonKing && !in_array($pythonKing->id, $existingBadges) && $rank === 1) {
            UserBadge::create(['user_id' => $userId, 'badge_id' => $pythonKing->id]);
            $earnedBadges[] = $pythonKing;
        }

        // Night Owl - Belajar jam 23:00+
        $nightOwl = Badge::where('condition', 'night_study')->first();
        $now = now();
        if ($nightOwl && !in_array($nightOwl->id, $existingBadges) && $now->hour >= 23) {
            UserBadge::create(['user_id' => $userId, 'badge_id' => $nightOwl->id]);
            $earnedBadges[] = $nightOwl;
        }

        // Quiz Master - 100% semua level
        $quizMaster = Badge::where('condition', 'perfect_score')->first();
        if ($quizMaster && !in_array($quizMaster->id, $existingBadges)) {
            $levels = Level::all();
            $allPerfect = true;
            foreach ($levels as $level) {
                $questionIds = Question::where('level_id', $level->id)->pluck('id');
                $total = $questionIds->count();
                if ($total === 0) continue;
                $correct = UserAnswer::where('user_id', $userId)
                    ->whereIn('question_id', $questionIds)
                    ->where('is_correct', true)
                    ->count();
                if ($correct < $total) {
                    $allPerfect = false;
                    break;
                }
            }
            if ($allPerfect && $levels->count() > 0) {
                UserBadge::create(['user_id' => $userId, 'badge_id' => $quizMaster->id]);
                $earnedBadges[] = $quizMaster;
            }
        }

        return $earnedBadges;
    }
}