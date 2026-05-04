<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Question;
use App\Models\UserAnswer;
use App\Models\User;
use App\Models\UserProgress;
use App\Models\Badge;
use App\Models\UserBadge;

class AnswerController extends Controller
{
    public function submit(Request $request)
    {
        $user = auth()->user();

        $question = Question::findOrFail($request->question_id);

        // 🔥 CEK JAWABAN
        $isCorrect = trim($request->answer) == trim($question->correct_answer);

        // 🎯 SCORE LOGIC
        $score = 0;
        if ($isCorrect) {
            $score = match($question->type) {
                'output' => 10,
                'coding' => 20,
                'debugging' => 30,
            };
        }

        // 💾 SIMPAN JAWABAN
        UserAnswer::create([
            'user_id' => $user->id,
            'question_id' => $question->id,
            'user_answer' => $request->answer,
            'is_correct' => $isCorrect,
            'score' => $score,
        ]);

        // ⭐ TAMBAH XP
        if ($isCorrect) {
            $user->increment('xp', $score);
        }

        // 📊 UPDATE PROGRESS
        $progress = UserProgress::firstOrCreate(
            [
                'user_id' => $user->id,
                'level_id' => $question->level_id
            ],
            [
                'score' => 0,
                'status' => 'unlocked',
                'attempt_count' => 1
            ]
        );

        if ($isCorrect) {
            $progress->increment('score', $score);
        }

        return response()->json([
            'success' => true,
            'is_correct' => $isCorrect,
            'score' => $score,
            'xp' => $user->xp
        ]);
    }
    private function checkBadge($user)
{
    $badges = Badge::all();

    foreach ($badges as $badge) {
        $condition = json_decode($badge->condition, true);

        $earned = false;

        switch ($condition['type']) {
            case 'level_complete':
                $earned = \App\Models\UserProgress::where('user_id', $user->id)
                    ->where('level_id', $condition['level'])
                    ->where('status', 'completed')
                    ->exists();
                break;

            case 'streak':
                $earned = $user->streak->current_streak >= $condition['days'];
                break;

            case 'all_levels_complete':
                $total = \App\Models\Level::count();
                $completed = \App\Models\UserProgress::where('user_id', $user->id)
                    ->where('status', 'completed')
                    ->count();
                $earned = $total == $completed;
                break;
        }

        if ($earned) {
            UserBadge::firstOrCreate([
                'user_id' => $user->id,
                'badge_id' => $badge->id
            ]);
        }
    }
}
}