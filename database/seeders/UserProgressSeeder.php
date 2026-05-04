<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProgressSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user_progress')->insert([
            [
                'user_id' => 1,
                'level_id' => 1,
                'score' => 0,
                'status' => 'unlocked',
                'attempt_count' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'level_id' => 2,
                'score' => 0,
                'status' => 'locked',
                'attempt_count' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}