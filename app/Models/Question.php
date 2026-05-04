<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'level_id',
        'type',
        'question_text',
        'code_snippet',
        'correct_answer',
        'explanation',
        'test_cases'
    ];

    protected $casts = [
        'test_cases' => 'array'
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function answers()
    {
        return $this->hasMany(UserAnswer::class);
    }
}