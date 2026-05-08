<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Question;
use App\Models\UserAnswer;
use App\Services\BadgeService;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function show($levelId)
{
    $level = Level::findOrFail($levelId);

    $questions = Question::where('level_id', $levelId)->get();

    $questions = Question::where('level_id', $levelId)
        ->orderBy('id')
        ->get();

    // kalau kosong → ini masalahnya
    if ($questions->isEmpty()) {
        dd('Soal tidak ada di database!');
    }

    $current = request()->get('q', 1);

    $question = $questions[$current - 1] ?? null;

    return view('pages.quiz', compact(
        'level',
        'questions',
        'question',
        'current'
     ));
}

    public function answer(Request $request)
{
    $question = Question::findOrFail($request->question_id);
    $user = auth()->user();

    $userAnswer = trim($request->answer);
    $correctAnswer = trim($question->correct_answer);

    $isCorrect = strtolower($userAnswer) === strtolower($correctAnswer);

    // ========== HITUNG STREAK ==========
    $lastAnswer = UserAnswer::where('user_id', $user->id)
        ->orderByDesc('id')
        ->first();

    $streak = 0;
    if ($lastAnswer && $lastAnswer->is_correct) {
        $streak = $lastAnswer->streak ?? 0;
    }

    // ========== HITUNG XP ==========
    $xpEarned = 0;
    if ($isCorrect) {
        $xpEarned = 20; // XP dasar
        
        // Streak bonus: mulai dari streak 3++
        if ($streak >= 3) {
            $xpEarned += 5; // Bonus streak
        }
        
        $streak++; // Tambah streak
    } else {
        $streak = 0; // Reset streak
    }

    // ✅ SIMPAN KE DATABASE
    UserAnswer::updateOrCreate(
        [
            'user_id' => $user->id,
            'question_id' => $question->id,
        ],
        [
            'user_answer' => $userAnswer,
            'is_correct' => $isCorrect,
            'score' => $isCorrect ? 20 : 0,
            'xp_earned' => $xpEarned,
            'streak' => $streak,
        ]
    );

    // ✅ UPDATE XP USER
    if ($isCorrect) {
        $user->increment('xp', $xpEarned);
        
        $earnedBadges = BadgeService::checkAndAward($user->id, $xpEarned);
        if (count($earnedBadges) > 0) {
            session()->flash('new_badges', $earnedBadges);
        }
    }

    return redirect()->route('quiz.show', [
        'level' => $request->level_id,
        'q' => $request->current
    ])->with([
        'is_correct' => $isCorrect,
        'correct_answer' => $question->correct_answer,
        'explanation' => $question->explanation,
        'feedback_question_id' => $question->id,
        'xp_earned' => $xpEarned,
    ]);
}
   public function result($levelId)
{
    $userId = auth()->id();

    // Ambil semua soal di level ini
    $questions = Question::where('level_id', $levelId)->get();
    $totalQuestions = $questions->count();

    // Ambil semua jawaban user untuk soal di level ini
    $answers = UserAnswer::where('user_id', $userId)
        ->whereIn('question_id', $questions->pluck('id'))
        ->get();

    // Hitung benar & salah
    $correct = $answers->where('is_correct', 1)->count();
    $wrong = $answers->where('is_correct', 0)->count();

    // Total skor user (20 per benar)
    $totalScore = $answers->sum('score');

    // Skor maksimal
    $maxScore = $totalQuestions * 20;

    // Persentase nilai
    $percentage = $maxScore > 0 
        ? round(($totalScore / $maxScore) * 100) 
        : 0;

    // XP total
    $xp = $answers->sum('xp_earned');

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
}
}