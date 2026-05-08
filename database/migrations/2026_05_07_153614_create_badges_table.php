<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $badges = [
            ['name' => 'First Blood', 'description' => 'Selesaikan Level 1', 'icon' => 'fa-droplet', 'color' => '#ef4444', 'condition' => 'first_level'],
            ['name' => 'Quiz Master', 'description' => 'Skor 100% semua level', 'icon' => 'fa-crown', 'color' => '#f59e0b', 'condition' => 'perfect_score'],
            ['name' => 'Python King', 'description' => 'Menempati #1 rank', 'icon' => 'fa-chess-king', 'color' => '#fbbf24', 'condition' => 'rank_1'],
            ['name' => 'Night Owl', 'description' => 'Belajar jam 23:00+', 'icon' => 'fa-moon', 'color' => '#8b5cf6', 'condition' => 'night_study'],
            ['name' => 'Diamond', 'description' => '5000 XP terkumpul', 'icon' => 'fa-gem', 'color' => '#06b6d4', 'condition' => 'xp_5000'],
            ['name' => 'Streak Starter', 'description' => 'Streak 3 hari', 'icon' => 'fa-fire', 'color' => '#f97316', 'condition' => 'streak_3'],
        ];

        foreach ($badges as $badge) {
            DB::table('badges')->updateOrInsert(['name' => $badge['name']], $badge);
        }
    }

    public function down(): void
    {
        DB::table('badges')->whereIn('name', ['First Blood', 'Quiz Master', 'Python King', 'Night Owl', 'Diamond', 'Streak Starter'])->delete();
    }
};