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
            if (!$userId) {
                \Log::warning("DailyQuestService: Invalid user ID provided");
                return null;
            }

            $today = Carbon::now()->toDateString();
            
            $quest = DailyQuest::where('user_id', $userId)
                ->where('quest_date', $today)
                ->first();
            
            if (!$quest) {
                $questions = DailyQuestQuestion::all();
                if ($questions->isEmpty()) {
                    \Log::warning("DailyQuestService: No daily quest questions available");
                    return null;
                }
                
                $randomQuestion = $questions->random();
                
                $quest = DailyQuest::create([
                    'user_id' => $userId,
                    'question_id' => $randomQuestion->id,
                    'quest_date' => $today,
                    'completed' => false
                ]);
            }
            
            $quest->load('question');
            
            return $quest;
        } catch (\Exception $e) {
            \Log::error("DailyQuestService::getTodayQuest failed: " . $e->getMessage(), [
                'user_id' => $userId,
                'trace' => $e->getTraceAsString()
            ]);
            return null;
        }
    }
    
    public static function submitAnswer($userId, $answer)
    {
        try {
            if (!$userId || !$answer) {
                \Log::warning("DailyQuestService: Invalid parameters to submitAnswer", [
                    'user_id' => $userId,
                    'answer_provided' => !empty($answer)
                ]);
                return null;
            }

            $today = Carbon::now()->toDateString();
            
            $quest = DailyQuest::where('user_id', $userId)
                ->where('quest_date', $today)
                ->first();
            
            if (!$quest) {
                \Log::warning("DailyQuestService: No quest found for user", ['user_id' => $userId]);
                return null;
            }

            if ($quest->completed) {
                \Log::info("DailyQuestService: Quest already completed", ['user_id' => $userId]);
                return $quest;
            }
            
            $question = $quest->question;
            
            if (!$question) {
                \Log::error("DailyQuestService: Question not found for quest", ['quest_id' => $quest->id]);
                return null;
            }

            $correctAnswer = trim(strtolower($question->correct_answer));
            $userAnswer = trim(strtolower($answer));
            
            $isCorrect = $userAnswer === $correctAnswer;
            
            $xpEarned = $isCorrect ? 50 : 0;
            
            $quest->update([
                'user_answer' => $answer,
                'is_correct' => $isCorrect,
                'xp_earned' => $xpEarned,
                'completed' => true
            ]);
            
            if ($isCorrect) {
                $user = User::find($userId);
                if ($user) {
                    $user->increment('xp', $xpEarned);
                } else {
                    \Log::error("DailyQuestService: User not found", ['user_id' => $userId]);
                }
            }
            
            return $quest;
        } catch (\Exception $e) {
            \Log::error("DailyQuestService::submitAnswer failed: " . $e->getMessage(), [
                'user_id' => $userId,
                'trace' => $e->getTraceAsString()
            ]);
            return null;
        }
    }
}