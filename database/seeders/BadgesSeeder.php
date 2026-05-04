<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BadgesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('badges')->insert([
            [
                'name' => 'Pemula',
                'description' => 'Menyelesaikan level pertama',
                'icon' => 'badge1.png',
                'condition' => json_encode(['type' => 'level_complete', 'level' => 1]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Konsisten',
                'description' => 'Streak 3 hari',
                'icon' => 'badge2.png',
                'condition' => json_encode(['type' => 'streak', 'days' => 3]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Master Python',
                'description' => 'Menyelesaikan semua level',
                'icon' => 'badge3.png',
                'condition' => json_encode(['type' => 'all_levels_complete']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}