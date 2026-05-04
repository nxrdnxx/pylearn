<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeaderboardSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('leaderboards')->insert([
            [
                'user_id' => 1,
                'total_score' => 100,
                'rank' => 1,
                'period' => 'all_time',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}