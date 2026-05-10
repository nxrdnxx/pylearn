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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Diamond Collector',
                'description' => 'Kumpulkan total 5000 XP',
                'icon' => 'fa-solid fa-gem',
                'condition' => 'xp_5000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Streak Starter',
                'description' => 'Pertahankan streak selama 3 hari',
                'icon' => 'fa-solid fa-fire-burner',
                'condition' => 'streak_3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Python King',
                'description' => 'Raih peringkat #1 di leaderboard',
                'icon' => 'fa-solid fa-crown',
                'condition' => 'rank_1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Night Owl',
                'description' => 'Belajar di atas jam 11 malam',
                'icon' => 'fa-solid fa-owl',
                'condition' => 'night_study',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quiz Master',
                'description' => 'Selesaikan semua level dengan skor sempurna',
                'icon' => 'fa-solid fa-graduation-cap',
                'condition' => 'perfect_score',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Early Bird',
                'description' => 'Belajar di pagi buta (jam 4 - 7 pagi)',
                'icon' => 'fa-solid fa-sun',
                'condition' => 'early_bird',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Consistent Coder',
                'description' => 'Pertahankan streak selama 7 hari berturut-turut',
                'icon' => 'fa-solid fa-calendar-check',
                'condition' => 'streak_7',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Problem Solver',
                'description' => 'Jawab total 100 soal dengan benar',
                'icon' => 'fa-solid fa-brain',
                'condition' => 'questions_100',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}