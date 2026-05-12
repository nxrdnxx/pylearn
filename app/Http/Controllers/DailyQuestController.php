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
            \Log::error("DailyQuestController::show failed: " . $e->getMessage());
            return view('pages.daily-quest', ['quest' => null, 'error' => 'Terjadi kesalahan saat memuat soal harian']);
        }
    }

    public function getQuestData()
    {
        try {
            $userId = auth()->id();
            $quest = DailyQuestService::getTodayQuest($userId);
            
            if (!$quest) {
                return response()->json(['success' => false, 'message' => 'Tidak ada quest tersedia'], 404);
            }
            
            return response()->json([
                'success' => true,
                'quest' => [
                    'id' => $quest->id,
                    'current_step' => $quest->current_step,
                    'total_steps' => $quest->total_steps,
                    'completed' => $quest->completed,
                    'xp_earned' => $quest->xp_earned,
                    'question' => [
                        'question_text' => $quest->question->question_text,
                        'code_snippet' => $quest->question->code_snippet,
                        'options' => $quest->question->options ? json_decode($quest->question->options) : null,
                    ],
                    'total_xp_today' => $quest->all_quests->sum('xp_earned')
                ]
            ]);
        } catch (\Exception $e) {
            \Log::error("DailyQuestController::getQuestData failed: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Internal server error'], 500);
        }
    }
    
    public function submit(SubmitDailyQuestRequest $request)
    {
        try {
            $validated = $request->validated();
            $userId = auth()->id();
            $quest = DailyQuestService::submitAnswer($userId, $validated['quest_id'], $validated['answer']);
            
            if (!$quest) {
                if ($request->ajax()) {
                    return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat memproses jawaban'], 400);
                }
                return back()->with('error', 'Terjadi kesalahan saat memproses jawaban');
            }

            // ✅ CHECK BADGES
            $newBadges = [];
            if ($quest->is_correct) {
                $newBadges = \App\Services\BadgeService::checkAndAward($userId, $quest->xp_earned);
                if (count($newBadges) > 0) {
                    session()->flash('new_badges', $newBadges);
                }
            }
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'is_correct' => $quest->is_correct,
                    'correct_answer' => $quest->question->correct_answer,
                    'xp_earned' => $quest->xp_earned,
                    'current_step' => $quest->current_step,
                    'total_steps' => $quest->total_steps,
                    'completed_all' => $quest->completed && $quest->current_step == $quest->total_steps,
                    'new_badges' => $newBadges
                ]);
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
            
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Terjadi kesalahan internal'], 500);
            }
            return back()->with('error', 'Terjadi kesalahan saat memproses jawaban. Silakan coba lagi.');
        }
    }
}