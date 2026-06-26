<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use App\Models\Question;
use App\Models\UserAnswer;
use App\Models\UserBadge;
use App\Models\Badge;
use App\Services\DailyQuestService;
use App\Services\BadgeService;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if (!$user) {
            return redirect()->route('login');
        }

        $earnedBadges = BadgeService::checkAndAward($user->id);
        if (count($earnedBadges) > 0) {
            session()->flash('new_badges', $earnedBadges);
        }
        
        $data = \App\Services\DashboardService::getDashboardData($user);

        return view('pages.dashboard', $data);
    }
}