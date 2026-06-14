<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Question;
use App\Models\Badge;
use App\Models\User;
use App\Models\UserAnswer;
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
            'content' => 'nullable|string',
            'order_number' => 'required|integer',
        ]));
        return back()->with('success', 'Materi berhasil ditambahkan');
    }

    public function updateMaterial(Request $request, Level $level)
    {
        $level->update($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
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
        $levels = Level::withCount('questions')->orderBy('order_number')->get();
        return view('pages.admin.quizzes', compact('levels'));
    }

    public function levelQuiz(Level $level)
    {
        $questions = Question::where('level_id', $level->id)->orderBy('id')->get();
        $levels = Level::orderBy('order_number')->get();
        return view('pages.admin.quiz-level', compact('level', 'questions', 'levels'));
    }

    public function storeQuiz(Request $request)
    {
        $data = $request->validate([
            'level_id' => 'required|exists:levels,id',
            'type' => 'required|string',
            'question_text' => 'required|string',
            'code_snippet' => 'nullable|string',
            'options' => 'nullable|string',
            'correct_answer' => 'required|string',
            'explanation' => 'nullable|string',
            'test_cases' => 'nullable|array',
        ]);

        if (!empty($data['options'])) {
            $data['options'] = array_map('trim', explode("\n", $data['options']));
        }

        Question::create($data);
        return back()->with('success', 'Quiz berhasil ditambahkan');
    }

    public function updateQuiz(Request $request, Question $question)
    {
        $data = $request->validate([
            'level_id' => 'required|exists:levels,id',
            'type' => 'required|string',
            'question_text' => 'required|string',
            'code_snippet' => 'nullable|string',
            'options' => 'nullable|string',
            'correct_answer' => 'required|string',
            'explanation' => 'nullable|string',
            'test_cases' => 'nullable|array',
        ]);

        if (!empty($data['options'])) {
            $data['options'] = array_map('trim', explode("\n", $data['options']));
        } else {
            $data['options'] = null;
        }

        $question->update($data);
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
            'color' => 'nullable|string|max:7',
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
            'color' => 'nullable|string|max:7',
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
        $users = User::where('role', '!=', 'admin')
            ->orderByDesc('xp')
            ->get();

        return view('pages.admin.leaderboard', compact('users'));
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
        return back()->with('success', 'Data pelajar berhasil diperbarui');
    }

    public function destroyStudent(User $user)
    {
        if ($user->role === 'admin') {
            return back()->with('error', 'Tidak dapat menghapus akun admin.');
        }

        $user->badges()->detach();
        $user->answers()->delete();
        $user->progress()->delete();
        $user->streak()?->delete();
        $user->questionnaireResponses()?->delete();
        $user->delete();

        return back()->with('success', 'Mahasiswa berhasil dihapus');
    }
}