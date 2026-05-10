<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DailyQuestQuestionsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('daily_quest_questions')->truncate();
        $questions = [
            [
                'question_text' => 'Bagaimana cara membuat variabel "nama" dengan nilai "PyLearn" di Python?',
                'code_snippet' => null,
                'options' => json_encode(['nama = "PyLearn"', 'var nama = "PyLearn"', 'nama : "PyLearn"', 'nama := "PyLearn"']),
                'correct_answer' => 'nama = "PyLearn"',
                'explanation' => 'Di Python, variabel dibuat dengan menulis nama = nilai tanpa keyword tambahan.'
            ],
            [
                'question_text' => 'Bagaimana cara membuat list di Python?',
                'code_snippet' => null,
                'options' => json_encode(['[1, 2, 3]', '(1, 2, 3)', '{1, 2, 3}', '<1, 2, 3>']),
                'correct_answer' => '[1, 2, 3]',
                'explanation' => 'List di Python menggunakan kurung siku [].'
            ],
            [
                'question_text' => 'Method apa untuk mengubah string menjadi huruf besar?',
                'code_snippet' => null,
                'options' => json_encode(['upper()', 'toUpper()', 'toUpperCase()', 'uppercase()']),
                'correct_answer' => 'upper()',
                'explanation' => 'upper() mengubah string menjadi huruf besar semua.'
            ],
            [
                'question_text' => 'Berapa hasil dari 10 // 3?',
                'code_snippet' => 'print(10 // 3)',
                'options' => json_encode(['3', '3.33', '3.0', '4']),
                'correct_answer' => '3',
                'explanation' => '// adalah floor division, membagi dan membulatkan ke bawah ke integer terdekat.'
            ],
            [
                'question_text' => 'Fungsi apa untuk menampilkan output ke layar?',
                'code_snippet' => null,
                'options' => json_encode(['print()', 'echo()', 'display()', 'write()']),
                'correct_answer' => 'print()',
                'explanation' => 'print() digunakan untuk menampilkan output di Python.'
            ],
            [
                'question_text' => 'Keyword apa yang digunakan untuk kondisi "else if"?',
                'code_snippet' => null,
                'options' => json_encode(['elif', 'else if', 'elseif', 'if else']),
                'correct_answer' => 'elif',
                'explanation' => 'elif adalah singkatan dari "else if" dalam Python.'
            ],
            [
                'question_text' => 'Keyword apa yang digunakan untuk perulangan (loop)?',
                'code_snippet' => null,
                'options' => json_encode(['for', 'foreach', 'loop', 'repeat']),
                'correct_answer' => 'for',
                'explanation' => 'for digunakan untuk iterasi di Python.'
            ],
            [
                'question_text' => 'Loop yang berjalan selama kondisi bernilai True adalah...',
                'code_snippet' => null,
                'options' => json_encode(['while', 'for', 'do while', 'until']),
                'correct_answer' => 'while',
                'explanation' => 'while menjalankan loop selama kondisi tetap bernilai true.'
            ],
            [
                'question_text' => 'Keyword untuk membuat fungsi adalah...',
                'code_snippet' => null,
                'options' => json_encode(['def', 'func', 'function', 'define']),
                'correct_answer' => 'def',
                'explanation' => 'def digunakan untuk mendefinisikan fungsi baru.'
            ],
            [
                'question_text' => 'Method untuk menambah item ke akhir list adalah...',
                'code_snippet' => null,
                'options' => json_encode(['append()', 'add()', 'push()', 'insert()']),
                'correct_answer' => 'append()',
                'explanation' => 'append() menambah item di akhir list.'
            ],
            [
                'question_text' => 'Fungsi untuk menghitung jumlah elemen dalam list adalah...',
                'code_snippet' => null,
                'options' => json_encode(['len()', 'count()', 'size()', 'length()']),
                'correct_answer' => 'len()',
                'explanation' => 'len() mengembalikan jumlah elemen atau panjang suatu objek.'
            ],
            [
                'question_text' => 'Bagaimana cara mengakses nilai "PyLearn" dari data = {"nama": "PyLearn"}?',
                'code_snippet' => 'data = {"nama": "PyLearn"}',
                'options' => json_encode(['data["nama"]', 'data(nama)', 'data.nama', 'data->nama']),
                'correct_answer' => 'data["nama"]',
                'explanation' => 'Akses dictionary menggunakan key di dalam kurung siku.'
            ],
            [
                'question_text' => 'Operator apa untuk menggabungkan dua string?',
                'code_snippet' => null,
                'options' => json_encode(['+', '&', '.', 'concat']),
                'correct_answer' => '+',
                'explanation' => '+ digunakan untuk penggabungan string (concatenation).'
            ],
            [
                'question_text' => 'Index karakter pertama dalam string "Python" adalah...',
                'code_snippet' => null,
                'options' => json_encode(['0', '1', '-1', 'first']),
                'correct_answer' => '0',
                'explanation' => 'Index di Python selalu dimulai dari 0.'
            ],
            [
                'question_text' => 'Apa hasil dari "Python"[:3]?',
                'code_snippet' => null,
                'options' => json_encode(['Pyt', 'Pyth', 'Py', 'thon']),
                'correct_answer' => 'Pyt',
                'explanation' => '[:3] mengambil karakter dari index 0 sampai sebelum index 3.'
            ],
            [
                'question_text' => 'Manakah contoh list comprehension yang benar?',
                'code_snippet' => null,
                'options' => json_encode(['[x*2 for x in range(5)]', '(x*2 for x in range(5))', '{x*2 for x in range(5)}', 'x*2 for x in range(5)']),
                'correct_answer' => '[x*2 for x in range(5)]',
                'explanation' => 'List comprehension menggunakan kurung siku [].'
            ],
            [
                'question_text' => 'Fungsi map() mengembalikan objek bertipe...',
                'code_snippet' => null,
                'options' => json_encode(['map object', 'list', 'tuple', 'dictionary']),
                'correct_answer' => 'map object',
                'explanation' => 'map() mengembalikan iterator map object yang perlu dikonversi ke list/tuple.'
            ],
            [
                'question_text' => 'Blok apa yang digunakan untuk menangkap exception?',
                'code_snippet' => null,
                'options' => json_encode(['except', 'catch', 'error', 'handle']),
                'correct_answer' => 'except',
                'explanation' => 'Python menggunakan try...except untuk penanganan error.'
            ],
            [
                'question_text' => 'Fungsi untuk konversi string "42" ke integer adalah...',
                'code_snippet' => null,
                'options' => json_encode(['int()', 'integer()', 'toInt()', 'Number()']),
                'correct_answer' => 'int()',
                'explanation' => 'int() mengkonversi nilai ke tipe data integer.'
            ],
            [
                'question_text' => 'Apa hasil dari bool([])?',
                'code_snippet' => 'print(bool([]))',
                'options' => json_encode(['False', 'True', 'None', 'Error']),
                'correct_answer' => 'False',
                'explanation' => 'List kosong, string kosong, dan angka 0 bernilai False (falsy).'
            ],
            [
                'question_text' => 'Nilai kosong di Python direpresentasikan oleh...',
                'code_snippet' => null,
                'options' => json_encode(['None', 'null', 'nil', 'Empty']),
                'correct_answer' => 'None',
                'explanation' => 'None adalah keyword khusus untuk menyatakan ketiadaan nilai.'
            ],
            [
                'question_text' => 'Berapa angka yang dihasilkan oleh range(5)?',
                'code_snippet' => null,
                'options' => json_encode(['0,1,2,3,4', '1,2,3,4,5', '0,1,2,3,4,5', '0,5']),
                'correct_answer' => '0,1,2,3,4',
                'explanation' => 'range(n) menghasilkan angka dari 0 sampai n-1.'
            ],
            [
                'question_text' => 'enumerate(["a", "b"]) mengembalikan pasangan...',
                'code_snippet' => null,
                'options' => json_encode(['(0,"a"), (1,"b")', '("a",0), ("b",1)', '0, 1', '"a", "b"']),
                'correct_answer' => '(0,"a"), (1,"b")',
                'explanation' => 'enumerate() mengembalikan tuple berisi (index, nilai).'
            ],
            [
                'question_text' => 'zip([1,2], [3,4]) menghasilkan...',
                'code_snippet' => null,
                'options' => json_encode(['(1,3), (2,4)', '(1,2), (3,4)', '1,2,3,4', 'Error']),
                'correct_answer' => '(1,3), (2,4)',
                'explanation' => 'zip() menggabungkan elemen-elemen dari beberapa iterable secara berpasangan.'
            ],
            [
                'question_text' => 'Simbol untuk membuat set secara langsung adalah...',
                'code_snippet' => null,
                'options' => json_encode(['{}', '[]', '()', '<>']),
                'correct_answer' => '{}',
                'explanation' => 'Set menggunakan kurung kurawal, sama seperti dictionary tapi tanpa pasangan key-value.'
            ],
            [
                'question_text' => 'Keyword untuk memuat modul eksternal adalah...',
                'code_snippet' => null,
                'options' => json_encode(['import', 'include', 'require', 'use']),
                'correct_answer' => 'import',
                'explanation' => 'import digunakan untuk memuat fungsionalitas dari modul lain.'
            ],
            [
                'question_text' => 'random.random() menghasilkan angka acak antara...',
                'code_snippet' => null,
                'options' => json_encode(['0 sampai 1', '1 sampai 10', '0 sampai 100', '-1 sampai 1']),
                'correct_answer' => '0 sampai 1',
                'explanation' => 'Fungsi random() menghasilkan float acak di rentang [0.0, 1.0).'
            ],
            [
                'question_text' => 'Simbol untuk komentar satu baris di Python adalah...',
                'code_snippet' => null,
                'options' => json_encode(['#', '//', '/*', '--']),
                'correct_answer' => '#',
                'explanation' => '# digunakan untuk komentar yang diabaikan oleh interpreter.'
            ],
            [
                'question_text' => 'Keyword untuk mendefinisikan kelas adalah...',
                'code_snippet' => null,
                'options' => json_encode(['class', 'struct', 'object', 'type']),
                'correct_answer' => 'class',
                'explanation' => 'class digunakan untuk membuat blueprint objek baru.'
            ],
            [
                'question_text' => 'Apa hasil dari print(2 + 3)?',
                'code_snippet' => null,
                'options' => json_encode(['5', '23', '6', 'Error']),
                'correct_answer' => '5',
                'explanation' => 'Penjumlahan sederhana antara dua integer.'
            ],
        ];

        foreach ($questions as $q) {
            DB::table('daily_quest_questions')->insert($q);
        }
    }
}