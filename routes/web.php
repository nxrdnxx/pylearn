<?php

use App\Http\Controllers\BadgeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LeaderboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\DailyQuestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/fix-db', function() {
    try {
        // Clear caches
        \Illuminate\Support\Facades\Artisan::call('cache:clear');
        
        // Ensure questions exist
        if (\App\Models\DailyQuestQuestion::count() === 0) {
            \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'DailyQuestQuestionsSeeder', '--force' => true]);
        }
        
        // Reset quest data for current user to allow fresh start
        if (auth()->check()) {
             \App\Models\DailyQuest::where('user_id', auth()->id())->delete();
             $output = "Quest history cleared for " . auth()->user()->name . ". New quests will be generated on dashboard.";
        } else {
             $output = "No user logged in. Database questions checked.";
        }

        return "<h3>System Reset Successful</h3><p>" . $output . "</p><br><a href='/dashboard' style='padding: 10px 20px; background: #3b82f6; color: white; border-radius: 8px; text-decoration: none;'>Go to Dashboard</a>";
    } catch (\Exception $e) {
        return "Fix failed: " . $e->getMessage();
    }
});

// Route::get('/', function () {
//     return view('landing.blade.php');
// });

// LOGIN
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post')->middleware('throttle:5,1');

// REGISTER
Route::get('/register', [AuthController::class, 'registerView'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post')->middleware('throttle:5,1');

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// WEBSITE
Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard.index')
    ->middleware('auth');
Route::get('/levels', [LevelController::class, 'index'])
    ->name('level.index')
    ->middleware('auth');
Route::get('/leaderboard', [LeaderboardController::class, 'index'])
    ->name('leaderboard.index')
    ->middleware('auth');
Route::get('/badge', [BadgeController::class, 'index'])
    ->name('badge.index')
    ->middleware('auth');
Route::get('/profile', [ProfileController::class, 'index'])
    ->name('profile.index')
    ->middleware('auth');
Route::get('/quiz/{level}', [QuizController::class, 'show'])
    ->name('quiz.show')
    ->middleware('auth');
Route::get('/quiz/{level}/result', [QuizController::class, 'result'])
    ->name('quiz.result')
    ->middleware('auth');
Route::post('/quiz/answer', [QuizController::class, 'answer'])
    ->name('quiz.answer')
    ->middleware('auth');

// DAILY QUEST
Route::get('/daily-quest', [DailyQuestController::class, 'show'])
    ->name('daily-quest.show')
    ->middleware('auth');
Route::get('/daily-quest/data', [DailyQuestController::class, 'getQuestData'])
    ->name('daily-quest.data')
    ->middleware('auth');
Route::post('/daily-quest', [DailyQuestController::class, 'submit'])
    ->name('daily-quest.submit')
    ->middleware('auth');
