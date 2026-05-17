<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@pylearn.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'xp' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Test User',
                'email' => 'user@test.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'xp' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}