<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('levels')->insert([
            [
                'name' => 'Level 1 - Dasar Python',
                'description' => 'Pengenalan syntax dasar Python',
                'order_number' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Level 2 - Percabangan',
                'description' => 'If else dan logika',
                'order_number' => 2,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Level 3 - Looping',
                'description' => 'Perulangan for dan while',
                'order_number' => 3,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}