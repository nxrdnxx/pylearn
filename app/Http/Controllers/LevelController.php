<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Question;
use App\Models\UserAnswer;

class LevelController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $levels = Level::orderBy('order_number')->get();

        $result = [];
        $previousCompleted = true; // level 1 terbuka

        foreach ($levels as $level) {

            // 🔥 Ambil semua question id di level ini
            $questionIds = Question::where('level_id', $level->id)->pluck('id');

            $total = $questionIds->count();

            // 🔥 semua jawaban user di level ini
            $userAnswers = UserAnswer::where('user_id', $userId)
                ->whereIn('question_id', $questionIds);

            $answered = (clone $userAnswers)
            ->distinct('question_id')
            ->count('question_id');
            $correct = (clone $userAnswers)
            ->where('is_correct', true)
            ->distinct('question_id')
            ->count('question_id');
            $totalScore = UserAnswer::where('user_id', $userId)
            ->whereIn('question_id', $questionIds)
            ->selectRaw('MAX(score) as score')
            ->groupBy('question_id')
            ->get()
            ->sum('score');

            // 🔥 STATUS LOGIC
            if ($answered >= $total && $total > 0) {

                // 🔥 lulus jika score >= 50
                if ($totalScore >= 30) {
                    $status = 'completed';
                } else {
                    $status = 'unlocked'; // belum lulus
                }

            } elseif ($previousCompleted) {
                $status = 'unlocked';
            } else {
                $status = 'locked';
            }

            // 🔥 unlock next level
            $previousCompleted = ($status === 'completed');

            $result[] = [
                'id' => $level->id,
                'order' => $level->order_number,
                'name' => $level->name,
                'description' => $level->description,
                'total' => $total,
                'answered' => $answered,
                'correct' => $correct,
                'score' => $totalScore,
                'status' => $status,
            ];
        }

        return view('pages.levels', [
            'levels' => $result
        ]);
    }
}