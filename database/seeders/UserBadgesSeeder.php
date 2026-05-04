<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserBadgesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user_badges')->insert([
            [
                'user_id' => 1,
                'badge_id' => 1, // Pemula
                'earned_at' => now(),
            ],
        ]);
    }
}