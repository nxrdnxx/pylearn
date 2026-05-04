<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function getByLevel($levelId)
    {
        $questions = Question::where('level_id', $levelId)->get();

        return response()->json([
            'success' => true,
            'data' => $questions
        ]);
    }
}