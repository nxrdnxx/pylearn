<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Question;
use App\Models\UserAnswer;

class QuizController extends Controller
{
    public function show($levelId)
{
    $level = Level::findOrFail($levelId);

    $questions = Question::where('level_id', $levelId)->get();

    return view('pages.quiz', [
        'level' => $level,
        'questions' => $questions
    ]);
}

    public function answer(Request $request)
{
    $question = Question::findOrFail($request->question_id);

    $userAnswer = trim($request->answer);
    $correctAnswer = trim($question->correct_answer);

    $isCorrect = strtolower($userAnswer) == strtolower($correctAnswer);

    UserAnswer::updateOrCreate(
        [
            'user_id' => auth()->id(),
            'question_id' => $question->id
        ],
        [
            'user_answer' => $userAnswer,
            'is_correct' => $isCorrect,
            'score' => $isCorrect ? 10 : 0
        ]
    );

    // XP user
    if ($isCorrect) {
        auth()->user()->increment('xp', 10);
    }

    $next = $request->current + 1;

    return back()->with([
    'is_correct' => $isCorrect,
    'explanation' => $question->explanation,
    'correct_answer' => $question->correct_answer
]);
}
}