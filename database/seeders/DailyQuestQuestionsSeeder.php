<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DailyQuestQuestionsSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [
            ['question_text' => 'Buatlah variabel "nama" dengan nilai "PyLearn"', 'code_snippet' => 'nama = "PyLearn"', 'correct_answer' => 'nama = "PyLearn"', 'explanation' => 'Di Python, variabel dibuat dengan menulis nama = nilai'],
            ['question_text' => 'Bagaimana cara membuat list di Python?', 'code_snippet' => null, 'correct_answer' => '[1, 2, 3]', 'explanation' => 'List di Python menggunakan kurung siku []'],
            ['question_text' => 'Method apa untuk mengubah string menjadi huruf besar?', 'code_snippet' => '"python".upper()', 'correct_answer' => 'upper()', 'explanation' => 'upper() mengubah string menjadi huruf besar semua'],
            ['question_text' => 'Berapa hasil 10 // 3?', 'code_snippet' => 'print(10 // 3)', 'correct_answer' => '3', 'explanation' => '// adalah floor division, membagi dan membulatkan ke bawah'],
            ['question_text' => 'Fungsi apa untuk menampilkan output?', 'code_snippet' => 'print("Hello")', 'correct_answer' => 'print()', 'explanation' => 'print() digunakan untuk menampilkan output di Python'],
            ['question_text' => 'Keyword apa untuk kondisi else if?', 'code_snippet' => 'if x > 5: print("besar") elif x > 3: print("sedang")', 'correct_answer' => 'elif', 'explanation' => 'elif adalah Python untuk "else if"'],
            ['question_text' => 'Cara menggunakan for loop di Python?', 'code_snippet' => 'for i in range(5): print(i)', 'correct_answer' => 'for', 'explanation' => 'for digunakan untuk iterasi di Python'],
            ['question_text' => 'Cara menggunakan while loop?', 'code_snippet' => 'while i < 5: print(i); i += 1', 'correct_answer' => 'while', 'explanation' => 'while menjalankan loop selama kondisi true'],
            ['question_text' => 'Keyword untuk membuat fungsi?', 'code_snippet' => 'def greet(): pass', 'correct_answer' => 'def', 'explanation' => 'def digunakan untuk mendefinisikan fungsi'],
            ['question_text' => 'Method untuk menambah item ke list?', 'code_snippet' => 'list.append(item)', 'correct_answer' => 'append()', 'explanation' => 'append() menambah item di akhir list'],
            ['question_text' => 'Fungsi untuk menghitung panjang list?', 'code_snippet' => 'len(my_list)', 'correct_answer' => 'len()', 'explanation' => 'len() mengembalikan jumlah elemen'],
            ['question_text' => 'Cara mengakses nilai di dictionary?', 'code_snippet' => 'data = {"nama": "PyLearn"}; print(data["nama"])', 'correct_answer' => 'nama', 'explanation' => 'Akses dictionary dengan key dalam kurung siku'],
            ['question_text' => 'Cara menggabungkan string?', 'code_snippet' => '"Py" + "Learn"', 'correct_answer' => '+', 'explanation' => '+ menggabungkan string (concatenation)'],
            ['question_text' => 'Mengambil karakter pertama string?', 'code_snippet' => '"Python"[0]', 'correct_answer' => '0', 'explanation' => 'Index mulai dari 0'],
            ['question_text' => 'Mengambil 3 karakter pertama?', 'code_snippet' => '"Python"[:3]', 'correct_answer' => '3', 'explanation' => '[:3] mengambil karakter index 0,1,2'],
            ['question_text' => 'Cara membuat list dengan comprehension?', 'code_snippet' => '[x * 2 for x in range(5)]', 'correct_answer' => '*', 'explanation' => '[x*2 for x in range(5)] membuat list dengan setiap element dikali 2'],
            ['question_text' => 'Fungsi map mengembalikan?', 'code_snippet' => 'result = map(str, [1,2,3])', 'correct_answer' => 'map object', 'explanation' => 'map mengembalikan objek map, haruskonversi ke list'],
            ['question_text' => 'Menangkap error?', 'code_snippet' => 'try: pass except Exception as e: pass', 'correct_answer' => 'except', 'explanation' => 'except menangkap exception'],
            ['question_text' => 'Konversi ke integer?', 'code_snippet' => 'int("42")', 'correct_answer' => 'int()', 'explanation' => 'int() mengkonversi ke integer'],
            ['question_text' => 'Apa hasil bool([])?', 'code_snippet' => 'print(bool([]))', 'correct_answer' => 'False', 'explanation' => 'List kosong adalah falsy'],
            ['question_text' => 'Apa nilai None?', 'code_snippet' => 'x = None; print(x)', 'correct_answer' => 'None', 'explanation' => 'None adalah nilai kosong di Python'],
            ['question_text' => 'Range dari 0-4?', 'code_snippet' => 'range(5)', 'correct_answer' => '5', 'explanation' => 'range(5) menghasilkan 0,1,2,3,4'],
            ['question_text' => 'enumerate menghasilkan?', 'code_snippet' => 'list(enumerate(["a","b"]))', 'correct_answer' => '[(0,"a"),(1,"b")]', 'explanation' => 'enumerate mengembalikan tuple (index, nilai)'],
            ['question_text' => 'zip menggabungkan?', 'code_snippet' => 'list(zip([1,2],[3,4]))', 'correct_answer' => '[(1,3),(2,4)]', 'explanation' => 'zip menggabungkan element dari setiap list'],
            ['question_text' => 'Cara membuat set?', 'code_snippet' => 'set({1, 2, 3})', 'correct_answer' => 'set()', 'explanation' => 'set() membuat set dengan kurung kurawal langsung'],
            ['question_text' => 'Import modul?', 'code_snippet' => 'import math', 'correct_answer' => 'import', 'explanation' => 'import untuk memuat modul'],
            ['question_text' => 'Angka acak 0-1?', 'code_snippet' => 'random.random()', 'correct_answer' => 'random()', 'explanation' => 'random.random() menghasilkan angka 0-1'],
            ['question_text' => 'Comment single-line?', 'code_snippet' => '# komentar', 'correct_answer' => '#', 'explanation' => '# adalah comment di Python'],
            ['question_text' => 'Keyword membuat class?', 'code_snippet' => 'class User:', 'correct_answer' => 'class', 'explanation' => 'class mendefinisikan class baru'],
            ['question_text' => 'Apa output dari print(2 + 3)?', 'code_snippet' => 'print(2 + 3)', 'correct_answer' => '5', 'explanation' => '2 + 3 = 5'],
        ];

        foreach ($questions as $q) {
            DB::table('daily_quest_questions')->insert($q);
        }
    }
}