<?php

namespace App\Services;

use App\Models\User;
use App\Services\BadgeService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public static function handleLoginStreak(User $user)
    {
        $today = Carbon::now()->toDateString();
        $lastLogin = $user->last_login_date ? $user->last_login_date->toDateString() : null;
        
        if ($lastLogin !== $today) {
            $yesterday = Carbon::yesterday()->toDateString();
            
            if ($lastLogin === $yesterday) {
                $user->increment('login_streak');
            } else {
                $user->update(['login_streak' => 1]);
            }
            $user->update(['last_login_date' => $today]);
            
            return BadgeService::checkAndAward($user->id);
        }
        
        return [];
    }
}
