<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserStreakSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user_streaks')->insert([
            [
                'user_id' => 1,
                'current_streak' => 1,
                'max_streak' => 3,
                'last_correct_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}