<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'xp'
    ];

    // 🔥 RELASI

    public function answers()
    {
        return $this->hasMany(UserAnswer::class);
    }

    public function progress()
    {
        return $this->hasMany(UserProgress::class);
    }

    public function badges()
    {
        return $this->belongsToMany(Badge::class, 'user_badges')
            ->withPivot('earned_at');
    }

    public function streak()
    {
        return $this->hasOne(UserStreak::class);
    }
}