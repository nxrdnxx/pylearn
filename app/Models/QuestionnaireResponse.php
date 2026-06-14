<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionnaireResponse extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'q_1',
        'q_2',
        'q_3',
        'q_4',
        'q_5',
        'q_6',
        'q_7',
        'q_8',
        'q_9',
        'q_10',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
