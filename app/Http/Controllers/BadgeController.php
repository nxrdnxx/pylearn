<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use App\Models\UserBadge;
use App\Services\BadgeService;

class BadgeController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        
        BadgeService::checkAndAward($userId);

        $allBadges = Badge::all()->keyBy('id');

        $myBadges = UserBadge::where('user_id', $userId)
            ->pluck('badge_id')
            ->toArray();

        $earned = [];
        $locked = [];
        
        foreach ($allBadges as $badge) {
            if (in_array($badge->id, $myBadges)) {
                $earned[] = $badge;
            } else {
                $locked[] = $badge;
            }
        }

        $total = count($allBadges);
        $owned = count($myBadges);
        $percent = $total > 0 ? ($owned / $total) * 100 : 0;

        return view('pages.badge', [
            'earned' => $earned,
            'locked' => $locked,
            'total' => $total,
            'owned' => $owned,
            'percent' => $percent
        ]);
    }
}