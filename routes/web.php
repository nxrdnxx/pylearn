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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('landing.blade.php');
// });

// LOGIN
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// REGISTER
Route::get('/register', [AuthController::class, 'registerView'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// WEBSITE
Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/level', [LevelController::class, 'index'])->name('level.index');
Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard.index');
Route::get('/badge', [BadgeController::class, 'index'])->name('badge.index');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/quiz', [QuizController::class, 'index'])->name('quiz');