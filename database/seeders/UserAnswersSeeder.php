<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAnswersSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user_answers')->insert([
            [
                'user_id' => 1,
                'question_id' => 1,
                'user_answer' => '5',
                'is_correct' => true,
                'score' => 10,
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'question_id' => 2,
                'user_answer' => 'Besar',
                'is_correct' => true,
                'score' => 10,
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'question_id' => 3,
                'user_answer' => 'for i in range(1,4): print(i)',
                'is_correct' => true,
                'score' => 20,
                'created_at' => now(),
            ],
        ]);
    }
}