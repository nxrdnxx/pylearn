<?php

namespace App\Http\Controllers;

use App\Models\Leaderboard;
use App\Models\User;

class LeaderboardController extends Controller
{
    public function index()
    {
        // ambil semua user urut XP
        $users = User::orderByDesc('xp')->get();

        // ranking manual
        $users->map(function ($user, $index) {
            $user->rank = $index + 1;

            // contoh level dari XP (bebas kamu atur)
            $user->level = floor($user->xp / 500);

            return $user;
        });

        // TOP 3 (podium)
        $top3 = $users->take(3);

        // sisanya
        $others = $users->slice(3);

        // user login
        $me = auth()->user();
        $myRank = $users->firstWhere('id', $me->id)?->rank ?? '-';

        return view('pages.leaderboard', compact(
            'users',
            'top3',
            'others',
            'me',
            'myRank'
        ));
    }

    public function myRank()
    {
        $user = auth()->user();

        $rank = User::where('xp', '>', $user->xp)->count() + 1;

        return response()->json([
            'success' => true,
            'rank' => $rank,
            'xp' => $user->xp
        ]);
    }
}