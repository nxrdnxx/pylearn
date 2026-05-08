<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DailyQuestService;
use App\Models\DailyQuest;

class DailyQuestController extends Controller
{
    public function show()
    {
        $userId = auth()->id();
        $quest = DailyQuestService::getTodayQuest($userId);
        
        return view('pages.daily-quest', compact('quest'));
    }
    
    public function submit(Request $request)
    {
        $request->validate([
            'answer' => 'required|string'
        ]);
        
        $userId = auth()->id();
        $quest = DailyQuestService::submitAnswer($userId, $request->answer);
        
        return back()->with([
            'quest_result' => true,
            'is_correct' => $quest->is_correct,
            'correct_answer' => $quest->question->correct_answer,
            'explanation' => $quest->question->explanation,
            'xp_earned' => $quest->xp_earned
        ]);
    }
}