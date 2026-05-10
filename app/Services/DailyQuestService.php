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
            
            $quests = DailyQuest::where('user_id', $userId)
                ->where('quest_date', $today)
                ->orderBy('id')
                ->get();
            
            if ($quests->count() < 5) {
                $needed = 5 - $quests->count();
                $questions = DailyQuestQuestion::whereNotIn('id', $quests->pluck('question_id'))->get();
                
                if ($questions->isEmpty()) {
                    $questions = DailyQuestQuestion::all();
                }

                $randomQuestions = $questions->shuffle()->take($needed);
                
                foreach ($randomQuestions as $q) {
                    DailyQuest::create([
                        'user_id' => $userId,
                        'question_id' => $q->id,
                        'quest_date' => $today,
                        'completed' => false
                    ]);
                }
                
                $quests = DailyQuest::where('user_id', $userId)
                    ->where('quest_date', $today)
                    ->orderBy('id')
                    ->get();
            }
            
            $currentQuest = $quests->where('completed', false)->first();
            
            if (!$currentQuest) {
                $currentQuest = $quests->last();
            }

            $currentQuest->load('question');
            
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
            $isCorrect = trim(strtolower($answer)) === trim(strtolower($question->correct_answer));
            $xpEarned = $isCorrect ? 5 : 0;
            
            $quest->update([
                'user_answer' => $answer,
                'is_correct' => $isCorrect,
                'xp_earned' => $xpEarned,
                'completed' => true
            ]);
            
            if ($isCorrect) {
                $user = User::find($userId);
                if ($user) $user->increment('xp', $xpEarned);
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