<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Question;
use App\Models\Badge;
use App\Models\User;
use App\Models\UserAnswer;
use App\Models\Leaderboard;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_users' => User::count(),
            'total_levels' => Level::count(),
            'total_questions' => Question::count(),
            'total_badges' => Badge::count(),
        ];
        return view('pages.admin.dashboard', compact('stats'));
    }

    public function materials()
    {
        $levels = Level::with('questions')->orderBy('order_number')->get();
        return view('pages.admin.materials', compact('levels'));
    }

    public function storeMaterial(Request $request)
    {
        Level::create($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order_number' => 'required|integer',
        ]));
        return back()->with('success', 'Materi berhasil ditambahkan');
    }

    public function updateMaterial(Request $request, Level $level)
    {
        $level->update($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order_number' => 'required|integer',
        ]));
        return back()->with('success', 'Materi berhasil diperbarui');
    }

    public function destroyMaterial(Level $level)
    {
        $level->delete();
        return back()->with('success', 'Materi berhasil dihapus');
    }

    public function quizzes()
    {
        $questions = Question::with('level')->orderBy('level_id')->get();
        $levels = Level::all();
        return view('pages.admin.quizzes', compact('questions', 'levels'));
    }

    public function storeQuiz(Request $request)
    {
        Question::create($request->validate([
            'level_id' => 'required|exists:levels,id',
            'type' => 'required|string',
            'question_text' => 'required|string',
            'code_snippet' => 'nullable|string',
            'correct_answer' => 'required|string',
            'explanation' => 'nullable|string',
            'test_cases' => 'nullable|array',
        ]));
        return back()->with('success', 'Quiz berhasil ditambahkan');
    }

    public function updateQuiz(Request $request, Question $question)
    {
        $question->update($request->validate([
            'level_id' => 'required|exists:levels,id',
            'type' => 'required|string',
            'question_text' => 'required|string',
            'code_snippet' => 'nullable|string',
            'correct_answer' => 'required|string',
            'explanation' => 'nullable|string',
            'test_cases' => 'nullable|array',
        ]));
        return back()->with('success', 'Quiz berhasil diperbarui');
    }

    public function destroyQuiz(Question $question)
    {
        $question->delete();
        return back()->with('success', 'Quiz berhasil dihapus');
    }

    public function badges()
    {
        $badges = Badge::all();
        return view('pages.admin.badges', compact('badges'));
    }

    public function storeBadge(Request $request)
    {
        Badge::create($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'condition' => 'nullable|string',
        ]));
        return back()->with('success', 'Badge berhasil ditambahkan');
    }

    public function updateBadge(Request $request, Badge $badge)
    {
        $badge->update($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'condition' => 'nullable|string',
        ]));
        return back()->with('success', 'Badge berhasil diperbarui');
    }

    public function destroyBadge(Badge $badge)
    {
        $badge->delete();
        return back()->with('success', 'Badge berhasil dihapus');
    }

    public function levels()
    {
        $levels = Level::with('questions')->orderBy('order_number')->get();
        return view('pages.admin.levels', compact('levels'));
    }

    public function updateLevel(Request $request, Level $level)
    {
        $level->update($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order_number' => 'required|integer',
            'is_active' => 'boolean',
        ]));
        return back()->with('success', 'Level berhasil diperbarui');
    }

    public function leaderboard()
    {
        $leaderboard = Leaderboard::with('user')->orderByDesc('total_score')->get();
        return view('pages.admin.leaderboard', compact('leaderboard'));
    }

    public function resetLeaderboard()
    {
        Leaderboard::truncate();
        return back()->with('success', 'Leaderboard berhasil direset');
    }

    public function quizResults()
    {
        $results = UserAnswer::with(['user', 'question.level'])
            ->orderByDesc('created_at')
            ->paginate(20);
        return view('pages.admin.quiz-results', compact('results'));
    }

    public function students()
    {
        $users = User::with(['progress', 'badges', 'streak'])
            ->where('role', '!=', 'admin')
            ->paginate(20);
        return view('pages.admin.students', compact('users'));
    }

    public function updateStudent(Request $request, User $user)
    {
        $user->update($request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'xp' => 'integer',
        ]));
        return back()->with('success', 'Data mahasiswa berhasil diperbarui');
    }
}