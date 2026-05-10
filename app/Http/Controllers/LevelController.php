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
            $questionIds = Question::where('level_id', $level->id)->pluck('id');
            $total = $questionIds->count();

            // Get distinct answers per question (latest answer per question)
            $userAnswers = UserAnswer::where('user_id', $userId)
                ->whereIn('question_id', $questionIds)
                ->get();

            // Count unique questions answered
            $answered = $userAnswers->pluck('question_id')->unique()->count();
            
            // Count unique questions answered correctly
            $correct = $userAnswers->where('is_correct', true)
                ->pluck('question_id')
                ->unique()
                ->count();
            
            // Score sebagai persentase (0-100)
            $scorePercent = $total > 0 ? round(($correct / $total) * 100) : 0;

            // STATUS LOGIC
            if ($answered >= $total && $total > 0) {
                if ($scorePercent >= 80) {
                    $status = 'completed';
                } else {
                    $status = 'unlocked';
                }
            } elseif ($previousCompleted) {
                $status = 'unlocked';
            } else {
                $status = 'locked';
            }

            $previousCompleted = ($status === 'completed');

            $result[] = [
                'id' => $level->id,
                'order' => $level->order_number,
                'name' => $level->name,
                'description' => $level->description,
                'total' => $total,
                'answered' => $answered,
                'correct' => $correct,
                'score' => $scorePercent,
                'status' => $status,
            ];
        }

        return view('pages.levels', [
            'levels' => $result
        ]);
    }
}