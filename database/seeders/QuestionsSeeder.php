<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsSeeder extends Seeder
{
    public function run(): void
    {
        // Level 1 - Dasar Python
        $level1Questions = [
            [
                'level_id' => 1,
                'type' => 'output',
                'answer_type' => 'mcq',
                'question_text' => 'Apa output dari perintah print("Hello World")?',
                'code_snippet' => 'print("Hello World")',
                'options' => json_encode(['Hello World', 'hello world', 'HELLO WORLD', 'Tidak ada output']),
                'correct_answer' => 'Hello World',
                'explanation' => 'Fungsi print() akan menampilkan teks yang diapit tanda kutip apa adanya.',
                'test_cases' => null,
            ],
            [
                'level_id' => 1,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Manakah kode yang benar untuk membuat variabel "nama" dengan nilai "PyLearn" lalu mencetaknya?',
                'code_snippet' => null,
                'options' => json_encode([
                    'nama = "PyLearn"\nprint(nama)',
                    'var nama = "PyLearn"\nprint(nama)',
                    'nama : "PyLearn"\nprint(nama)',
                    'nama = "PyLearn"\necho nama'
                ]),
                'correct_answer' => 'nama = "PyLearn"\nprint(nama)',
                'explanation' => 'Variabel dibuat dengan syntax: nama_variabel = nilai. Kemudian dicetak dengan print().',
                'test_cases' => null,
            ],
            [
                'level_id' => 1,
                'type' => 'output',
                'answer_type' => 'mcq',
                'question_text' => 'Apa tipe data dari nilai 3.14?',
                'code_snippet' => 'x = 3.14',
                'options' => json_encode(['int', 'float', 'str', 'bool']),
                'correct_answer' => 'float',
                'explanation' => 'Angka desimal (dengan titik) dalam Python bertipe float.',
                'test_cases' => null,
            ],
            [
                'level_id' => 1,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Manakah perintah yang benar untuk menghitung dan mencetak hasil dari 15 + 25 * 3?',
                'code_snippet' => null,
                'options' => json_encode([
                    'print(15 + 25 * 3)',
                    'print(15 + (25 * 3))',
                    'echo 15 + 25 * 3',
                    'print 15 + 25 * 3'
                ]),
                'correct_answer' => 'print(15 + 25 * 3)',
                'explanation' => 'Dalam operasi matematika, perkalian (*) dilakukan lebih dulu, lalu penjumlahan. Jadi 25 * 3 = 75, lalu 15 + 75 = 90.',
                'test_cases' => null,
            ],
            [
                'level_id' => 1,
                'type' => 'output',
                'answer_type' => 'mcq',
                'question_text' => 'Apa output dari operasi berikut?',
                'code_snippet' => 'print(10 // 3)',
                'options' => json_encode(['3.33', '3', '4', 'Error']),
                'correct_answer' => '3',
                'explanation' => 'Operator // adalah floor division (pembagian bulat ke bawah). 10 // 3 = 3.',
                'test_cases' => null,
            ],
            [
                'level_id' => 1,
                'type' => 'debugging',
                'answer_type' => 'mcq',
                'question_text' => 'Manakah perbaikan yang benar agar kode "print "Hello"" tidak error di Python 3?',
                'code_snippet' => 'print "Hello"',
                'options' => json_encode([
                    'print("Hello")',
                    'echo "Hello"',
                    'printf("Hello")',
                    'print Hello'
                ]),
                'correct_answer' => 'print("Hello")',
                'explanation' => 'Di Python 3, print adalah fungsi sehingga harus menggunakan tanda kurung.',
                'test_cases' => null,
            ],
            [
                'level_id' => 1,
                'type' => 'output',
                'answer_type' => 'mcq',
                'question_text' => 'Apa hasil dari len("Python")?',
                'code_snippet' => 'len("Python")',
                'options' => json_encode(['6', '5', '7', 'Error']),
                'correct_answer' => '6',
                'explanation' => 'Fungsi len() menghitung jumlah karakter dalam string. "Python" memiliki 6 huruf.',
                'test_cases' => null,
            ],
            [
                'level_id' => 1,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Manakah kode yang benar untuk membuat variabel a=5, b=3, dan mencetak hasil a-b?',
                'code_snippet' => null,
                'options' => json_encode([
                    'a = 5\nb = 3\nprint(a - b)',
                    'a, b = 5, 3\nprint a - b',
                    'a = 5; b = 3; echo a - b',
                    'int a = 5, b = 3\nprint(a - b)'
                ]),
                'correct_answer' => 'a = 5\nb = 3\nprint(a - b)',
                'explanation' => 'Variabel dapat dikurangkan satu sama lain dengan operasi -',
                'test_cases' => null,
            ],
            [
                'level_id' => 1,
                'type' => 'output',
                'answer_type' => 'mcq',
                'question_text' => 'Apa tipe data dari boolean True?',
                'code_snippet' => 'x = True',
                'options' => json_encode(['int', 'str', 'bool', 'float']),
                'correct_answer' => 'bool',
                'explanation' => 'True dan False adalah tipe data boolean di Python.',
                'test_cases' => null,
            ],
            [
                'level_id' => 1,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Manakah cara yang benar untuk mencetak: "Ciudad favorita: Tokyo" menggunakan f-string?',
                'code_snippet' => 'ciudad = "Tokyo"',
                'options' => json_encode([
                    'print(f"Ciudad favorita: {ciudad}")',
                    'print("Ciudad favorita: " + ciudad)',
                    'print("Ciudad favorita: {ciudad}")',
                    'print(f"Ciudad favorita: ciudad")'
                ]),
                'correct_answer' => 'print(f"Ciudad favorita: {ciudad}")',
                'explanation' => 'String interpolation dapat menggunakan f-string dengan syntax f"text {variable}".',
                'test_cases' => null,
            ],
        ];

        // Level 2 - Percabangan
        $level2Questions = [
            [
                'level_id' => 2,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Manakah kode yang benar untuk mencetak "Dewasa" jika usia >= 18?',
                'code_snippet' => 'usia = 20',
                'options' => json_encode([
                    'if usia >= 18:\n    print("Dewasa")',
                    'if (usia >= 18) { print("Dewasa") }',
                    'if usia >= 18 then print("Dewasa")',
                    'usia >= 18 ? print("Dewasa") : null'
                ]),
                'correct_answer' => 'if usia >= 18:\n    print("Dewasa")',
                'explanation' => 'Gunakan if statement dengan kondisi >= 18 dan tanda titik dua.',
                'test_cases' => null,
            ],
            [
                'level_id' => 2,
                'type' => 'output',
                'answer_type' => 'mcq',
                'question_text' => 'Apa output dari kode berikut?',
                'code_snippet' => 'x = 5\nif x > 3:\n    print("A")\nelse:\n    print("B")',
                'options' => json_encode(['A', 'B', 'A B', 'Error']),
                'correct_answer' => 'A',
                'explanation' => 'Karena 5 > 3 bernilai True, maka blok if akan dieksekusi.',
                'test_cases' => null,
            ],
            [
                'level_id' => 2,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Manakah kondisi yang benar untuk memeriksa apakah angka adalah genap?',
                'code_snippet' => 'angka = 7',
                'options' => json_encode([
                    'if angka % 2 == 0:',
                    'if angka / 2 == 0:',
                    'if angka % 2 = 0:',
                    'if angka mod 2 == 0:'
                ]),
                'correct_answer' => 'if angka % 2 == 0:',
                'explanation' => 'Gunakan operator modulo (%) untuk menentukan sisa bagi. Jika sisa 0 berarti genap.',
                'test_cases' => null,
            ],
            [
                'level_id' => 2,
                'type' => 'output',
                'answer_type' => 'mcq',
                'question_text' => 'Apa output dari nested if berikut?',
                'code_snippet' => 'x = 10\nif x > 5:\n    if x > 8:\n        print("A")\n    else:\n        print("B")',
                'options' => json_encode(['A', 'B', 'A dan B', 'Tidak ada output']),
                'correct_answer' => 'A',
                'explanation' => 'x=10 > 5 (True) dan x=10 > 8 (True), jadi print("A")',
                'test_cases' => null,
            ],
            [
                'level_id' => 2,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Manakah kode yang benar untuk mengecek username="admin" DAN password="123"?',
                'code_snippet' => null,
                'options' => json_encode([
                    'if username == "admin" and password == "123":',
                    'if username == "admin" && password == "123":',
                    'if username = "admin" and password = "123":',
                    'if username == "admin" & password == "123":'
                ]),
                'correct_answer' => 'if username == "admin" and password == "123":',
                'explanation' => 'Gunakan operator logika and untuk menggabungkan dua kondisi.',
                'test_cases' => null,
            ],
            [
                'level_id' => 2,
                'type' => 'output',
                'answer_type' => 'mcq',
                'question_text' => 'Apa output dari elif berikut?',
                'code_snippet' => 'nilai = 75\nif nilai >= 90:\n    print("A")\nelif nilai >= 80:\n    print("B")\nelif nilai >= 70:\n    print("C")\nelse:\n    print("D")',
                'options' => json_encode(['A', 'B', 'C', 'D']),
                'correct_answer' => 'C',
                'explanation' => 'Nilai 75 memenuhi kondisi >= 70 pada elif ketiga, jadi print "C".',
                'test_cases' => null,
            ],
            [
                'level_id' => 2,
                'type' => 'debugging',
                'answer_type' => 'mcq',
                'question_text' => 'Manakah perbaikan yang benar untuk kode "if x > 5 print("Besar")"?',
                'code_snippet' => 'if x > 5 print("Besar")',
                'options' => json_encode([
                    'if x > 5:\n    print("Besar")',
                    'if x > 5 then print("Besar")',
                    'if (x > 5) print("Besar")',
                    'if x > 5 { print("Besar") }'
                ]),
                'correct_answer' => 'if x > 5:\n    print("Besar")',
                'explanation' => 'Setelah kondisi if harus ada tanda titik dua (:) dan blok kode harus diindent.',
                'test_cases' => null,
            ],
            [
                'level_id' => 2,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Urutan keyword yang benar untuk percabangan lebih dari dua kondisi adalah...',
                'code_snippet' => null,
                'options' => json_encode([
                    'if, elif, else',
                    'if, else if, else',
                    'if, elseif, else',
                    'if, cases, default'
                ]),
                'correct_answer' => 'if, elif, else',
                'explanation' => 'Python menggunakan if, elif, dan else untuk percabangan bertingkat.',
                'test_cases' => null,
            ],
            [
                'level_id' => 2,
                'type' => 'output',
                'answer_type' => 'mcq',
                'question_text' => 'Apa hasil dari operasi boolean?',
                'code_snippet' => 'print(True and False or True)',
                'options' => json_encode(['True', 'False', 'Error', 'None']),
                'correct_answer' => 'True',
                'explanation' => 'True and False = False, lalu False or True = True.',
                'test_cases' => null,
            ],
            [
                'level_id' => 2,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Manakah kode yang benar untuk mengecek usia >= 17 dan punya_ktp bernilai True?',
                'code_snippet' => null,
                'options' => json_encode([
                    'if usia >= 17 and punya_ktp:',
                    'if usia >= 17 and punya_ktp == True:',
                    'Semua benar',
                    'if usia >= 17 & punya_ktp:'
                ]),
                'correct_answer' => 'Semua benar',
                'explanation' => 'Kedua cara tersebut valid dalam Python untuk mengecek kondisi boolean.',
                'test_cases' => null,
            ],
        ];

        // Level 3 - Looping
        $level3Questions = [
            [
                'level_id' => 3,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Manakah kode yang benar untuk loop for menampilkan angka 1 sampai 5?',
                'code_snippet' => null,
                'options' => json_encode([
                    'for i in range(1, 6):\n    print(i)',
                    'for i in range(5):\n    print(i)',
                    'for (i=1; i<=5; i++):\n    print(i)',
                    'foreach i in 1..5:\n    print(i)'
                ]),
                'correct_answer' => 'for i in range(1, 6):\n    print(i)',
                'explanation' => 'range(1, 6) menghasilkan 1,2,3,4,5. Penggunaan range(start, end+1).',
                'test_cases' => null,
            ],
            [
                'level_id' => 3,
                'type' => 'output',
                'answer_type' => 'mcq',
                'question_text' => 'Berapa kali loop ini akan berjalan?',
                'code_snippet' => 'for i in range(3):\n    print(i)',
                'options' => json_encode(['2', '3', '4', 'Tidak terbatas']),
                'correct_answer' => '3',
                'explanation' => 'range(3) menghasilkan 0, 1, 2 - total 3 iterasi.',
                'test_cases' => null,
            ],
            [
                'level_id' => 3,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Manakah struktur while loop yang benar untuk menghitung 0 sampai 4?',
                'code_snippet' => null,
                'options' => json_encode([
                    'i = 0\nwhile i < 5:\n    print(i)\n    i += 1',
                    'while i < 5 do print(i)',
                    'i = 0\nwhile i < 5 { print(i); i++ }',
                    'for i < 5:\n    print(i)'
                ]),
                'correct_answer' => 'i = 0\nwhile i < 5:\n    print(i)\n    i += 1',
                'explanation' => 'While loop berjalan selama kondisi True, perlu increment manual.',
                'test_cases' => null,
            ],
            [
                'level_id' => 3,
                'type' => 'output',
                'answer_type' => 'mcq',
                'question_text' => 'Apa output dari break dalam loop?',
                'code_snippet' => 'for i in range(5):\n    if i == 3:\n        break\n    print(i)',
                'options' => json_encode(['0 1 2', '0 1 2 3', '3', '0 1 2 3 4']),
                'correct_answer' => '0 1 2',
                'explanation' => 'Break menghentikan loop saat i mencapai 3, jadi 0,1,2 dicetak.',
                'test_cases' => null,
            ],
            [
                'level_id' => 3,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Keyword apa yang digunakan untuk melewati iterasi saat ini dan lanjut ke iterasi berikutnya?',
                'code_snippet' => null,
                'options' => json_encode(['continue', 'break', 'pass', 'next']),
                'correct_answer' => 'continue',
                'explanation' => 'Continue melewati sisa kode dalam iterasi dan langsung ke iterasi berikutnya.',
                'test_cases' => null,
            ],
            [
                'level_id' => 3,
                'type' => 'output',
                'answer_type' => 'mcq',
                'question_text' => 'Apa fungsi continue dalam loop?',
                'code_snippet' => 'for i in range(3):\n    if i == 1:\n        continue\n    print(i)',
                'options' => json_encode(['Menghentikan loop', 'Melanjutkan ke iterasi berikutnya', 'Mengulang iterasi saat ini', 'Tidak ada efek']),
                'correct_answer' => 'Melanjutkan ke iterasi berikutnya',
                'explanation' => 'Continue melewati sisa kode dalam iterasi dan langsung ke iterasi berikutnya.',
                'test_cases' => null,
            ],
            [
                'level_id' => 3,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Manakah range() yang benar untuk menghasilkan angka 3, 6, 9, 12, 15?',
                'code_snippet' => null,
                'options' => json_encode([
                    'range(3, 16, 3)',
                    'range(3, 15, 3)',
                    'range(15, 3)',
                    'range(3, 16)'
                ]),
                'correct_answer' => 'range(3, 16, 3)',
                'explanation' => 'Gunakan range(start, end, step) dengan step 3.',
                'test_cases' => null,
            ],
            [
                'level_id' => 3,
                'type' => 'output',
                'answer_type' => 'mcq',
                'question_text' => 'Berapa total penjumlahan dari 1+2+3+4+5?',
                'code_snippet' => 'total = 0\nfor i in range(1, 6):\n    total += i\nprint(total)',
                'options' => json_encode(['10', '15', '20', '25']),
                'correct_answer' => '15',
                'explanation' => '1+2+3+4+5 = 15',
                'test_cases' => null,
            ],
            [
                'level_id' => 3,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Keyword apa yang digunakan untuk menghentikan loop sepenuhnya?',
                'code_snippet' => null,
                'options' => json_encode(['break', 'continue', 'stop', 'exit']),
                'correct_answer' => 'break',
                'explanation' => 'Break digunakan untuk keluar dari loop secara paksa.',
                'test_cases' => null,
            ],
            [
                'level_id' => 3,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Manakah cara membuat loop tak terbatas (infinite loop) yang benar?',
                'code_snippet' => null,
                'options' => json_encode([
                    'while True:',
                    'for (;;):',
                    'loop forever:',
                    'while 1 == 1:'
                ]),
                'correct_answer' => 'while True:',
                'explanation' => 'while True akan selalu bernilai benar sehingga loop berjalan terus.',
                'test_cases' => null,
            ],
        ];

        // Level 4 - Looping Lanjutan
        $level4Questions = [
            [
                'level_id' => 4,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Loop di dalam loop disebut sebagai...',
                'code_snippet' => null,
                'options' => json_encode([
                    'Nested loop',
                    'Double loop',
                    'Inside loop',
                    'Multi loop'
                ]),
                'correct_answer' => 'Nested loop',
                'explanation' => 'Nested loop adalah penggunaan struktur loop di dalam loop lainnya.',
                'test_cases' => null,
            ],
            [
                'level_id' => 4,
                'type' => 'output',
                'answer_type' => 'mcq',
                'question_text' => 'Berapa total iterasi dari nested loop berikut?',
                'code_snippet' => 'for i in range(3):\n    for j in range(2):\n        pass',
                'options' => json_encode(['3', '2', '6', '5']),
                'correct_answer' => '6',
                'explanation' => '3 x 2 = 6 total iterasi.',
                'test_cases' => null,
            ],
            [
                'level_id' => 4,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Manakah cara singkat mencetak "*" sebanyak i kali?',
                'code_snippet' => null,
                'options' => json_encode([
                    'print("*" * i)',
                    'print("*" + i)',
                    'print("*" . i)',
                    'print(str_repeat("*", i))'
                ]),
                'correct_answer' => 'print("*" * i)',
                'explanation' => 'Di Python, string bisa dikalikan dengan integer untuk pengulangan.',
                'test_cases' => null,
            ],
            [
                'level_id' => 4,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Bagaimana cara mengakses elemen di baris i dan kolom j pada list 2D?',
                'code_snippet' => 'matrix = [[1,2], [3,4]]',
                'options' => json_encode([
                    'matrix[i][j]',
                    'matrix[i, j]',
                    'matrix(i)(j)',
                    'matrix{i}{j}'
                ]),
                'correct_answer' => 'matrix[i][j]',
                'explanation' => 'List 2D diakses dengan dua kurung siku berturut-turut.',
                'test_cases' => null,
            ],
            [
                'level_id' => 4,
                'type' => 'output',
                'answer_type' => 'mcq',
                'question_text' => 'Apa output dari enumerate berikut?',
                'code_snippet' => 'buah = ["apel", "mangga"]\nfor i, nama in enumerate(buah):\n    print(i, nama)',
                'options' => json_encode(['0 apel 1 mangga', 'apel mangga', '1 apel 2 mangga', 'Error']),
                'correct_answer' => '0 apel 1 mangga',
                'explanation' => 'enumerate() mengembalikan index dan nilai dimulai dari 0.',
                'test_cases' => null,
            ],
            [
                'level_id' => 4,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Manakah list comprehension yang benar untuk membuat list kuadrat angka 1-5?',
                'code_snippet' => null,
                'options' => json_encode([
                    '[x**2 for x in range(1, 6)]',
                    '[x^2 for x in range(5)]',
                    '{x**2 for x in range(1, 6)}',
                    '[for x in range(1, 6): x**2]'
                ]),
                'correct_answer' => '[x**2 for x in range(1, 6)]',
                'explanation' => 'List comprehension menggunakan kurung siku dengan syntax [ekspresi for item in iterable].',
                'test_cases' => null,
            ],
            [
                'level_id' => 4,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Manakah cara mengecek apakah suatu angka n habis dibagi i?',
                'code_snippet' => null,
                'options' => json_encode([
                    'n % i == 0',
                    'n / i == 0',
                    'n // i == 0',
                    'n % i = 0'
                ]),
                'correct_answer' => 'n % i == 0',
                'explanation' => 'Operator modulo (%) menghasilkan sisa bagi.',
                'test_cases' => null,
            ],
            [
                'level_id' => 4,
                'type' => 'output',
                'answer_type' => 'mcq',
                'question_text' => 'Apa output dari zip dalam Python?',
                'code_snippet' => 'a = [1, 2]\nb = ["a", "b"]\nfor x, y in zip(a, b):\n    print(x, y)',
                'options' => json_encode(['1 a 2 b', 'a1 b2', '1,2 a,b', 'Error']),
                'correct_answer' => '1 a 2 b',
                'explanation' => 'zip() menggabungkan elemen dari beberapa iterable berpasangan.',
                'test_cases' => null,
            ],
            [
                'level_id' => 4,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Manakah cara mencetak string " " sebanyak n kali?',
                'code_snippet' => null,
                'options' => json_encode([
                    '" " * n',
                    'space(n)',
                    '" " . n',
                    'n * " "'
                ]),
                'correct_answer' => '" " * n',
                'explanation' => 'Perkalian string berlaku untuk karakter apa saja termasuk spasi.',
                'test_cases' => null,
            ],
            [
                'level_id' => 4,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Method apa yang digunakan untuk menambah elemen ke dalam list?',
                'code_snippet' => null,
                'options' => json_encode([
                    'append()',
                    'add()',
                    'push()',
                    'insert()'
                ]),
                'correct_answer' => 'append()',
                'explanation' => 'append() menambahkan satu elemen ke akhir list.',
                'test_cases' => null,
            ],
        ];

        // Level 5 - Functions & Modules
        $level5Questions = [
            [
                'level_id' => 5,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Keyword apa yang digunakan untuk mendefinisikan fungsi?',
                'code_snippet' => null,
                'options' => json_encode(['def', 'function', 'func', 'define']),
                'correct_answer' => 'def',
                'explanation' => 'Fungsi didefinisikan dengan keyword def.',
                'test_cases' => null,
            ],
            [
                'level_id' => 5,
                'type' => 'output',
                'answer_type' => 'mcq',
                'question_text' => 'Apa output dari fungsi berikut?',
                'code_snippet' => 'def tambah(a, b=5):\n    return a + b\n\nprint(tambah(3))',
                'options' => json_encode(['3', '8', 'Error', 'None']),
                'correct_answer' => '8',
                'explanation' => 'Parameter b memiliki default value 5, jadi 3 + 5 = 8.',
                'test_cases' => null,
            ],
            [
                'level_id' => 5,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Manakah cara yang benar untuk memanggil fungsi luas(r)?',
                'code_snippet' => null,
                'options' => json_encode([
                    'luas(7)',
                    'call luas(7)',
                    'run luas(7)',
                    'luas 7'
                ]),
                'correct_answer' => 'luas(7)',
                'explanation' => 'Fungsi dipanggil dengan menulis namanya diikuti tanda kurung dan argumen.',
                'test_cases' => null,
            ],
            [
                'level_id' => 5,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Bagaimana cara mengembalikan dua nilai sekaligus dari fungsi?',
                'code_snippet' => null,
                'options' => json_encode([
                    'return a, b',
                    'return [a, b]',
                    'return (a, b)',
                    'Semua benar'
                ]),
                'correct_answer' => 'Semua benar',
                'explanation' => 'Python dapat mengembalikan multiple values secara fleksibel.',
                'test_cases' => null,
            ],
            [
                'level_id' => 5,
                'type' => 'output',
                'answer_type' => 'mcq',
                'question_text' => 'Apa output dari *args?',
                'code_snippet' => 'def total(*args):\n    return sum(args)\n\nprint(total(1, 2, 3))',
                'options' => json_encode(['6', '1 2 3', 'Error', 'None']),
                'correct_answer' => '6',
                'explanation' => '*args menerima jumlah argumen tak terbatas sebagai tuple.',
                'test_cases' => null,
            ],
            [
                'level_id' => 5,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Keyword apa yang digunakan untuk argumen keyword tak terbatas?',
                'code_snippet' => null,
                'options' => json_encode(['**kwargs', '*args', '*kwargs', '**args']),
                'correct_answer' => '**kwargs',
                'explanation' => '**kwargs menerima argumen keyword dalam bentuk dictionary.',
                'test_cases' => null,
            ],
            [
                'level_id' => 5,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Manakah perintah yang benar untuk mengimport modul math?',
                'code_snippet' => null,
                'options' => json_encode([
                    'import math',
                    'include math',
                    'using math',
                    'require math'
                ]),
                'correct_answer' => 'import math',
                'explanation' => 'Keyword import digunakan untuk memuat modul.',
                'test_cases' => null,
            ],
            [
                'level_id' => 5,
                'type' => 'output',
                'answer_type' => 'mcq',
                'question_text' => 'Apa perbedaan antara return dan print?',
                'code_snippet' => null,
                'options' => json_encode([
                    'return mengirim nilai, print menampilkan',
                    'Sama saja',
                    'return hanya untuk angka',
                    'print lebih cepat'
                ]),
                'correct_answer' => 'return mengirim nilai, print menampilkan',
                'explanation' => 'return menghasilkan nilai yang dapat diolah, print hanya menampilkan.',
                'test_cases' => null,
            ],
            [
                'level_id' => 5,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Fungsi yang memanggil dirinya sendiri disebut...',
                'code_snippet' => null,
                'options' => json_encode([
                    'Fungsi rekursif',
                    'Fungsi loop',
                    'Fungsi internal',
                    'Fungsi lambda'
                ]),
                'correct_answer' => 'Fungsi rekursif',
                'explanation' => 'Rekursi adalah teknik di mana fungsi memanggil dirinya sendiri.',
                'test_cases' => null,
            ],
            [
                'level_id' => 5,
                'type' => 'coding',
                'answer_type' => 'mcq',
                'question_text' => 'Bagaimana cara menggunakan fungsi dari modul yang diimport dengan alias?',
                'code_snippet' => null,
                'options' => json_encode([
                    'import math as m',
                    'alias math m',
                    'math as m',
                    'import math m'
                ]),
                'correct_answer' => 'import math as m',
                'explanation' => 'Gunakan as untuk memberikan alias pada modul.',
                'test_cases' => null,
            ],
        ];

        // Insert all questions
        $allQuestions = array_merge($level1Questions, $level2Questions, $level3Questions, $level4Questions, $level5Questions);
        
        foreach ($allQuestions as $question) {
            DB::table('questions')->insert($question);
        }
    }
}