<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    protected $fillable = [
        'user_id',
        'question_id',
        'user_answer',
        'is_correct',
        'score',
        'xp_earned',
        'streak'
    ];

    public $timestamps = false; // karena cuma pakai created_at

    protected $casts = [
        'is_correct' => 'boolean',
        'created_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}