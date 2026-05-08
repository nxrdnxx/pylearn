<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyQuest extends Model
{
    protected $fillable = [
        'user_id',
        'question_id',
        'quest_date',
        'user_answer',
        'is_correct',
        'xp_earned',
        'completed'
    ];

    protected $casts = [
        'quest_date' => 'date',
        'is_correct' => 'boolean',
        'completed' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(DailyQuestQuestion::class);
    }
}