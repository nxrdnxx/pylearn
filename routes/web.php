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
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PlaygroundController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuestionnaireController;

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

// LOGIN (hanya Google OAuth untuk user biasa)
Route::get('/login', [AuthController::class, 'index'])->name('login');

// ADMIN LOGIN (basic auth)
Route::get('/admin/login', [AuthController::class, 'adminLoginView'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'adminLogin'])->name('admin.login.post')->middleware('throttle:5,1');

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// GOOGLE OAUTH
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');

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
Route::get('/playground', [PlaygroundController::class, 'index'])
    ->name('playground.index')
    ->middleware('auth');
Route::post('/playground/execute', [PlaygroundController::class, 'execute'])
    ->name('playground.execute')
    ->middleware('auth');
Route::get('/profile', [ProfileController::class, 'index'])
    ->name('profile.index')
    ->middleware('auth');
Route::get('/profile/edit', [ProfileController::class, 'edit'])
    ->name('profile.edit')
    ->middleware('auth');
Route::put('/profile', [ProfileController::class, 'update'])
    ->name('profile.update')
    ->middleware('auth');
Route::delete('/profile/photo', [ProfileController::class, 'deletePhoto'])
    ->name('profile.delete-photo')
    ->middleware('auth');
Route::get('/materials/{level}', [MaterialController::class, 'show'])
    ->name('material.show')
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

// QUESTIONNAIRE
Route::get('/questionnaire/questions', [QuestionnaireController::class, 'getQuestions'])
    ->name('questionnaire.questions')
    ->middleware('auth');
Route::post('/questionnaire/submit', [QuestionnaireController::class, 'submit'])
    ->name('questionnaire.submit')
    ->middleware('auth');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/materials', [AdminController::class, 'materials'])->name('admin.materials');
    Route::post('/materials', [AdminController::class, 'storeMaterial'])->name('admin.materials.store');
    Route::put('/materials/{level}', [AdminController::class, 'updateMaterial'])->name('admin.materials.update');
    Route::delete('/materials/{level}', [AdminController::class, 'destroyMaterial'])->name('admin.materials.destroy');
    Route::get('/quizzes', [AdminController::class, 'quizzes'])->name('admin.quizzes');
    Route::get('/quiz/{level}', [AdminController::class, 'levelQuiz'])->name('admin.quizzes.level');
    Route::post('/quizzes', [AdminController::class, 'storeQuiz'])->name('admin.quizzes.store');
    Route::put('/quizzes/{question}', [AdminController::class, 'updateQuiz'])->name('admin.quizzes.update');
    Route::delete('/quizzes/{question}', [AdminController::class, 'destroyQuiz'])->name('admin.quizzes.destroy');
    Route::get('/badges', [AdminController::class, 'badges'])->name('admin.badges');
    Route::post('/badges', [AdminController::class, 'storeBadge'])->name('admin.badges.store');
    Route::put('/badges/{badge}', [AdminController::class, 'updateBadge'])->name('admin.badges.update');
    Route::delete('/badges/{badge}', [AdminController::class, 'destroyBadge'])->name('admin.badges.destroy');
    Route::get('/levels', [AdminController::class, 'levels'])->name('admin.levels');
    Route::put('/levels/{level}', [AdminController::class, 'updateLevel'])->name('admin.levels.update');
    Route::get('/leaderboard', [AdminController::class, 'leaderboard'])->name('admin.leaderboard');
    Route::post('/leaderboard/reset', [AdminController::class, 'resetLeaderboard'])->name('admin.leaderboard.reset');
    Route::get('/quiz-results', [AdminController::class, 'quizResults'])->name('admin.quiz-results');
    Route::get('/students', [AdminController::class, 'students'])->name('admin.students');
    Route::put('/students/{user}', [AdminController::class, 'updateStudent'])->name('admin.students.update');
    Route::delete('/students/{user}', [AdminController::class, 'destroyStudent'])->name('admin.students.destroy');
});
