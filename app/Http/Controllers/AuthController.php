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
        try {
            $credentials = $request->validated();
            $loginAsAdmin = $request->boolean('login_as_admin');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                
                $user = Auth::user();

                if ($loginAsAdmin && $user->role !== 'admin') {
                    Auth::logout();
                    return back()->with('error', 'Akun ini bukan admin');
                }

                if (!$loginAsAdmin && $user->role === 'admin') {
                    return redirect()->intended(route('admin.dashboard'));
                }
                
                $earnedBadges = \App\Services\UserService::handleLoginStreak($user);
                
                if (count($earnedBadges) > 0) {
                    session()->flash('new_badges', $earnedBadges);
                }

                if ($user->role === 'admin') {
                    return redirect()->intended(route('admin.dashboard'));
                }
                
                return redirect()->intended(route('dashboard.index'));
            }

            return back()->with('error', 'Email atau password salah');
        } catch (\Exception $e) {
            \Log::error("AuthController::login failed: " . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Terjadi kesalahan saat login. Silakan coba lagi.');
        }
    }

    // proses register
    public function register(\App\Http\Requests\RegisterRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);

            return redirect()->route('dashboard.index')
                ->with('success', 'Akun berhasil dibuat! Selamat datang di PyLearn.');
        } catch (\Exception $e) {
            \Log::error("AuthController::register failed: " . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.');
        }
    }

    // logout
    public function logout(Request $request)
    {
        try {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login');
        } catch (\Exception $e) {
            \Log::error("AuthController::logout failed: " . $e->getMessage());
            return redirect()->route('login');
        }
    }
}