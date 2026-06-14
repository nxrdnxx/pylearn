<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BadgesSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('badges')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        DB::table('badges')->insert([
            [
                'name' => 'First Blood',
                'description' => 'Selesaikan setidaknya satu soal di Level 1',
                'icon' => 'fa-solid fa-droplet',
                'condition' => 'first_level',
                'color' => '#ef4444',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Diamond Collector',
                'description' => 'Kumpulkan total 5000 XP',
                'icon' => 'fa-solid fa-gem',
                'condition' => 'xp_5000',
                'color' => '#3b82f6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Streak Starter',
                'description' => 'Pertahankan streak selama 3 hari',
                'icon' => 'fa-solid fa-fire-burner',
                'condition' => 'streak_3',
                'color' => '#f97316',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Python King',
                'description' => 'Raih peringkat #1 di leaderboard',
                'icon' => 'fa-solid fa-crown',
                'condition' => 'rank_1',
                'color' => '#f59e0b',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Night Owl',
                'description' => 'Belajar di atas jam 11 malam',
                'icon' => 'fa-solid fa-moon',
                'condition' => 'night_study',
                'color' => '#6366f1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quiz Master',
                'description' => 'Selesaikan quiz level 1 sampai 10',
                'icon' => 'fa-solid fa-graduation-cap',
                'condition' => 'perfect_score',
                'color' => '#10b981',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Early Bird',
                'description' => 'Belajar di pagi buta (jam 4 - 7 pagi)',
                'icon' => 'fa-solid fa-sun',
                'condition' => 'early_bird',
                'color' => '#eab308',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Consistent Coder',
                'description' => 'Pertahankan streak selama 7 hari berturut-turut',
                'icon' => 'fa-solid fa-calendar-check',
                'condition' => 'streak_7',
                'color' => '#06b6d4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Problem Solver',
                'description' => 'Jawab total 100 soal dengan benar',
                'icon' => 'fa-solid fa-brain',
                'condition' => 'questions_100',
                'color' => '#a855f7',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}