<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProgress;
use App\Models\Level;

class ProgressController extends Controller
{
    public function checkLevelCompletion($levelId)
    {
        $user = auth()->user();

        $progress = UserProgress::where('user_id', $user->id)
            ->where('level_id', $levelId)
            ->first();

        if (!$progress) {
            return response()->json(['success' => false]);
        }

        // 🎯 RULE: kalau score >= 30 → selesai
        if ($progress->score >= 30) {
            $progress->update([
                'status' => 'completed',
                'completed_at' => now()
            ]);

            // 🔓 Unlock next level
            $nextLevel = Level::where('order_number', '>', $levelId)
                ->orderBy('order_number')
                ->first();

            if ($nextLevel) {
                UserProgress::firstOrCreate([
                    'user_id' => $user->id,
                    'level_id' => $nextLevel->id
                ], [
                    'status' => 'unlocked'
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'progress' => $progress
        ]);
    }
}