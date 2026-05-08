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
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Level 2 - Percabangan',
            'description' => 'If else dan logika',
            'order_number' => 2,
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Level 3 - Looping',
            'description' => 'Perulangan for dan while',
            'order_number' => 3,
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Level 4 - Looping Lanjutan',
            'description' => 'Nested loop dan variasi looping',
            'order_number' => 4,
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Level 5 - Functions & Modules',
            'description' => 'Membuat fungsi dan menggunakan module',
            'order_number' => 5,
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
    }
}