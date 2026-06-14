<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelContentSeeder extends Seeder
{
    public function run(): void
    {
        $contents = [
            1 => <<<MD
# Dasar Python

Python adalah bahasa pemrograman tingkat tinggi yang mudah dipelajari. Python menggunakan pendekatan **indentasi** untuk menandai blok kode, bukan kurung kurawal.

## Hello World

```python
print("Hello, World!")
```

Fungsi `print()` digunakan untuk menampilkan teks ke layar.

## Komentar

Komentar digunakan untuk menjelaskan kode dan tidak akan dieksekusi.

```python
# Ini adalah komentar satu baris

"""
Ini adalah komentar
multi-baris
"""
```

## Input dari User

Gunakan `input()` untuk menerima masukan dari pengguna:

```python
nama = input("Siapa nama kamu? ")
print("Halo,", nama)
```

## Aturan Dasar Python

1. Case-sensitive (`nama` berbeda dengan `Nama`)
2. Indentasi 4 spasi untuk blok kode
3. Tidak perlu titik koma di akhir baris
4. Baris baru adalah akhir dari sebuah statement
MD
            ,
            2 => <<<MD
# Variabel & Tipe Data

Variabel adalah tempat menyimpan data di memori. Python bersifat **dynamically typed** — kamu tidak perlu mendeklarasikan tipe data.

## Membuat Variabel

```python
nama = "Budi"       # string
umur = 17            # integer
tinggi = 1.75        # float
is_student = True    # boolean
```

## Tipe Data Dasar

| Tipe | Contoh | Keterangan |
|------|--------|------------|
| int | 5, -3, 1000 | Bilangan bulat |
| float | 3.14, -0.5 | Bilangan desimal |
| str | Halo, Python | Teks |
| bool | True, False | Boolean |

## Cek Tipe Data

```python
x = 10
print(type(x))  # <class "int">

y = "Python"
print(type(y))  # <class "str">
```

## Type Conversion

```python
x = "5"
y = int(x)       # konversi string ke int
z = float(y)     # konversi int ke float
teks = str(100)  # "100"
```

## Aturan Penamaan Variabel

1. Diawali huruf atau underscore (`_`)
2. Tidak boleh diawali angka
3. Hanya mengandung huruf, angka, underscore
4. Case-sensitive
MD
            ,
            3 => <<<MD
# Operators

Operator digunakan untuk melakukan operasi pada nilai dan variabel.

## Operator Aritmatika

| Operator | Nama | Contoh |
|----------|------|--------|
| + | Penjumlahan | 5 + 3 = 8 |
| - | Pengurangan | 5 - 3 = 2 |
| * | Perkalian | 5 * 3 = 15 |
| / | Pembagian (float) | 5 / 2 = 2.5 |
| // | Pembagian (integer) | 5 // 2 = 2 |
| % | Modulus (sisa bagi) | 5 % 2 = 1 |
| ** | Pangkat | 5 ** 2 = 25 |

## Operator Perbandingan

| Operator | Arti | Contoh |
|----------|------|--------|
| == | Sama dengan | 5 == 5 True |
| != | Tidak sama | 5 != 3 True |
| > | Lebih besar | 5 > 3 True |
| < | Lebih kecil | 5 < 3 False |
| >= | Lebih besar atau sama | 5 >= 5 True |
| <= | Lebih kecil atau sama | 5 <= 3 False |

## Operator Logika

| Operator | Arti | Contoh |
|----------|------|--------|
| and | Dan | True and False = False |
| or | Atau | True or False = True |
| not | Tidak | not True = False |

## Operator Assignment

```python
x = 5
x += 3   # sama dengan x = x + 3
x -= 2   # sama dengan x = x - 2
x *= 4   # sama dengan x = x * 4
x /= 2   # sama dengan x = x / 2
x %= 3   # sama dengan x = x % 3
```
MD
            ,
            4 => <<<MD
# Strings

String adalah kumpulan karakter yang digunakan untuk merepresentasikan teks.

## Membuat String

```python
# Petik satu
teks1 = 'Halo'

# Petik dua
teks2 = "Halo"

# Multi-baris
teks3 = """Baris 1
Baris 2
Baris 3"""
```

## Indexing & Slicing

```python
kata = "Python"

print(kata[0])    # P (index 0)
print(kata[-1])   # n (index terakhir)
print(kata[0:3])  # Pyt (index 0 sampai 2)
print(kata[:3])   # Pyt (dari awal)
print(kata[3:])   # hon (sampai akhir)
print(kata[::-1]) # nohtyP (dibalik)
```

## Method String Penting

```python
kata = "  Python Programming  "

print(kata.upper())       # "  PYTHON PROGRAMMING  "
print(kata.lower())       # "  python programming  "
print(kata.strip())       # "Python Programming"
print(kata.split())       # ["Python", "Programming"]
print(kata.replace("Python", "Java"))  # "Java Programming"
print(len(kata))          # 24 (termasuk spasi)
```

## Concatenation & Formatting

```python
nama = "Budi"
umur = 17

# Concatenation
teks = nama + " berusia " + str(umur) + " tahun"

# f-string (Python 3.6+)
teks = f"{nama} berusia {umur} tahun"

# format()
teks = "{} berusia {} tahun".format(nama, umur)
```
MD
            ,
            5 => <<<MD
# Lists

List adalah struktur data yang menyimpan kumpulan item dalam satu variabel. List bersifat **mutable** (bisa diubah).

## Membuat List

```python
buah = ["apel", "pisang", "jeruk"]
angka = [1, 2, 3, 4, 5]
campuran = ["teks", 100, True, 3.14]
list_kosong = []
```

## Mengakses & Mengubah

```python
buah = ["apel", "pisang", "jeruk"]

print(buah[0])      # apel
print(buah[-1])     # jeruk
print(buah[0:2])    # ["apel", "pisang"]

buah[1] = "mangga"  # ["apel", "mangga", "jeruk"]
```

## Method List

```python
list_angka = [3, 1, 4, 1, 5]

list_angka.append(9)     # tambah di akhir
list_angka.insert(2, 7)  # tambah di index 2
list_angka.remove(1)     # hapus item pertama bernilai 1
list_angka.pop()         # hapus item terakhir
list_angka.sort()        # urutkan ascending
list_angka.reverse()     # balik urutan
print(len(list_angka))   # panjang list
```

## List Comprehension

Cara ringkas membuat list:

```python
# Buat list kuadrat dari 0-9
kuadrat = [x**2 for x in range(10)]

# Filter bilangan genap
genap = [x for x in range(10) if x % 2 == 0]
```

## Nested List

```python
matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
]

print(matrix[1][2])  # 6
```
MD
            ,
            6 => <<<MD
# Tuples & Sets

## Tuple

Tuple mirip dengan list, tetapi bersifat **immutable** (tidak bisa diubah setelah dibuat).

```python
# Membuat tuple
warna = ("merah", "hijau", "biru")
angka = 1, 2, 3        # tanpa kurung
tuple_satu_item = ("a",)  # koma wajib

# Mengakses (sama seperti list)
print(warna[0])      # merah
print(warna[-1])     # biru

# Tuple tidak bisa diubah
# warna[1] = "kuning"  # ERROR!

# Unpacking tuple
a, b, c = (10, 20, 30)
print(a, b, c)  # 10 20 30
```

### Kapan pakai Tuple?
- Data yang tidak boleh berubah (konstanta)
- Lebih cepat dari list
- Bisa jadi key di dictionary

## Set

Set adalah kumpulan item **unik** (tidak ada duplikat) dan **tidak berurutan**.

```python
# Membuat set
buah = {"apel", "pisang", "jeruk", "apel"}
print(buah)  # {"apel", "pisang", "jeruk"} — duplikat dihapus

# Operasi Set
a = {1, 2, 3, 4}
b = {3, 4, 5, 6}

print(a | b)  # Union
print(a & b)  # Intersection
print(a - b)  # Difference
print(a ^ b)  # Symmetric difference

# Method Set
buah.add("mangga")      # tambah item
buah.remove("pisang")   # hapus item (error jika tidak ada)
buah.discard("anggur")  # hapus item (aman)
```
MD
            ,
            7 => <<<MD
# Dictionaries

Dictionary menyimpan data dalam pasangan **key-value**. Sejak Python 3.7, dictionary mempertahankan urutan insert.

## Membuat Dictionary

```python
# Cara 1
siswa = {
    "nama": "Budi",
    "umur": 17,
    "kelas": "10A"
}

# Cara 2
siswa = dict(nama="Budi", umur=17, kelas="10A")

# Dictionary kosong
data = {}
```

## Mengakses & Mengubah

```python
siswa = {"nama": "Budi", "umur": 17}

print(siswa["nama"])      # Budi
print(siswa.get("nama"))  # Budi (lebih aman)
print(siswa.get("alamat", "tidak ada"))  # tidak ada

siswa["umur"] = 18        # ubah nilai
siswa["alamat"] = "Jakarta"  # tambah key baru
```

## Method Dictionary

```python
siswa = {"nama": "Budi", "umur": 17, "kelas": "10A"}

print(siswa.keys())    # dict_keys(["nama", "umur", "kelas"])
print(siswa.values())  # dict_values(["Budi", 17, "10A"])
print(siswa.items())   # semua pasangan (key, value)

siswa.pop("kelas")     # hapus key "kelas"
siswa.clear()          # hapus semua
```

## Looping Dictionary

```python
siswa = {"nama": "Budi", "umur": 17}

for key in siswa:
    print(key, siswa[key])

for key, value in siswa.items():
    print(f"{key}: {value}")
```

## Nested Dictionary

```python
sekolah = {
    "siswa1": {"nama": "Budi", "nilai": 90},
    "siswa2": {"nama": "Ani", "nilai": 85},
    "siswa3": {"nama": "Cici", "nilai": 92}
}

print(sekolah["siswa1"]["nama"])  # Budi
```
MD
            ,
            8 => <<<MD
# Conditional Statements

Percabangan digunakan untuk mengambil keputusan berdasarkan kondisi tertentu.

## if-elif-else

```python
nilai = 85

if nilai >= 90:
    print("A")
elif nilai >= 80:
    print("B")
elif nilai >= 70:
    print("C")
else:
    print("D")
```

## Ternary Operator

Cara singkat menulis if-else satu baris:

```python
# if-else biasa
if umur >= 17:
    status = "Dewasa"
else:
    status = "Anak-anak"

# Ternary
status = "Dewasa" if umur >= 17 else "Anak-anak"
```

## Multiple Conditions

```python
nilai = 85
absen = 90

if nilai >= 80 and absen >= 80:
    print("Lulus")
elif nilai >= 80 or absen >= 80:
    print("Remidi")
else:
    print("Tidak lulus")
```

## Membership Operators

```python
buah = ["apel", "pisang", "jeruk"]

if "apel" in buah:
    print("Apel tersedia")

if "anggur" not in buah:
    print("Anggur tidak tersedia")
```

## Identity Operators

```python
a = [1, 2, 3]
b = [1, 2, 3]
c = a

print(a is c)    # True (sama object)
print(a is b)    # False (beda object meskipun sama value)
print(a == b)    # True (sama value)
```
MD
            ,
            9 => <<<MD
# Loops

Perulangan digunakan untuk mengeksekusi blok kode berulang kali.

## For Loop

```python
# Iterasi list
buah = ["apel", "pisang", "jeruk"]
for b in buah:
    print(b)

# range()
for i in range(5):       # 0, 1, 2, 3, 4
    print(i)

for i in range(1, 10, 2):  # 1, 3, 5, 7, 9
    print(i)

# Iterasi string
for ch in "Python":
    print(ch)

# enumerate() — dapat index
for i, b in enumerate(buah):
    print(f"{i}: {b}")
```

## While Loop

```python
i = 1
while i <= 5:
    print(i)
    i += 1
```

## break & continue

```python
# break — hentikan loop
for i in range(10):
    if i == 5:
        break
    print(i)  # 0, 1, 2, 3, 4

# continue — skip iterasi
for i in range(5):
    if i == 2:
        continue
    print(i)  # 0, 1, 3, 4
```

## else pada Loop

Blok `else` dijalankan jika loop **selesai tanpa break**:

```python
for i in range(5):
    print(i)
else:
    print("Loop selesai tanpa break")

for i in range(5):
    if i == 3:
        break
    print(i)
else:
    print("Ini tidak akan tampil")
```

## Nested Loop

```python
for i in range(3):
    for j in range(3):
        print(f"({i},{j})", end=" ")
    print()
```
MD
            ,
            10 => <<<MD
# Functions

Fungsi adalah blok kode yang dapat dipanggil berulang kali.

## Definisi Fungsi

```python
def sapa():
    print("Halo, selamat datang!")

sapa()  # panggil fungsi
```

## Parameter & Argumen

```python
# Parameter wajib
def sapa(nama):
    print(f"Halo, {nama}!")

sapa("Budi")

# Multiple parameter
def tambah(a, b):
    return a + b

hasil = tambah(5, 3)
print(hasil)  # 8

# Default parameter
def sapa(nama="Teman"):
    print(f"Halo, {nama}!")

sapa()        # Halo, Teman!
sapa("Budi")  # Halo, Budi!
```

## return

```python
def luas_persegi(sisi):
    return sisi * sisi

luas = luas_persegi(5)
print(luas)  # 25

# return multiple value
def hitung(a, b):
    return a + b, a - b, a * b

tambah, kurang, kali = hitung(10, 3)
```

## Scope Variabel

```python
x = 10  # global

def ubah():
    global x
    x = 20

ubah()
print(x)  # 20
```

## Lambda (Fungsi Anonim)

```python
# Lambda satu baris
kuadrat = lambda x: x ** 2
print(kuadrat(5))  # 25

# Lambda dengan filter/map
angka = [1, 2, 3, 4, 5]
genap = list(filter(lambda x: x % 2 == 0, angka))
print(genap)  # [2, 4]
```
MD
            ,
        ];

        foreach ($contents as $levelId => $content) {
            DB::table('levels')->where('id', $levelId)->update([
                'content' => $content,
            ]);
        }

        $this->command->info('Level content seeded successfully!');
    }
}
