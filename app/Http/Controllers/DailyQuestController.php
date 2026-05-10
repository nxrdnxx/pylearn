<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubmitDailyQuestRequest;
use App\Services\DailyQuestService;
use App\Models\DailyQuest;

class DailyQuestController extends Controller
{
    public function show()
    {
        try {
            $userId = auth()->id();
            $quest = DailyQuestService::getTodayQuest($userId);
            
            if (!$quest) {
                return view('pages.daily-quest', ['quest' => null, 'error' => 'Tidak ada soal yang tersedia']);
            }
            
            return view('pages.daily-quest', compact('quest'));
        } catch (\Exception $e) {
            \Log::error("DailyQuestController::show failed: " . $e->getMessage(), [
                'user_id' => auth()->id(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return view('pages.daily-quest', ['quest' => null, 'error' => 'Terjadi kesalahan saat memuat soal harian']);
        }
    }
    
    public function submit(SubmitDailyQuestRequest $request)
    {
        try {
            $validated = $request->validated();
            
            $userId = auth()->id();
            $quest = DailyQuestService::submitAnswer($userId, $validated['quest_id'], $validated['answer']);
            
            if (!$quest) {
                return back()->with('error', 'Terjadi kesalahan saat memproses jawaban');
            }

            // ✅ CHECK BADGES
            if ($quest->is_correct) {
                $earnedBadges = \App\Services\BadgeService::checkAndAward($userId, $quest->xp_earned);
                if (count($earnedBadges) > 0) {
                    session()->flash('new_badges', $earnedBadges);
                }
            }
            
            return back()->with([
                'quest_result' => true,
                'is_correct' => $quest->is_correct,
                'correct_answer' => $quest->question->correct_answer,
                'explanation' => $quest->question->explanation,
                'xp_earned' => $quest->xp_earned
            ]);
        } catch (\Exception $e) {
            \Log::error("DailyQuestController::submit failed: " . $e->getMessage(), [
                'user_id' => auth()->id(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()->with('error', 'Terjadi kesalahan saat memproses jawaban. Silakan coba lagi.');
        }
    }
}