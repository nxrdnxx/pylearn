<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Level;
use App\Models\Question;
use App\Models\UserAnswer;
use App\Models\UserBadge;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index() {
        $user = auth()->user();
        $userId = $user->id;

        $xp = $user->xp;
        $badgeCount = UserBadge::where('user_id', $userId)->count();
        $streak = $user->login_streak ?? 0;

        // Batch level completion
        $levels = Level::all();
        $totalLevel = $levels->count();

        $questionCounts = Question::select('level_id', DB::raw('count(*) as total'))
            ->groupBy('level_id')
            ->pluck('total', 'level_id');

        $answeredCounts = UserAnswer::where('user_id', $userId)
            ->join('questions', 'user_answers.question_id', '=', 'questions.id')
            ->select('questions.level_id', DB::raw('count(distinct user_answers.question_id) as answered'))
            ->groupBy('questions.level_id')
            ->pluck('answered', 'level_id');

        $completedLevel = 0;
        foreach ($levels as $level) {
            $total = $questionCounts[$level->id] ?? 0;
            $answered = $answeredCounts[$level->id] ?? 0;
            if ($total > 0 && $answered >= $total) {
                $completedLevel++;
            }
        }

        // Activities: batch with single join query
        $activities = UserAnswer::select(
                'user_answers.*',
                'levels.name as level_name',
                'levels.order_number',
                'questions.level_id'
            )
            ->join('questions', 'user_answers.question_id', '=', 'questions.id')
            ->join('levels', 'questions.level_id', '=', 'levels.id')
            ->where('user_answers.user_id', $userId)
            ->orderByDesc('user_answers.created_at')
            ->limit(10)
            ->get()
            ->groupBy('level_id')
            ->map(function ($items) {
                $first = $items->first();
                $questions = $items->count();
                $correctCount = $items->where('is_correct', true)->count();
                $totalScore = $items->sum('score');
                $scorePercent = $questions > 0 ? round(($correctCount / $questions) * 100) : 0;
                $passed = $questions > 0 && $correctCount >= ($questions * 0.6);

                return [
                    'level_name' => 'Lv.' . $first->order_number . ' — ' . $first->level_name,
                    'score' => $scorePercent,
                    'xp' => $totalScore > 0 ? $totalScore : ($correctCount * config('game.xp.per_correct_answer')),
                    'date' => Carbon::parse($first->created_at),
                    'status' => $passed ? 'Lulus' : 'Gagal'
                ];
            })
            ->values();

        return view('pages.profile', compact(
            'user',
            'xp',
            'completedLevel',
            'totalLevel',
            'badgeCount',
            'streak',
            'activities'
        ));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('pages.edit-profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = ['name' => $request->name];

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            $data['profile_picture'] = $request->file('profile_picture')->store('profile-pictures', 'public');
        }

        $user->update($data);

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui');
    }

    public function deletePhoto()
    {
        $user = auth()->user();

        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
            $user->update(['profile_picture' => null]);
        }

        return redirect()->route('profile.edit')->with('success', 'Foto profil berhasil dihapus');
    }
}
