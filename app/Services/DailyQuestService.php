<?php

namespace App\Services;

use App\Models\DailyQuest;
use App\Models\DailyQuestQuestion;
use App\Models\User;
use Carbon\Carbon;

class DailyQuestService
{
    public static function getTodayQuest($userId)
    {
        try {
            if (!$userId) return null;

            $today = Carbon::now()->toDateString();
            
            // Get current quests for today
            $quests = DailyQuest::with('question')
                ->where('user_id', $userId)
                ->where('quest_date', $today)
                ->orderBy('id')
                ->get();
            
            if ($quests->count() < 5) {
                $needed = 5 - $quests->count();
                $usedQuestionIds = $quests->pluck('question_id')->toArray();
                
                // Priority 1: Unused questions
                $questions = DailyQuestQuestion::whereNotIn('id', $usedQuestionIds)
                    ->inRandomOrder()
                    ->take($needed)
                    ->get();
                
                // Fallback: If not enough questions, allow any questions that aren't already selected for TODAY
                if ($questions->count() < $needed) {
                    $neededMore = $needed - $questions->count();
                    $alreadySelected = array_merge($usedQuestionIds, $questions->pluck('id')->toArray());
                    
                    $extraQuestions = DailyQuestQuestion::whereNotIn('id', $alreadySelected)
                        ->inRandomOrder()
                        ->take($neededMore)
                        ->get();
                    
                    if ($extraQuestions->isEmpty() && $questions->isEmpty()) {
                        // Final fallback: just get any random questions
                        $extraQuestions = DailyQuestQuestion::inRandomOrder()->take($needed)->get();
                    }
                    $questions = $questions->concat($extraQuestions);
                }

                if ($questions->isNotEmpty()) {
                    $newQuestsData = [];
                    foreach ($questions as $q) {
                        $newQuestsData[] = [
                            'user_id' => $userId,
                            'question_id' => $q->id,
                            'quest_date' => $today,
                            'completed' => false,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    DailyQuest::insert($newQuestsData);
                    
                    // Refresh the collection
                    $quests = DailyQuest::with('question')
                        ->where('user_id', $userId)
                        ->where('quest_date', $today)
                        ->orderBy('id')
                        ->get();
                }
            }
            
            $currentQuest = $quests->where('completed', false)->first();
            
            // If all are completed, show the last one to display "completed" status
            if (!$currentQuest) {
                $currentQuest = $quests->last();
            }

            if (!$currentQuest) return null;

            return self::attachProgressInfo($currentQuest, $userId, $quests);
        } catch (\Exception $e) {
            \Log::error("DailyQuestService::getTodayQuest failed: " . $e->getMessage());
            return null;
        }
    }
    
    public static function submitAnswer($userId, $questId, $answer)
    {
        try {
            if (!$userId || !$questId || $answer === null) return null;

            $quest = DailyQuest::where('id', $questId)
                ->where('user_id', $userId)
                ->where('completed', false)
                ->first();
            
            if (!$quest) return null;

            $question = $quest->question ?: DailyQuestQuestion::find($quest->question_id);
            if (!$question) return null;

            $isCorrect = trim(strtolower($answer)) === trim(strtolower($question->correct_answer));
            $xpEarned = $isCorrect ? 10 : 2; // Reward even for trying, but more for correct
            
            $quest->update([
                'user_answer' => $answer,
                'is_correct' => $isCorrect,
                'xp_earned' => $xpEarned,
                'completed' => true
            ]);
            
            // Update user XP
            $user = User::find($userId);
            if ($user) {
                $user->increment('xp', $xpEarned);
            }
            
            $quest->load('question');
            return self::attachProgressInfo($quest, $userId);
        } catch (\Exception $e) {
            \Log::error("DailyQuestService::submitAnswer failed: " . $e->getMessage());
            return null;
        }
    }

    private static function attachProgressInfo($quest, $userId, $quests = null)
    {
        if (!$quests) {
            $questDate = $quest->quest_date instanceof \Carbon\Carbon ? $quest->quest_date->toDateString() : $quest->quest_date;
            $quests = DailyQuest::where('user_id', $userId)
                ->where('quest_date', $questDate)
                ->orderBy('id')
                ->get();
        }
        
        $quest->current_step = $quests->where('completed', true)->count() + ($quest->completed ? 0 : 1);
        $quest->total_steps = $quests->count();
        $quest->all_quests = $quests;
        
        return $quest;
    }
}