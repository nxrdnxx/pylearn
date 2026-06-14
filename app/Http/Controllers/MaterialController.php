<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\UserProgress;
use Illuminate\Http\Request;
use League\CommonMark\GithubFlavoredMarkdownConverter;

class MaterialController extends Controller
{
    public function show($levelId)
    {
        $level = Level::findOrFail($levelId);
        $user = auth()->user();

        if (!$level->content) {
            return redirect()->route('level.index')->with('error', 'Materi belum tersedia untuk level ini.');
        }

        $progress = UserProgress::firstOrCreate(
            ['user_id' => $user->id, 'level_id' => $level->id],
            ['status' => 'unlocked']
        );

        $progress->update(['material_read_at' => now()]);

        $converter = new GithubFlavoredMarkdownConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);

        $content = $converter->convert($level->content);

        return view('pages.material', compact('level', 'content'));
    }
}
