<?php

namespace App\Http\Controllers;

use App\Services\PistonApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class PlaygroundController extends Controller
{
    public function index()
    {
        return view('pages.playground');
    }

    public function execute(Request $request, PistonApiService $piston)
    {
        $request->validate([
            'code' => 'required|string|max:5000',
            'stdin' => 'nullable|string|max:1000',
        ]);

        $key = 'playground:' . auth()->id();

        $maxAttempts = 20;
        $decaySeconds = 60;

        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            $seconds = RateLimiter::availableIn($key);
            return response()->json([
                'success' => false,
                'output' => "Terlalu banyak permintaan. Silakan tunggu {$seconds} detik.",
                'stdout' => '',
                'stderr' => 'Rate limit exceeded',
            ], 429);
        }

        RateLimiter::hit($key, $decaySeconds);

        $result = $piston->execute($request->code, $request->stdin ?? '');

        return response()->json($result);
    }
}
