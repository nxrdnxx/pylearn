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
        $today = Carbon::now()->toDateString();
        
        $quest = DailyQuest::where('user_id', $userId)
            ->where('quest_date', $today)
            ->first();
        
        if (!$quest) {
            $questions = DailyQuestQuestion::all();
            if ($questions->isEmpty()) {
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
    }
    
    public static function submitAnswer($userId, $answer)
    {
        $today = Carbon::now()->toDateString();
        
        $quest = DailyQuest::where('user_id', $userId)
            ->where('quest_date', $today)
            ->first();
        
        if (!$quest || $quest->completed) {
            return $quest;
        }
        
        $question = $quest->question;
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
            $user->increment('xp', $xpEarned);
        }
        
        return $quest;
    }
}