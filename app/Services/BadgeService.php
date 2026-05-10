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
        try {
            $user = User::find($userId);
            
            // Check if user exists
            if (!$user) {
                \Log::warning("BadgeService: User not found with ID: {$userId}");
                return [];
            }

            $earnedBadges = [];

            $existingBadges = UserBadge::where('user_id', $userId)->pluck('badge_id')->toArray();

            // First Blood - Selesaikan Level 1
            $firstBlood = Badge::where('condition', 'first_level')->first();
            if ($firstBlood && !in_array($firstBlood->id, $existingBadges)) {
                try {
                    $level1Questions = Question::where('level_id', 1)->pluck('id');
                    $hasLevel1 = UserAnswer::where('user_id', $userId)
                        ->whereIn('question_id', $level1Questions)
                        ->where('is_correct', true)
                        ->count() > 0;
                    if ($hasLevel1) {
                        UserBadge::firstOrCreate(
                            ['user_id' => $userId, 'badge_id' => $firstBlood->id],
                            ['earned_at' => now()]
                        );
                        $earnedBadges[] = $firstBlood;
                    }
                } catch (\Exception $e) {
                    \Log::error("BadgeService: Error checking First Blood badge: " . $e->getMessage());
                }
            }

            // Diamond - 5000 XP
            $diamond = Badge::where('condition', 'xp_5000')->first();
            if ($diamond && !in_array($diamond->id, $existingBadges) && $user->xp >= 5000) {
                try {
                    UserBadge::firstOrCreate(
                        ['user_id' => $userId, 'badge_id' => $diamond->id],
                        ['earned_at' => now()]
                    );
                    $earnedBadges[] = $diamond;
                } catch (\Exception $e) {
                    \Log::error("BadgeService: Error awarding Diamond badge: " . $e->getMessage());
                }
            }

            // Streak Starter - 3 hari
            $streakStarter = Badge::where('condition', 'streak_3')->first();
            if ($streakStarter && !in_array($streakStarter->id, $existingBadges) && $user->login_streak >= 3) {
                try {
                    UserBadge::firstOrCreate(
                        ['user_id' => $userId, 'badge_id' => $streakStarter->id],
                        ['earned_at' => now()]
                    );
                    $earnedBadges[] = $streakStarter;
                } catch (\Exception $e) {
                    \Log::error("BadgeService: Error awarding Streak Starter badge: " . $e->getMessage());
                }
            }

            // Python King - #1 rank
            $pythonKing = Badge::where('condition', 'rank_1')->first();
            if ($pythonKing && !in_array($pythonKing->id, $existingBadges)) {
                try {
                    $rank = User::where('xp', '>', $user->xp)->count() + 1;
                    if ($rank === 1) {
                        UserBadge::firstOrCreate(
                            ['user_id' => $userId, 'badge_id' => $pythonKing->id],
                            ['earned_at' => now()]
                        );
                        $earnedBadges[] = $pythonKing;
                    }
                } catch (\Exception $e) {
                    \Log::error("BadgeService: Error checking Python King badge: " . $e->getMessage());
                }
            }

            // Night Owl - Belajar jam 23:00+
            $nightOwl = Badge::where('condition', 'night_study')->first();
            if ($nightOwl && !in_array($nightOwl->id, $existingBadges)) {
                try {
                    $now = now();
                    if ($now->hour >= 23) {
                        UserBadge::firstOrCreate(
                            ['user_id' => $userId, 'badge_id' => $nightOwl->id],
                            ['earned_at' => now()]
                        );
                        $earnedBadges[] = $nightOwl;
                    }
                } catch (\Exception $e) {
                    \Log::error("BadgeService: Error awarding Night Owl badge: " . $e->getMessage());
                }
            }

            // Quiz Master - 100% semua level
            $quizMaster = Badge::where('condition', 'perfect_score')->first();
            if ($quizMaster && !in_array($quizMaster->id, $existingBadges)) {
                try {
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
                        UserBadge::firstOrCreate(
                            ['user_id' => $userId, 'badge_id' => $quizMaster->id],
                            ['earned_at' => now()]
                        );
                        $earnedBadges[] = $quizMaster;
                    }
                } catch (\Exception $e) {
                    \Log::error("BadgeService: Error checking Quiz Master badge: " . $e->getMessage());
                }
            }
            
            // Early Bird - Pagi buta (4-7)
            $earlyBird = Badge::where('condition', 'early_bird')->first();
            if ($earlyBird && !in_array($earlyBird->id, $existingBadges)) {
                try {
                    $hour = now()->hour;
                    if ($hour >= 4 && $hour <= 7) {
                        UserBadge::firstOrCreate(
                            ['user_id' => $userId, 'badge_id' => $earlyBird->id],
                            ['earned_at' => now()]
                        );
                        $earnedBadges[] = $earlyBird;
                    }
                } catch (\Exception $e) {
                    \Log::error("BadgeService: Error awarding Early Bird badge: " . $e->getMessage());
                }
            }

            // Consistent Coder - 7 hari streak
            $streak7 = Badge::where('condition', 'streak_7')->first();
            if ($streak7 && !in_array($streak7->id, $existingBadges) && $user->login_streak >= 7) {
                try {
                    UserBadge::firstOrCreate(
                        ['user_id' => $userId, 'badge_id' => $streak7->id],
                        ['earned_at' => now()]
                    );
                    $earnedBadges[] = $streak7;
                } catch (\Exception $e) {
                    \Log::error("BadgeService: Error awarding Consistent Coder badge: " . $e->getMessage());
                }
            }

            // Problem Solver - 100 soal benar
            $problemSolver = Badge::where('condition', 'questions_100')->first();
            if ($problemSolver && !in_array($problemSolver->id, $existingBadges)) {
                try {
                    $totalCorrect = UserAnswer::where('user_id', $userId)
                        ->where('is_correct', true)
                        ->count();
                    if ($totalCorrect >= 100) {
                        UserBadge::firstOrCreate(
                            ['user_id' => $userId, 'badge_id' => $problemSolver->id],
                            ['earned_at' => now()]
                        );
                        $earnedBadges[] = $problemSolver;
                    }
                } catch (\Exception $e) {
                    \Log::error("BadgeService: Error checking Problem Solver badge: " . $e->getMessage());
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