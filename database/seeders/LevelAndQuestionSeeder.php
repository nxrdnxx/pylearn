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
            ['name' => 'Tuples & Sets', 'description' => 'Belajar Tuple dan Set', 'order_number' => 6],
            ['name' => 'Dictionaries', 'description' => 'Belajar struktur data dictionary', 'order_number' => 7],
            ['name' => 'Conditional Statements', 'description' => 'Percabangan If-Else', 'order_number' => 8],
            ['name' => 'Loops', 'description' => 'Perulangan For dan While', 'order_number' => 9],
            ['name' => 'Functions', 'description' => 'Membuat dan menggunakan fungsi', 'order_number' => 10],
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

        $level6Questions = [
            ['level_id' => 6, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Bagaimana membuat tuple?', 'options' => json_encode(['(1, 2, 3)', '[1, 2, 3]', '{1, 2, 3}', '<1, 2, 3>']), 'correct_answer' => '(1, 2, 3)', 'explanation' => 'Tuple menggunakan ()'],
            ['level_id' => 6, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa karakteristik tuple?', 'options' => json_encode(['Tidak bisa diubah', 'Bisa diubah', 'Hanya angka', 'Hanya string']), 'correct_answer' => 'Tidak bisa diubah', 'explanation' => 'Tuple bersifat immutable (tidak bisa diubah)'],
            ['level_id' => 6, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa hasil len((1,2,3,4))?', 'options' => json_encode([4, 3, 5, 2]), 'correct_answer' => '4', 'explanation' => 'Tuple punya 4 elemen'],
            ['level_id' => 6, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Bagaimana membuat set?', 'options' => json_encode(['{1, 2, 3}', '[1, 2, 3]', '(1, 2, 3)', '<1, 2, 3>']), 'correct_answer' => '{1, 2, 3}', 'explanation' => 'Set menggunakan {}'],
            ['level_id' => 6, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa itu duplicate dalam set?', 'options' => json_encode(['Dihapus otomatis', 'Diizinkan', 'Error', 'Ditandai']), 'correct_answer' => 'Dihapus otomatis', 'explanation' => 'Set tidak mengizinkan duplikat'],
            ['level_id' => 6, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Method untuk tambah ke set?', 'options' => json_encode(['add()', 'append()', 'insert()', 'push()']), 'correct_answer' => 'add()', 'explanation' => 'add() menambah elemen ke set'],
            ['level_id' => 6, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Method hapus dari set?', 'options' => json_encode(['remove()', 'delete()', 'pop()', 'erase()']), 'correct_answer' => 'remove()', 'explanation' => 'remove() hapus elemen dari set'],
            ['level_id' => 6, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa perbedaan tuple dan list?', 'options' => json_encode(['Tuple tidak bisa diubah', 'Tuple hanya satu elemen', 'List lebih cepat', 'Tidak ada bedanya']), 'correct_answer' => 'Tuple tidak bisa diubah', 'explanation' => 'Tuple immutable, list mutable'],
            ['level_id' => 6, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa hasil (1,) + (2,)?', 'options' => json_encode(['(1, 2)', '(1, 2,)', 'Error', '[1, 2]']), 'correct_answer' => '(1, 2)', 'explanation' => 'Tuple dapat digabungkan'],
            ['level_id' => 6, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa itu set operations?', 'options' => json_encode(['union, intersection', 'add, remove', 'sort, reverse', 'push, pop']), 'correct_answer' => 'union, intersection', 'explanation' => 'Set mendukung union dan intersection'],
        ];

        $level7Questions = [
            ['level_id' => 7, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Bagaimana membuat dictionary?', 'options' => json_encode(["{'a': 1}", '[a:1]', '(a:1)', '<a:1>']), 'correct_answer' => "{'a': 1}", 'explanation' => 'Dict menggunakan {key: value}'],
            ['level_id' => 7, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Bagaimana akses nilai dict?', 'options' => json_encode(['dict["key"]', 'dict.key', 'dict->key', 'dict(key)']), 'correct_answer' => 'dict["key"]', 'explanation' => 'Gunakan [key] untuk akses'],
            ['level_id' => 7, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa method dapat semua keys?', 'options' => json_encode(['keys()', 'getkeys()', 'allkeys()', 'listkeys()']), 'correct_answer' => 'keys()', 'explanation' => 'keys() mengembalikan semua key'],
            ['level_id' => 7, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa method dapat semua values?', 'options' => json_encode(['values()', 'getvalues()', 'allvalues()', 'listvalues()']), 'correct_answer' => 'values()', 'explanation' => 'values() mengembalikan semua value'],
            ['level_id' => 7, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Bagaimana tambah data ke dict?', 'options' => json_encode(['dict["key"] = value', 'dict.add(key, value)', 'dict.push(key, value)', 'dict.insert(key, value)']), 'correct_answer' => 'dict["key"] = value', 'explanation' => 'Assign key-value untuk tambah'],
            ['level_id' => 7, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Method hapus item dict?', 'options' => json_encode(['pop()', 'remove()', 'delete()', 'erase()']), 'correct_answer' => 'pop()', 'explanation' => 'pop() hapus berdasarkan key'],
            ['level_id' => 7, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa items() return?', 'options' => json_encode(['Key-value pairs', 'Hanya keys', 'Hanya values', 'Jumlah item']), 'correct_answer' => 'Key-value pairs', 'explanation' => 'items() mengembalikan tuple key-value'],
            ['level_id' => 7, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa hasil len({"a":1, "b":2})?', 'options' => json_encode([2, 1, 3, 4]), 'correct_answer' => '2', 'explanation' => 'Dict punya 2 key-value'],
            ['level_id' => 7, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa get() dalam dict?', 'options' => json_encode(['Ambil nilai aman', 'Hapus nilai', 'Tambah nilai', 'Update nilai']), 'correct_answer' => 'Ambil nilai aman', 'explanation' => 'get() ambil nilai, return None jika tidak ada'],
            ['level_id' => 7, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Dict bisa nested?', 'options' => json_encode(['Ya', 'Tidak', 'Hanya 1 level', 'Maksimal 2 level']), 'correct_answer' => 'Ya', 'explanation' => 'Dict dapat berisi dict lain (nested)'],
        ];

        $level8Questions = [
            ['level_id' => 8, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Keyword untuk if statement?', 'options' => json_encode(['if', 'elif', 'else', 'then']), 'correct_answer' => 'if', 'explanation' => 'if untuk conditional awal'],
            ['level_id' => 8, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Keyword untuk kondisi lain?', 'options' => json_encode(['elif', 'elseif', 'ifelse', 'otherwise']), 'correct_answer' => 'elif', 'explanation' => 'elif untuk kondisi tambahan'],
            ['level_id' => 8, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Keyword untuk fallback?', 'options' => json_encode(['else', 'if', 'elif', 'switch']), 'correct_answer' => 'else', 'explanation' => 'else sebagai fallback condition'],
            ['level_id' => 8, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa hasil: if True: print("A") else: print("B")?', 'options' => json_encode(['A', 'B', 'Error', 'A B']), 'correct_answer' => 'A', 'explanation' => 'Kondisi True menjalankan blok if'],
            ['level_id' => 8, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa elif kependekan dari?', 'options' => json_encode(['Else if', 'Else ifs', 'Extended if', 'End if']), 'correct_answer' => 'Else if', 'explanation' => 'elif = else if'],
            ['level_id' => 8, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Operator logika AND?', 'options' => json_encode(['and', '&&', ' & ', ' dan ']), 'correct_answer' => 'and', 'explanation' => 'and untuk logika AND di Python'],
            ['level_id' => 8, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Operator logika OR?', 'options' => json_encode(['or', '||', ' | ', ' atau ']), 'correct_answer' => 'or', 'explanation' => 'or untuk logika OR di Python'],
            ['level_id' => 8, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Operator negasi?', 'options' => json_encode(['not', '!', 'no', '~']), 'correct_answer' => 'not', 'explanation' => 'not untuk negasi boolean'],
            ['level_id' => 8, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa hasil: 5 > 3 and 2 < 1?', 'options' => json_encode(['False', 'True', 'Error', '5']), 'correct_answer' => 'False', 'explanation' => 'False and True = False'],
            ['level_id' => 8, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Tentang pass statement?', 'options' => json_encode(['Tidak lakukan apa-apa', 'Lewati iterasi', 'Hentikan loop', 'Lanjutkan']), 'correct_answer' => 'Tidak lakukan apa-apa', 'explanation' => 'pass adalah placeholder kosong'],
        ];

        $level9Questions = [
            ['level_id' => 9, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Keyword untuk loop for?', 'options' => json_encode(['for', 'while', 'loop', 'repeat']), 'correct_answer' => 'for', 'explanation' => 'for untuk perulangan'],
            ['level_id' => 9, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Keyword untuk loop while?', 'options' => json_encode(['while', 'for', 'loop', 'do']), 'correct_answer' => 'while', 'explanation' => 'while untuk perulangan kondisional'],
            ['level_id' => 9, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa range(5) menghasilkan?', 'options' => json_encode([0,1,2,3,4, 1,2,3,4,5, 0,1,2,3, 1,2,3,4]), 'correct_answer' => '0,1,2,3,4', 'explanation' => 'range(5) = 0 sampai 4'],
            ['level_id' => 9, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa range(1,5) menghasilkan?', 'options' => json_encode([1,2,3,4, 0,1,2,3,4, 1,2,3,4,5, 0,1,2,3]), 'correct_answer' => '1,2,3,4', 'explanation' => 'range(1,5) = 1 sampai 4'],
            ['level_id' => 9, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Keyword break untuk?', 'options' => json_encode(['Hentikan loop', 'Lewati iterasi', 'Lanjut ke else', 'Restart loop']), 'correct_answer' => 'Hentikan loop', 'explanation' => 'break keluar dari loop'],
            ['level_id' => 9, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Keyword continue untuk?', 'options' => json_encode(['Lewati iterasi', 'Hentikan loop', 'Restart', 'Exit']), 'correct_answer' => 'Lewati iterasi', 'explanation' => 'continue skip ke iterasi berikutnya'],
            ['level_id' => 9, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'for i in [1,2,3]: print(i)?', 'options' => json_encode(['1 2 3', '0 1 2', '1 2 3 4', 'Error']), 'correct_answer' => '1 2 3', 'explanation' => 'Iterasi semua elemen list'],
            ['level_id' => 9, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'while True tanpa break?', 'options' => json_encode(['Infinite loop', 'Error', 'Tidak dijalankan', 'Langsung berhenti']), 'correct_answer' => 'Infinite loop', 'explanation' => 'while True tanpa exit infinite loop'],
            ['level_id' => 9, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'for i in range(0,10,2)?', 'options' => json_encode([0,2,4,6,8, 0,1,2,3,4, 1,3,5,7,9, 2,4,6,8,10]), 'correct_answer' => '0,2,4,6,8', 'explanation' => 'range(start, stop, step)'],
            ['level_id' => 9, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa else setelah for?', 'options' => json_encode(['Jalankan setelah selesai', 'Jalankan jika break', 'Tidak pernah', 'Salah satu']), 'correct_answer' => 'Jalankan setelah selesai', 'explanation' => 'for-else jalan saat loop selesai tanpa break'],
        ];

        $level10Questions = [
            ['level_id' => 10, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Keyword untuk buat fungsi?', 'options' => json_encode(['def', 'function', 'func', 'define']), 'correct_answer' => 'def', 'explanation' => 'def untuk mendefinisikan fungsi'],
            ['level_id' => 10, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Cara panggil fungsi?', 'options' => json_encode(['function()', 'call function', 'run function', 'execute function']), 'correct_answer' => 'function()', 'explanation' => 'Gunakan nama() untuk memanggil'],
            ['level_id' => 10, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Parameter fungsi?', 'options' => json_encode(['Input ke fungsi', 'Output fungsi', 'Nama fungsi', 'Jenis fungsi']), 'correct_answer' => 'Input ke fungsi', 'explanation' => 'Parameter adalah input ke fungsi'],
            ['level_id' => 10, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Return untuk?', 'options' => json_encode(['Kembalikan nilai', 'Hapus fungsi', 'Panggil fungsi', 'Definisikan fungsi']), 'correct_answer' => 'Kembalikan nilai', 'explanation' => 'return mengembalikan output'],
            ['level_id' => 10, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Apa tanpa return?', 'options' => json_encode(['Return None', 'Error', 'Return 0', 'Return False']), 'correct_answer' => 'Return None', 'explanation' => 'Fungsi tanpa return mengembalikan None'],
            ['level_id' => 10, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Default parameter?', 'options' => json_encode(['Nilai default jika tidak input', 'Param wajib', 'Jenis return', 'Nama lain']), 'correct_answer' => 'Nilai default jika tidak input', 'explanation' => 'Default digunakan jika argumen tidak diberikan'],
            ['level_id' => 10, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => '*args untuk?', 'options' => json_encode(['Argument tidak terbatas', 'Wajib 1 argumen', 'Tidak ada argumen', 'Argumen opsional']), 'correct_answer' => 'Argument tidak terbatas', 'explanation' => '*args terima banyak argumen'],
            ['level_id' => 10, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => '**kwargs untuk?', 'options' => json_encode(['Keyword arguments', 'Angka', 'Wajib', 'Batas']), 'correct_answer' => 'Keyword arguments', 'explanation' => '**kwargs terima keyword args'],
            ['level_id' => 10, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Scope variabel lokal?', 'options' => json_encode(['Hanya dalam fungsi', 'Seluruh file', 'Module lain', 'Global']), 'correct_answer' => 'Hanya dalam fungsi', 'explanation' => 'Variabel lokal hanya di dalam fungsi'],
            ['level_id' => 10, 'type' => 'coding', 'answer_type' => 'mcq', 'question_text' => 'Global keyword?', 'options' => json_encode(['Akses variabel global', 'Buat fungsi global', 'Export fungsi', 'Import modul']), 'correct_answer' => 'Akses variabel global', 'explanation' => 'global untuk ubah variabel di luar fungsi'],
        ];

        foreach ($level6Questions as $q) DB::table('questions')->insert($q);
        foreach ($level7Questions as $q) DB::table('questions')->insert($q);
        foreach ($level8Questions as $q) DB::table('questions')->insert($q);
        foreach ($level9Questions as $q) DB::table('questions')->insert($q);
        foreach ($level10Questions as $q) DB::table('questions')->insert($q);
    }
}