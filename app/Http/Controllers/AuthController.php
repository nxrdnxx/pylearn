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
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            
            $user = Auth::user();
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
                
                $earnedBadges = BadgeService::checkAndAward($user->id);
                if (count($earnedBadges) > 0) {
                    session()->flash('new_badges', $earnedBadges);
                }
            }
            
            return redirect()->route('dashboard.index');
        }

        return back()->with('error', 'Email atau password salah');
    }

    // proses register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ]);

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