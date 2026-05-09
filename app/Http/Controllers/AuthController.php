<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Services\BadgeService;
use Carbon\Carbon;

class AuthController extends Controller
{
    // halaman login
    public function index()
    {
        return view('pages.login');
    }

    // halaman register
    public function registerView()
    {
        return view('pages.register');
    }

    // proses login
    public function login(\App\Http\Requests\LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            $earnedBadges = \App\Services\UserService::handleLoginStreak($user);
            
            if (count($earnedBadges) > 0) {
                session()->flash('new_badges', $earnedBadges);
            }
            
            return redirect()->route('dashboard.index');
        }

        return back()->with('error', 'Email atau password salah');
    }

    // proses register
    public function register(\App\Http\Requests\RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard.index');
    }

    // logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}