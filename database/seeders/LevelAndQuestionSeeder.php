<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelAndQuestionSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('questions')->truncate();
        DB::table('levels')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $levels = [
            ['name' => 'Dasar Python', 'description' => 'Memahami dasar-dasar Python', 'order_number' => 1],
            ['name' => 'Variabel & Tipe Data', 'description' => 'Belajar tentang variabel dan tipe data', 'order_number' => 2],
            ['name' => 'Operators', 'description' => 'Menggunakan operator', 'order_number' => 3],
            ['name' => 'Strings', 'description' => 'Bermain dengan string', 'order_number' => 4],
            ['name' => 'Lists', 'description' => 'Belajar struktur data list', 'order_number' => 5],
        ];

        foreach ($levels as $level) {
            DB::table('levels')->insert($level);
        }

        $level1Questions = [
            ['level_id' => 1, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa output dari	print("Hello World")?', 'options' => json_encode(['Hello World', 'Hello', 'World', 'Error']), 'correct_answer' => 'Hello World', 'explanation' => 'print() digunakan untuk menampilkan teks ke layar'],
            ['level_id' => 1, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Manakah cara yang benar untuk membuat komentar single-line di Python?', 'options' => json_encode(['# komentar', '// komentar', '<!-- komentar', '-- komentar']), 'correct_answer' => '# komentar', 'explanation' => '# digunakan untuk komentar single-line di Python'],
            ['level_id' => 1, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa fungsi dari keyword "def" di Python?', 'options' => json_encode(['Mendefinisikan fungsi', 'Menghapus variabel', 'Mengimport modul', 'Mendeklarasikan class']), 'correct_answer' => 'Mendefinisikan fungsi', 'explanation' => 'def digunakan untuk mendefinisikan fungsi baru'],
            ['level_id' => 1, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Bagaimana cara menjalankan script Python?', 'options' => json_encode(['python file.py', 'run file.py', 'execute file.py', 'start file.py']), 'correct_answer' => 'python file.py', 'explanation' => 'Gunakan command "python" diikuti nama file'],
            ['level_id' => 1, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Ekstensi file Python adalah...', 'options' => json_encode(['.py', '.python', '.pyt', '.pt']), 'correct_answer' => '.py', 'explanation' => 'File Python menggunakan ekstensi .py'],
            ['level_id' => 1, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa output dari	print(2 + 3)?', 'options' => json_encode(['5', '23', '2+3', '6']), 'correct_answer' => '5', 'explanation' => '2 + 3 = 5'],
            ['level_id' => 1, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Manakah bukan keyword di Python?', 'options' => json_encode(['if', 'for', 'loop', 'while']), 'correct_answer' => 'loop', 'explanation' => 'loop bukan keyword Python, tapi if, for, dan while adalah keyword'],
            ['level_id' => 1, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa fungsi dari keyword "return" dalam fungsi?', 'options' => json_encode(['Mengembalikan nilai', 'Menghapus fungsi', 'Memanggil fungsi', 'Mendefinisikan fungsi']), 'correct_answer' => 'Mengembalikan nilai', 'explanation' => 'return digunakan untuk mengembalikan nilai dari fungsi'],
            ['level_id' => 1, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Python dikembangkan oleh...', 'options' => json_encode(['Guido van Rossum', 'James Gosling', 'Bjarne Stroustrup', 'Dennis Ritchie']), 'correct_answer' => 'Guido van Rossum', 'explanation' => 'Python diciptakan oleh Guido van Rossum'],
            ['level_id' => 1, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa itu Python?', 'options' => json_encode(['Bahasa pemrograman', 'Ular', 'Game', 'Sistem operasi']), 'correct_answer' => 'Bahasa pemrograman', 'explanation' => 'Python adalah bahasa pemrograman'],
        ];

        $level2Questions = [
            ['level_id' => 2, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Bagaimana cara mendeklarasikan variabel di Python?', 'options' => json_encode(['x = 5', 'var x = 5', 'int x = 5', 'let x = 5']), 'correct_answer' => 'x = 5', 'explanation' => 'Python tidak perlu keyword var, langsung nama = nilai'],
            ['level_id' => 2, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Tipe data apa untuk "Hello"?', 'options' => json_encode(['str', 'int', 'float', 'bool']), 'correct_answer' => 'str', 'explanation' => 'String adalah tipe data untuk teks'],
            ['level_id' => 2, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Tipe data apa untuk angka desimal?', 'options' => json_encode(['float', 'int', 'double', 'decimal']), 'correct_answer' => 'float', 'explanation' => 'Float untuk angka desimal'],
            ['level_id' => 2, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa hasil type(10)?', 'options' => json_encode(["<class 'int'>", "<class 'str'>", "<class 'float'>", "<class 'bool'>"]), 'correct_answer' => "<class 'int'>", 'explanation' => '10 adalah integer'],
            ['level_id' => 2, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Bagaimana membuat boolean True?', 'options' => json_encode(['True', 'true', 'TRUE', 'T']), 'correct_answer' => 'True', 'explanation' => 'Boolean True dengan T besar di Python'],
            ['level_id' => 2, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa tipe data dari [1, 2, 3]?', 'options' => json_encode(['list', 'array', 'tuple', 'set']), 'correct_answer' => 'list', 'explanation' => '[1, 2, 3] adalah list'],
            ['level_id' => 2, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa fungsi dari type()?', 'options' => json_encode(['Mengecek tipe data', 'Mengubah tipe data', 'Menghapus tipe data', 'Membuat tipe data']), 'correct_answer' => 'Mengecek tipe data', 'explanation' => 'type() mengembalikan tipe data'],
            ['level_id' => 2, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Dict di Python menggunakan...', 'options' => json_encode(['{}', '[]', '()', '<>']), 'correct_answer' => '{}', 'explanation' => 'Dict menggunakan kurung kurawal'],
            ['level_id' => 2, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa output dari	type(3.14)?', 'options' => json_encode(["<class 'float'>", "<class 'int'>", "<class 'str'>", "<class 'double'>"]), 'correct_answer' => "<class 'float'>", 'explanation' => '3.14 adalah float'],
            ['level_id' => 2, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Tipe data None表示...', 'options' => json_encode(['Kosong', 'Angka 0', 'False', 'Error']), 'correct_answer' => 'Kosong', 'explanation' => 'None berarti kosong/nilai tidak ada'],
        ];

        $level3Questions = [
            ['level_id' => 3, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa hasil 10 + 5?', 'options' => json_encode([15, '15', 105, '105']), 'correct_answer' => '15', 'explanation' => 'Penjumlahan: 10 + 5 = 15'],
            ['level_id' => 3, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa hasil 10 - 3?', 'options' => json_encode([7, 13, -7, 30]), 'correct_answer' => '7', 'explanation' => 'Pengurangan: 10 - 3 = 7'],
            ['level_id' => 3, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa hasil 4 * 3?', 'options' => json_encode([12, 43, 7, 6]), 'correct_answer' => '12', 'explanation' => 'Perkalian: 4 * 3 = 12'],
            ['level_id' => 3, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa hasil 10 / 2?', 'options' => json_encode([5, 2, 5.0, 20]), 'correct_answer' => '5.0', 'explanation' => 'Pembagian: 10 / 2 = 5.0'],
            ['level_id' => 3, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa hasil 10 // 3?', 'options' => json_encode([3, 3.333, 7, 2]), 'correct_answer' => '3', 'explanation' => 'Floor division: 10 // 3 = 3'],
            ['level_id' => 3, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa hasil 10 % 3?', 'options' => json_encode([1, 3, 7, 0]), 'correct_answer' => '1', 'explanation' => 'Modulus: 10 % 3 = 1'],
            ['level_id' => 3, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa hasil 2 ** 3?', 'options' => json_encode([8, 6, 5, 9]), 'correct_answer' => '8', 'explanation' => 'Pangkat: 2 ** 3 = 8'],
            ['level_id' => 3, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Manakah operator perbandingan?', 'options' => json_encode(['==', '=', ':=', '=>']), 'correct_answer' => '==', 'explanation' => '== adalah operator sama dengan'],
            ['level_id' => 3, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa hasil 5 > 3?', 'options' => json_encode(['True', 'False', '5', '3']), 'correct_answer' => 'True', 'explanation' => '5 lebih besar dari 3'],
            ['level_id' => 3, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa hasil 3 == 3?', 'options' => json_encode(['True', 'False', '3', '0']), 'correct_answer' => 'True', 'explanation' => '3 sama dengan 3'],
        ];

        $level4Questions = [
            ['level_id' => 4, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Bagaimana membuat string di Python?', 'options' => json_encode(["'text'", '"text"', 'Semua benar', 'String']), 'correct_answer' => 'Semua benar', 'explanation' => 'Bisa pakai " atau "'],
            ['level_id' => 4, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa method untuk uppercase?', 'options' => json_encode(['upper()', 'uppercase()', 'toUpper()', 'UP()']), 'correct_answer' => 'upper()', 'explanation' => 'upper() untuk huruf besar'],
            ['level_id' => 4, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa method untuk lowercase?', 'options' => json_encode(['lower()', 'lowercase()', 'toLower()', 'LO()']), 'correct_answer' => 'lower()', 'explanation' => 'lower() untuk huruf kecil'],
            ['level_id' => 4, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa len("Python")?', 'options' => json_encode([6, 7, 5, 8]), 'correct_answer' => '6', 'explanation' => 'Python punya 6 karakter'],
            ['level_id' => 4, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Bagaimana mengambil karakter pertama?', 'options' => json_encode(['s[0]', 's[1]', 's.first()', 's.get(0)']), 'correct_answer' => 's[0]', 'explanation' => 'Index dimulai dari 0'],
            ['level_id' => 4, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa method untuk menghitung karakter?', 'options' => json_encode(['count()', 'len()', 'find()', 'index()']), 'correct_answer' => 'count()', 'explanation' => 'count() menghitung karakter'],
            ['level_id' => 4, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa "Py" + "thon"?', 'options' => json_encode(['Python', 'Pyth on', 'Pyton', 'Python ']), 'correct_answer' => 'Python', 'explanation' => 'String dapat digabungkan'],
            ['level_id' => 4, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa method replace?', 'options' => json_encode(['replace()', 'change()', 'switch()', 'sub()']), 'correct_answer' => 'replace()', 'explanation' => 'replace() mengganti karakter'],
            ['level_id' => 4, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa method split?', 'options' => json_encode(['split()', 'divide()', 'separate()', 'cut()']), 'correct_answer' => 'split()', 'explanation' => 'split() memecah string'],
            ['level_id' => 4, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa.strip()?', 'options' => json_encode(['Hapus spasi', 'Tambah spasi', 'Ubah spasi', 'Hitung spasi']), 'correct_answer' => 'Hapus spasi', 'explanation' => 'strip() hapus spasi awal/akhir'],
        ];

        $level5Questions = [
            ['level_id' => 5, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Bagaimana membuat list?', 'options' => json_encode(['[1, 2, 3]', '(1, 2, 3)', '{1, 2, 3}', '<1, 2, 3>']), 'correct_answer' => '[1, 2, 3]', 'explanation' => 'List menggunakan []'],
            ['level_id' => 5, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Bagaimana menambah item ke list?', 'options' => json_encode(['append()', 'add()', 'insert()', 'push()']), 'correct_answer' => 'append()', 'explanation' => 'append() menambah di akhir'],
            ['level_id' => 5, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa len([1,2,3])?', 'options' => json_encode([3, 2, 4, 1]), 'correct_answer' => '3', 'explanation' => 'List punya 3 elemen'],
            ['level_id' => 5, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Bagaimana akses elemen pertama?', 'options' => json_encode(['list[0]', 'list[1]', 'list.first()', 'list[1]']), 'correct_answer' => 'list[0]', 'explanation' => 'Index mulai dari 0'],
            ['level_id' => 5, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Method hapus item?', 'options' => json_encode(['remove()', 'delete()', 'erase()', 'drop()']), 'correct_answer' => 'remove()', 'explanation' => 'remove() hapus berdasarkan nilai'],
            ['level_id' => 5, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa.pop()?', 'options' => json_encode(['Hapus akhir', 'Hapus awal', 'Tambah akhir', 'Urutkan']), 'correct_answer' => 'Hapus akhir', 'explanation' => 'pop() hapus elemen terakhir'],
            ['level_id' => 5, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa.sort()?', 'options' => json_encode(['Urutkan', 'Balik', 'acak', 'hapus']), 'correct_answer' => 'Urutkan', 'explanation' => 'sort() mengurutkan list'],
            ['level_id' => 5, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Method gabung list?', 'options' => json_encode(['extend()', 'concat()', 'merge()', 'join()']), 'correct_answer' => 'extend()', 'explanation' => 'extend() gabung list'],
            ['level_id' => 5, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa.reverse()?', 'options' => json_encode(['Balik urutan', 'Hapus', 'Urutkan', 'acak']), 'correct_answer' => 'Balik urutan', 'explanation' => 'reverse() balik urutan'],
            ['level_id' => 5, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa in untuk list?', 'options' => json_encode(['Cek anggota', 'Input', 'Index', 'Insert']), 'correct_answer' => 'Cek anggota', 'explanation' => 'in cek apakah ada dalam list'],
        ];

        foreach ($level1Questions as $q) DB::table('questions')->insert($q);
        foreach ($level2Questions as $q) DB::table('questions')->insert($q);
        foreach ($level3Questions as $q) DB::table('questions')->insert($q);
        foreach ($level4Questions as $q) DB::table('questions')->insert($q);
        foreach ($level5Questions as $q) DB::table('questions')->insert($q);
    }
}