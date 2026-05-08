<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyQuestQuestion extends Model
{
    protected $fillable = [
        'question_text',
        'code_snippet',
        'correct_answer',
        'explanation'
    ];
}