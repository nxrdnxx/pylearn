<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Question;
use App\Models\UserAnswer;
use App\Models\UserProgress;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $levels = Level::orderBy('order_number')->get();

        // Batch: get question counts per level
        $questionCounts = Question::select('level_id', DB::raw('count(*) as total'))
            ->groupBy('level_id')
            ->pluck('total', 'level_id');

        // Batch: get user answers per level
        $userAnswers = UserAnswer::where('user_id', $userId)
            ->join('questions', 'user_answers.question_id', '=', 'questions.id')
            ->select('user_answers.*', 'questions.level_id')
            ->get()
            ->groupBy('level_id');

        // Batch: get material read status
        $materialRead = UserProgress::where('user_id', $userId)
            ->whereNotNull('material_read_at')
            ->pluck('material_read_at', 'level_id');

        $result = [];
        $previousCompleted = true;

        foreach ($levels as $level) {
            $total = $questionCounts[$level->id] ?? 0;
            $levelAnswers = $userAnswers[$level->id] ?? collect();

            $answered = $levelAnswers->pluck('question_id')->unique()->count();
            $correct = $levelAnswers->where('is_correct', true)
                ->pluck('question_id')
                ->unique()
                ->count();
            $scorePercent = $total > 0 ? round(($correct / $total) * 100) : 0;

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
                'has_content' => !is_null($level->content),
                'has_read' => $materialRead->has($level->id),
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
