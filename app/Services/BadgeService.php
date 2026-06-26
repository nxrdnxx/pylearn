<?php

namespace App\Services;

use App\Models\User;
use App\Models\Badge;
use App\Models\UserBadge;
use App\Models\UserAnswer;
use App\Models\UserProgress;
use App\Models\Level;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class BadgeService
{
    private static $badgesByCondition = null;

    private static function getBadgesByCondition(): array
    {
        if (self::$badgesByCondition === null) {
            $badges = Badge::all();
            $map = [];
            foreach ($badges as $badge) {
                $map[$badge->condition] = $badge;
            }
            self::$badgesByCondition = $map;
        }
        return self::$badgesByCondition;
    }

    private static function getBadge(string $condition): ?Badge
    {
        $map = self::getBadgesByCondition();
        return $map[$condition] ?? null;
    }

    public static function checkAndAward($userId, $newXp = 0)
    {
        try {
            $user = User::find($userId);

            if (!$user) {
                \Log::warning("BadgeService: User not found with ID: {$userId}");
                return [];
            }

            $earnedBadges = [];
            $existingBadges = UserBadge::where('user_id', $userId)->pluck('badge_id')->toArray();

            // First Blood - Selesaikan Level 1
            $badge = self::getBadge('first_level');
            if ($badge && !in_array($badge->id, $existingBadges)) {
                $level1Questions = Question::where('level_id', 1)->pluck('id');
                if ($level1Questions->isNotEmpty()) {
                    $hasLevel1 = UserAnswer::where('user_id', $userId)
                        ->whereIn('question_id', $level1Questions)
                        ->where('is_correct', true)
                        ->exists();
                    if ($hasLevel1) {
                        UserBadge::firstOrCreate(
                            ['user_id' => $userId, 'badge_id' => $badge->id],
                            ['earned_at' => now()]
                        );
                        $earnedBadges[] = $badge;
                    }
                }
            }

            // Diamond - 5000 XP
            $badge = self::getBadge('xp_5000');
            if ($badge && !in_array($badge->id, $existingBadges) && $user->xp >= 5000) {
                UserBadge::firstOrCreate(
                    ['user_id' => $userId, 'badge_id' => $badge->id],
                    ['earned_at' => now()]
                );
                $earnedBadges[] = $badge;
            }

            // Streak Starter - 3 hari
            $badge = self::getBadge('streak_3');
            if ($badge && !in_array($badge->id, $existingBadges) && $user->login_streak >= 3) {
                UserBadge::firstOrCreate(
                    ['user_id' => $userId, 'badge_id' => $badge->id],
                    ['earned_at' => now()]
                );
                $earnedBadges[] = $badge;
            }

            // Python King - #1 rank
            $badge = self::getBadge('rank_1');
            if ($badge && !in_array($badge->id, $existingBadges)) {
                $rank = User::where('xp', '>', $user->xp)->count() + 1;
                if ($rank === 1) {
                    UserBadge::firstOrCreate(
                        ['user_id' => $userId, 'badge_id' => $badge->id],
                        ['earned_at' => now()]
                    );
                    $earnedBadges[] = $badge;
                }
            }

            // Night Owl - Belajar larut malam (23:00 - 03:59 WIB)
            $badge = self::getBadge('night_study');
            if ($badge && !in_array($badge->id, $existingBadges)) {
                $hour = now('Asia/Jakarta')->hour;
                if ($hour >= 23 || $hour < 4) {
                    UserBadge::firstOrCreate(
                        ['user_id' => $userId, 'badge_id' => $badge->id],
                        ['earned_at' => now()]
                    );
                    $earnedBadges[] = $badge;
                }
            }

            // Early Bird - Pagi buta (4-7 WIB)
            $badge = self::getBadge('early_bird');
            if ($badge && !in_array($badge->id, $existingBadges)) {
                $hour = now('Asia/Jakarta')->hour;
                if ($hour >= 4 && $hour <= 7) {
                    UserBadge::firstOrCreate(
                        ['user_id' => $userId, 'badge_id' => $badge->id],
                        ['earned_at' => now()]
                    );
                    $earnedBadges[] = $badge;
                }
            }

            // Quiz Master - Selesaikan level 1-10
            $badge = self::getBadge('perfect_score');
            if ($badge && !in_array($badge->id, $existingBadges)) {
                $levelIds = Level::whereBetween('order_number', [1, 10])
                    ->pluck('id');

                if ($levelIds->isNotEmpty()) {
                    $completed = UserProgress::where('user_id', $userId)
                        ->whereIn('level_id', $levelIds)
                        ->where('status', 'completed')
                        ->count();

                    if ($completed === $levelIds->count()) {
                        UserBadge::firstOrCreate(
                            ['user_id' => $userId, 'badge_id' => $badge->id],
                            ['earned_at' => now()]
                        );
                        $earnedBadges[] = $badge;
                    }
                }
            }

            // Consistent Coder - 7 hari streak
            $badge = self::getBadge('streak_7');
            if ($badge && !in_array($badge->id, $existingBadges) && $user->login_streak >= 7) {
                UserBadge::firstOrCreate(
                    ['user_id' => $userId, 'badge_id' => $badge->id],
                    ['earned_at' => now()]
                );
                $earnedBadges[] = $badge;
            }

            // Problem Solver - 100 soal benar
            $badge = self::getBadge('questions_100');
            if ($badge && !in_array($badge->id, $existingBadges)) {
                $totalCorrect = UserAnswer::where('user_id', $userId)
                    ->where('is_correct', true)
                    ->count();
                if ($totalCorrect >= 100) {
                    UserBadge::firstOrCreate(
                        ['user_id' => $userId, 'badge_id' => $badge->id],
                        ['earned_at' => now()]
                    );
                    $earnedBadges[] = $badge;
                }
            }

            return $earnedBadges;
        } catch (\Exception $e) {
            \Log::error("BadgeService::checkAndAward failed: " . $e->getMessage(), [
                'user_id' => $userId,
                'trace' => $e->getTraceAsString()
            ]);
            return [];
        }
    }
}
