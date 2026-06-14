<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubmitQuizAnswerRequest;
use App\Models\Level;
use App\Models\Question;
use App\Models\UserAnswer;
use App\Models\UserProgress;
use App\Services\BadgeService;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function show($levelId)
    {
        $level = Level::findOrFail($levelId);

        if ($level->content) {
            $hasRead = UserProgress::where('user_id', auth()->id())
                ->where('level_id', $level->id)
                ->whereNotNull('material_read_at')
                ->exists();

            if (!$hasRead) {
                return redirect()->route('material.show', $level->id)
                    ->with('error', 'Baca materi terlebih dahulu sebelum mengerjakan quiz.');
            }
        }

        $questions = Question::where('level_id', $levelId)->orderBy('id')->get();

        if ($questions->isEmpty()) {
            return redirect()->route('level.index')->with('error', 'Tidak ada soal di level ini.');
        }

        $current = request()->get('q');

        if (!$current) {
            $progress = UserProgress::where('user_id', auth()->id())
                ->where('level_id', $level->id)
                ->first();

            $lastAnsweredId = UserAnswer::where('user_id', auth()->id())
                ->whereIn('question_id', $questions->pluck('id'))
                ->orderByDesc('id')
                ->value('question_id');

            if ($lastAnsweredId) {
                $lastAnswerTime = UserAnswer::where('user_id', auth()->id())
                    ->where('question_id', $lastAnsweredId)
                    ->value('created_at');

                if ($progress && $progress->material_read_at && $lastAnswerTime &&
                    $progress->material_read_at->gt($lastAnswerTime)) {
                    $current = 1;
                } else {
                    $currentIndex = $questions->search(function($item) use ($lastAnsweredId) {
                        return $item->id == $lastAnsweredId;
                    });

                    $current = $currentIndex + 2;

                    if ($current > $questions->count()) {
                        $current = 1;
                    }
                }
            } else {
                $current = 1;
            }
        }

        $question = $questions[$current - 1] ?? null;

        if (!$question && $current > 1) {
             return redirect()->route('quiz.result', $levelId);
        }

        return view('pages.quiz', compact('level', 'questions', 'question', 'current'));
    }

    public function answer(SubmitQuizAnswerRequest $request)
    {
        try {
            $validated = $request->validated();

            $question = Question::findOrFail($validated['question_id']);
            $user = auth()->user();

            $userAnswer = trim($validated['answer']);
            $correctAnswer = trim($question->correct_answer);

            $isCorrect = strtolower($userAnswer) === strtolower($correctAnswer);

            $xpPerCorrect = config('game.xp.per_correct_answer', 20);
            $streakBonus = config('game.xp.bonus_streak_multiplier', 1.5);

            DB::beginTransaction();

            try {
                // Hitung streak
                $lastAnswer = UserAnswer::where('user_id', $user->id)
                    ->orderByDesc('id')
                    ->first();

                $streak = 0;
                if ($lastAnswer && $lastAnswer->is_correct) {
                    $streak = $lastAnswer->streak ?? 0;
                }

                // Hitung XP
                $xpEarned = 0;
                if ($isCorrect) {
                    $xpEarned = $xpPerCorrect;

                    if ($streak >= 3) {
                        $xpEarned = (int) round($xpEarned * $streakBonus);
                    }

                    $streak++;
                } else {
                    $streak = 0;
                }

                UserAnswer::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'question_id' => $question->id,
                    ],
                    [
                        'user_answer' => $userAnswer,
                        'is_correct' => $isCorrect,
                        'score' => $isCorrect ? $xpPerCorrect : 0,
                        'xp_earned' => $xpEarned,
                        'streak' => $streak,
                    ]
                );

                if ($isCorrect) {
                    $user->increment('xp', $xpEarned);

                    $earnedBadges = BadgeService::checkAndAward($user->id, $xpEarned);
                    if (count($earnedBadges) > 0) {
                        session()->flash('new_badges', $earnedBadges);
                    }
                }

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }

            return redirect()->route('quiz.show', [
                'level' => $validated['level_id'],
                'q' => $validated['current']
            ])->with([
                'is_correct' => $isCorrect,
                'correct_answer' => $question->correct_answer,
                'explanation' => $question->explanation,
                'feedback_question_id' => $question->id,
                'xp_earned' => $xpEarned,
            ]);
        } catch (\Exception $e) {
            \Log::error("QuizController::answer failed: " . $e->getMessage(), [
                'user_id' => auth()->id(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat memproses jawaban. Silakan coba lagi.');
        }
    }

    public function result($levelId)
    {
        try {
            $userId = auth()->id();

            $questions = Question::where('level_id', $levelId)->get();
            $totalQuestions = $questions->count();

            if ($totalQuestions === 0) {
                return redirect()->route('level.index')
                    ->with('error', 'Level tidak memiliki soal.');
            }

            $answers = UserAnswer::where('user_id', $userId)
                ->whereIn('question_id', $questions->pluck('id'))
                ->get();

            $correct = $answers->where('is_correct', 1)->count();
            $wrong = $answers->where('is_correct', 0)->count();

            $totalScore = $answers->sum('score');

            $maxScore = $totalQuestions * config('game.xp.per_correct_answer', 20);

            $percentage = $maxScore > 0
                ? round(($totalScore / $maxScore) * 100)
                : 0;

            $xp = $answers->sum('xp_earned');

            $progress = UserProgress::firstOrCreate(
                ['user_id' => $userId, 'level_id' => $levelId],
                ['status' => 'unlocked']
            );

            $progress->material_read_at = null;
            $progress->score = max($percentage, $progress->score ?? 0);
            $progress->attempt_count = ($progress->attempt_count ?? 0) + 1;

            if ($percentage >= 80) {
                $progress->status = 'completed';
                $progress->completed_at = now();
            }

            $progress->save();

            return view('pages.result', compact(
                'totalScore',
                'maxScore',
                'percentage',
                'correct',
                'wrong',
                'totalQuestions',
                'levelId',
                'xp'
            ));
        } catch (\Exception $e) {
            \Log::error("QuizController::result failed: " . $e->getMessage(), [
                'user_id' => auth()->id(),
                'level_id' => $levelId,
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->route('level.index')
                ->with('error', 'Terjadi kesalahan saat menampilkan hasil.');
        }
    }
}
