<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    // halaman login (hanya Google OAuth untuk user biasa)
    public function index()
    {
        return view('pages.login');
    }

    // halaman login admin (basic auth)
    public function adminLoginView()
    {
        return view('pages.admin-login');
    }

    // proses login admin
    public function adminLogin(\App\Http\Requests\LoginRequest $request)
    {
        try {
            $credentials = $request->validated();

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                if ($user->role !== 'admin') {
                    Auth::logout();
                    return back()->with('error', 'Akun ini bukan admin');
                }

                $request->session()->regenerate();

                return redirect()->intended(route('admin.dashboard'));
            }

            return back()->with('error', 'Email atau password salah');
        } catch (\Exception $e) {
            \Log::error("AuthController::adminLogin failed: " . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Terjadi kesalahan saat login. Silakan coba lagi.');
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

    // Redirect ke Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback dari Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Cari user berdasarkan google_id, atau email
            $user = User::where('google_id', $googleUser->id)
                ->orWhere('email', $googleUser->email)
                ->first();

            if ($user) {
                // Update google_id jika belum ada
                if (!$user->google_id) {
                    $user->update(['google_id' => $googleUser->id]);
                }
            } else {
                // Buat user baru dengan password acak aman
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => Hash::make(\Illuminate\Support\Str::random(24)),
                ]);
            }

            Auth::login($user);
            
            // Handle login streak & badge
            $earnedBadges = \App\Services\UserService::handleLoginStreak($user);
            if (count($earnedBadges) > 0) {
                session()->flash('new_badges', $earnedBadges);
            }

            if ($user->role === 'admin') {
                return redirect()->intended(route('admin.dashboard'))
                    ->with('success', 'Berhasil masuk sebagai Admin via Google!');
            }

            return redirect()->intended(route('dashboard.index'))
                ->with('success', 'Berhasil masuk dengan Google!');

        } catch (\Exception $e) {
            \Log::error("AuthController::handleGoogleCallback failed: " . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('login')->with('error', 'Terjadi kesalahan saat masuk dengan Google. Silakan coba lagi.');
        }
    }
}