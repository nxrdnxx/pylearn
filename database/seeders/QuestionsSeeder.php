<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('questions')->insert([

            /*
            |--------------------------------------------------------------------------
            | LEVEL 1 - DASAR PYTHON
            |--------------------------------------------------------------------------
            */

            [
                'level_id' => 1,
                'type' => 'output',
                'question_text' => 'Apa output dari kode berikut?',
                'code_snippet' => 'print(2 + 3)',
                'correct_answer' => '5',
                'explanation' => '2 + 3 = 5',
                'test_cases' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'level_id' => 1,
                'type' => 'output',
                'question_text' => 'Apa output dari kode berikut?',
                'code_snippet' => 'print("Hello " + "World")',
                'correct_answer' => 'Hello World',
                'explanation' => 'String digabung dengan operator +',
                'test_cases' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'level_id' => 1,
                'type' => 'output',
                'question_text' => 'Apa output dari kode berikut?',
                'code_snippet' => 'print(10 // 3)',
                'correct_answer' => '3',
                'explanation' => 'Operator // adalah pembagian bulat',
                'test_cases' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            /*
            |--------------------------------------------------------------------------
            | LEVEL 2 - PERCABANGAN
            |--------------------------------------------------------------------------
            */

            [
                'level_id' => 2,
                'type' => 'output',
                'question_text' => 'Apa output kode berikut?',
                'code_snippet' => "x = 10\nif x > 5:\n    print('Besar')",
                'correct_answer' => 'Besar',
                'explanation' => 'Karena 10 lebih besar dari 5',
                'test_cases' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'level_id' => 2,
                'type' => 'output',
                'question_text' => 'Apa output kode berikut?',
                'code_snippet' => "x = 3\nif x > 5:\n    print('Besar')\nelse:\n    print('Kecil')",
                'correct_answer' => 'Kecil',
                'explanation' => 'Karena 3 tidak lebih dari 5',
                'test_cases' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'level_id' => 2,
                'type' => 'output',
                'question_text' => 'Apa output kode berikut?',
                'code_snippet' => "x = 5\nif x == 5:\n    print('Sama')",
                'correct_answer' => 'Sama',
                'explanation' => 'Karena x sama dengan 5',
                'test_cases' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            /*
            |--------------------------------------------------------------------------
            | LEVEL 3 - LOOPING
            |--------------------------------------------------------------------------
            */

            [
                'level_id' => 3,
                'type' => 'output',
                'question_text' => 'Apa output dari kode berikut?',
                'code_snippet' => "for i in range(3):\n    print(i)",
                'correct_answer' => "0\n1\n2",
                'explanation' => 'range(3) menghasilkan 0,1,2',
                'test_cases' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'level_id' => 3,
                'type' => 'coding',
                'question_text' => 'Buat loop untuk mencetak angka 1 sampai 3',
                'code_snippet' => null,
                'correct_answer' => 'for i in range(1,4): print(i)',
                'explanation' => 'range(1,4) menghasilkan 1,2,3',
                'test_cases' => json_encode([
                    ['input' => null, 'output' => "1\n2\n3"]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'level_id' => 3,
                'type' => 'output',
                'question_text' => 'Apa output dari kode berikut?',
                'code_snippet' => "i = 1\nwhile i <= 3:\n    print(i)\n    i += 1",
                'correct_answer' => "1\n2\n3",
                'explanation' => 'Loop berjalan sampai i = 3',
                'test_cases' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}