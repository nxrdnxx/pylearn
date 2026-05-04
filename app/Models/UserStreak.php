<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserStreak extends Model
{
    protected $fillable = [
        'user_id',
        'current_streak',
        'max_streak',
        'last_correct_at'
    ];

    protected $casts = [
        'last_correct_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}