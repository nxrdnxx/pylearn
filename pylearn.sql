-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2026 at 08:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pylearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `color` varchar(20) NOT NULL DEFAULT '#f59e0b',
  `condition` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`id`, `name`, `description`, `icon`, `color`, `condition`, `created_at`, `updated_at`) VALUES
(1, 'First Blood', 'Selesaikan setidaknya satu soal di Level 1', 'fa-solid fa-droplet', '#f59e0b', 'first_level', '2026-05-10 04:53:09', '2026-05-10 04:53:09'),
(2, 'Diamond Collector', 'Kumpulkan total 5000 XP', 'fa-solid fa-gem', '#f59e0b', 'xp_5000', '2026-05-10 04:53:09', '2026-05-10 04:53:09'),
(3, 'Streak Starter', 'Pertahankan streak selama 3 hari', 'fa-solid fa-fire-burner', '#f59e0b', 'streak_3', '2026-05-10 04:53:09', '2026-05-10 04:53:09'),
(4, 'Python King', 'Raih peringkat #1 di leaderboard', 'fa-solid fa-crown', '#f59e0b', 'rank_1', '2026-05-10 04:53:09', '2026-05-10 04:53:09'),
(5, 'Night Owl', 'Belajar di atas jam 11 malam', 'fa-solid fa-owl', '#f59e0b', 'night_study', '2026-05-10 04:53:09', '2026-05-10 04:53:09'),
(6, 'Quiz Master', 'Selesaikan semua level dengan skor sempurna', 'fa-solid fa-graduation-cap', '#f59e0b', 'perfect_score', '2026-05-10 04:53:09', '2026-05-10 04:53:09'),
(7, 'Early Bird', 'Belajar di pagi buta (jam 4 - 7 pagi)', 'fa-solid fa-sun', '#f59e0b', 'early_bird', '2026-05-10 04:53:09', '2026-05-10 04:53:09'),
(8, 'Consistent Coder', 'Pertahankan streak selama 7 hari berturut-turut', 'fa-solid fa-calendar-check', '#f59e0b', 'streak_7', '2026-05-10 04:53:09', '2026-05-10 04:53:09'),
(9, 'Problem Solver', 'Jawab total 100 soal dengan benar', 'fa-solid fa-brain', '#f59e0b', 'questions_100', '2026-05-10 04:53:09', '2026-05-10 04:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `daily_quests`
--

CREATE TABLE `daily_quests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `quest_date` date NOT NULL,
  `user_answer` varchar(255) DEFAULT NULL,
  `is_correct` tinyint(1) DEFAULT NULL,
  `xp_earned` int(11) NOT NULL DEFAULT 0,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_quests`
--

INSERT INTO `daily_quests` (`id`, `user_id`, `question_id`, `quest_date`, `user_answer`, `is_correct`, `xp_earned`, `completed`, `created_at`, `updated_at`) VALUES
(10, 8, 29, '2026-05-10', NULL, NULL, 0, 0, '2026-05-10 05:30:21', '2026-05-10 05:30:21'),
(16, 1, 11, '2026-05-10', NULL, NULL, 0, 0, '2026-05-10 05:31:15', '2026-05-10 05:31:15'),
(25, 1, 15, '2026-05-11', 'Pyt', 1, 5, 1, '2026-05-11 08:32:27', '2026-05-11 08:42:48'),
(28, 1, 26, '2026-05-11', 'import', 1, 5, 1, '2026-05-11 08:41:26', '2026-05-11 08:43:08'),
(29, 1, 5, '2026-05-11', 'print()', 1, 5, 1, '2026-05-11 08:41:26', '2026-05-11 08:43:21'),
(30, 1, 6, '2026-05-11', 'if else', 0, 0, 1, '2026-05-11 08:41:26', '2026-05-11 08:43:35'),
(31, 1, 23, '2026-05-11', '(0,\"a\"), (1,\"b\")', 1, 5, 1, '2026-05-11 08:41:26', '2026-05-11 08:44:22'),
(42, 2, 11, '2026-05-12', 'len()', 1, 10, 1, '2026-05-11 18:58:02', '2026-05-11 18:59:38'),
(43, 2, 1, '2026-05-12', 'nama = \"PyLearn\"', 1, 10, 1, '2026-05-11 18:58:02', '2026-05-11 19:03:29'),
(44, 2, 28, '2026-05-12', '#', 1, 10, 1, '2026-05-11 18:58:02', '2026-05-11 19:03:43'),
(45, 2, 21, '2026-05-12', 'None', 1, 10, 1, '2026-05-11 18:58:02', '2026-05-11 19:03:51'),
(46, 2, 22, '2026-05-12', '0,1,2,3,4', 1, 10, 1, '2026-05-11 18:58:02', '2026-05-11 19:03:56'),
(47, 1, 21, '2026-05-12', 'None', 1, 10, 1, '2026-05-11 19:08:26', '2026-05-11 19:08:34'),
(48, 1, 23, '2026-05-12', '0, 1', 0, 2, 1, '2026-05-11 19:08:26', '2026-05-11 19:09:01'),
(49, 1, 26, '2026-05-12', 'import', 1, 10, 1, '2026-05-11 19:08:26', '2026-05-11 19:09:09'),
(50, 1, 7, '2026-05-12', 'for', 1, 10, 1, '2026-05-11 19:08:26', '2026-05-11 19:09:17'),
(51, 1, 3, '2026-05-12', 'upper()', 1, 10, 1, '2026-05-11 19:08:26', '2026-05-11 19:09:22'),
(52, 2, 19, '2026-05-13', 'int()', 1, 10, 1, '2026-05-12 22:51:41', '2026-05-12 22:51:57'),
(53, 2, 21, '2026-05-13', 'None', 1, 10, 1, '2026-05-12 22:51:41', '2026-05-12 22:52:07'),
(54, 2, 15, '2026-05-13', 'Pyt', 1, 10, 1, '2026-05-12 22:51:41', '2026-05-12 23:03:04'),
(55, 2, 23, '2026-05-13', '(\"a\",0), (\"b\",1)', 0, 2, 1, '2026-05-12 22:51:41', '2026-05-12 23:09:26'),
(56, 2, 30, '2026-05-13', '5', 1, 10, 1, '2026-05-12 22:51:41', '2026-05-12 23:09:33'),
(57, 1, 11, '2026-05-14', NULL, NULL, 0, 0, '2026-05-13 20:12:12', '2026-05-13 20:12:12'),
(58, 1, 23, '2026-05-14', NULL, NULL, 0, 0, '2026-05-13 20:12:12', '2026-05-13 20:12:12'),
(59, 1, 14, '2026-05-14', NULL, NULL, 0, 0, '2026-05-13 20:12:12', '2026-05-13 20:12:12'),
(60, 1, 5, '2026-05-14', NULL, NULL, 0, 0, '2026-05-13 20:12:12', '2026-05-13 20:12:12'),
(61, 1, 10, '2026-05-14', NULL, NULL, 0, 0, '2026-05-13 20:12:12', '2026-05-13 20:12:12'),
(62, 1, 19, '2026-05-15', NULL, NULL, 0, 0, '2026-05-14 19:29:42', '2026-05-14 19:29:42'),
(63, 1, 10, '2026-05-15', NULL, NULL, 0, 0, '2026-05-14 19:29:42', '2026-05-14 19:29:42'),
(64, 1, 1, '2026-05-15', NULL, NULL, 0, 0, '2026-05-14 19:29:42', '2026-05-14 19:29:42'),
(65, 1, 4, '2026-05-15', NULL, NULL, 0, 0, '2026-05-14 19:29:42', '2026-05-14 19:29:42'),
(66, 1, 27, '2026-05-15', NULL, NULL, 0, 0, '2026-05-14 19:29:42', '2026-05-14 19:29:42'),
(67, 11, 7, '2026-05-15', NULL, NULL, 0, 0, '2026-05-15 05:09:07', '2026-05-15 05:09:07'),
(68, 11, 18, '2026-05-15', NULL, NULL, 0, 0, '2026-05-15 05:09:07', '2026-05-15 05:09:07'),
(69, 11, 8, '2026-05-15', NULL, NULL, 0, 0, '2026-05-15 05:09:07', '2026-05-15 05:09:07'),
(70, 11, 25, '2026-05-15', NULL, NULL, 0, 0, '2026-05-15 05:09:07', '2026-05-15 05:09:07'),
(71, 11, 22, '2026-05-15', NULL, NULL, 0, 0, '2026-05-15 05:09:07', '2026-05-15 05:09:07'),
(72, 2, 1, '2026-05-15', 'nama : \"PyLearn\"', 0, 2, 1, '2026-05-15 05:09:24', '2026-05-15 05:10:01'),
(73, 2, 14, '2026-05-15', '0', 1, 10, 1, '2026-05-15 05:09:24', '2026-05-15 05:10:08'),
(74, 2, 22, '2026-05-15', '0,1,2,3,4', 1, 10, 1, '2026-05-15 05:09:24', '2026-05-15 05:10:17'),
(75, 2, 30, '2026-05-15', '5', 1, 10, 1, '2026-05-15 05:09:24', '2026-05-15 05:10:21'),
(76, 2, 23, '2026-05-15', '0, 1', 0, 2, 1, '2026-05-15 05:09:24', '2026-05-15 05:10:30'),
(77, 1, 28, '2026-05-16', '#', 1, 10, 1, '2026-05-15 17:53:15', '2026-05-15 22:48:11'),
(78, 1, 29, '2026-05-16', 'class', 1, 10, 1, '2026-05-15 17:53:15', '2026-05-15 22:48:20'),
(79, 1, 22, '2026-05-16', '0,1,2,3,4', 1, 10, 1, '2026-05-15 17:53:15', '2026-05-15 22:48:25'),
(80, 1, 18, '2026-05-16', 'except', 1, 10, 1, '2026-05-15 17:53:15', '2026-05-15 22:48:34'),
(81, 1, 23, '2026-05-16', '0, 1', 0, 2, 1, '2026-05-15 17:53:15', '2026-05-15 22:48:43'),
(82, 2, 30, '2026-05-17', NULL, NULL, 0, 0, '2026-05-17 11:27:13', '2026-05-17 11:27:13'),
(83, 2, 14, '2026-05-17', NULL, NULL, 0, 0, '2026-05-17 11:27:13', '2026-05-17 11:27:13'),
(84, 2, 12, '2026-05-17', NULL, NULL, 0, 0, '2026-05-17 11:27:13', '2026-05-17 11:27:13'),
(85, 2, 22, '2026-05-17', NULL, NULL, 0, 0, '2026-05-17 11:27:13', '2026-05-17 11:27:13'),
(86, 2, 28, '2026-05-17', NULL, NULL, 0, 0, '2026-05-17 11:27:13', '2026-05-17 11:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `daily_quest_questions`
--

CREATE TABLE `daily_quest_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_text` text NOT NULL,
  `code_snippet` text DEFAULT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`options`)),
  `correct_answer` text NOT NULL,
  `explanation` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_quest_questions`
--

INSERT INTO `daily_quest_questions` (`id`, `question_text`, `code_snippet`, `options`, `correct_answer`, `explanation`, `created_at`, `updated_at`) VALUES
(1, 'Bagaimana cara membuat variabel \"nama\" dengan nilai \"PyLearn\" di Python?', NULL, '[\"nama = \\\"PyLearn\\\"\",\"var nama = \\\"PyLearn\\\"\",\"nama : \\\"PyLearn\\\"\",\"nama := \\\"PyLearn\\\"\"]', 'nama = \"PyLearn\"', 'Di Python, variabel dibuat dengan menulis nama = nilai tanpa keyword tambahan.', NULL, NULL),
(2, 'Bagaimana cara membuat list di Python?', NULL, '[\"[1, 2, 3]\",\"(1, 2, 3)\",\"{1, 2, 3}\",\"<1, 2, 3>\"]', '[1, 2, 3]', 'List di Python menggunakan kurung siku [].', NULL, NULL),
(3, 'Method apa untuk mengubah string menjadi huruf besar?', NULL, '[\"upper()\",\"toUpper()\",\"toUpperCase()\",\"uppercase()\"]', 'upper()', 'upper() mengubah string menjadi huruf besar semua.', NULL, NULL),
(4, 'Berapa hasil dari 10 // 3?', 'print(10 // 3)', '[\"3\",\"3.33\",\"3.0\",\"4\"]', '3', '// adalah floor division, membagi dan membulatkan ke bawah ke integer terdekat.', NULL, NULL),
(5, 'Fungsi apa untuk menampilkan output ke layar?', NULL, '[\"print()\",\"echo()\",\"display()\",\"write()\"]', 'print()', 'print() digunakan untuk menampilkan output di Python.', NULL, NULL),
(6, 'Keyword apa yang digunakan untuk kondisi \"else if\"?', NULL, '[\"elif\",\"else if\",\"elseif\",\"if else\"]', 'elif', 'elif adalah singkatan dari \"else if\" dalam Python.', NULL, NULL),
(7, 'Keyword apa yang digunakan untuk perulangan (loop)?', NULL, '[\"for\",\"foreach\",\"loop\",\"repeat\"]', 'for', 'for digunakan untuk iterasi di Python.', NULL, NULL),
(8, 'Loop yang berjalan selama kondisi bernilai True adalah...', NULL, '[\"while\",\"for\",\"do while\",\"until\"]', 'while', 'while menjalankan loop selama kondisi tetap bernilai true.', NULL, NULL),
(9, 'Keyword untuk membuat fungsi adalah...', NULL, '[\"def\",\"func\",\"function\",\"define\"]', 'def', 'def digunakan untuk mendefinisikan fungsi baru.', NULL, NULL),
(10, 'Method untuk menambah item ke akhir list adalah...', NULL, '[\"append()\",\"add()\",\"push()\",\"insert()\"]', 'append()', 'append() menambah item di akhir list.', NULL, NULL),
(11, 'Fungsi untuk menghitung jumlah elemen dalam list adalah...', NULL, '[\"len()\",\"count()\",\"size()\",\"length()\"]', 'len()', 'len() mengembalikan jumlah elemen atau panjang suatu objek.', NULL, NULL),
(12, 'Bagaimana cara mengakses nilai \"PyLearn\" dari data = {\"nama\": \"PyLearn\"}?', 'data = {\"nama\": \"PyLearn\"}', '[\"data[\\\"nama\\\"]\",\"data(nama)\",\"data.nama\",\"data->nama\"]', 'data[\"nama\"]', 'Akses dictionary menggunakan key di dalam kurung siku.', NULL, NULL),
(13, 'Operator apa untuk menggabungkan dua string?', NULL, '[\"+\",\"&\",\".\",\"concat\"]', '+', '+ digunakan untuk penggabungan string (concatenation).', NULL, NULL),
(14, 'Index karakter pertama dalam string \"Python\" adalah...', NULL, '[\"0\",\"1\",\"-1\",\"first\"]', '0', 'Index di Python selalu dimulai dari 0.', NULL, NULL),
(15, 'Apa hasil dari \"Python\"[:3]?', NULL, '[\"Pyt\",\"Pyth\",\"Py\",\"thon\"]', 'Pyt', '[:3] mengambil karakter dari index 0 sampai sebelum index 3.', NULL, NULL),
(16, 'Manakah contoh list comprehension yang benar?', NULL, '[\"[x*2 for x in range(5)]\",\"(x*2 for x in range(5))\",\"{x*2 for x in range(5)}\",\"x*2 for x in range(5)\"]', '[x*2 for x in range(5)]', 'List comprehension menggunakan kurung siku [].', NULL, NULL),
(17, 'Fungsi map() mengembalikan objek bertipe...', NULL, '[\"map object\",\"list\",\"tuple\",\"dictionary\"]', 'map object', 'map() mengembalikan iterator map object yang perlu dikonversi ke list/tuple.', NULL, NULL),
(18, 'Blok apa yang digunakan untuk menangkap exception?', NULL, '[\"except\",\"catch\",\"error\",\"handle\"]', 'except', 'Python menggunakan try...except untuk penanganan error.', NULL, NULL),
(19, 'Fungsi untuk konversi string \"42\" ke integer adalah...', NULL, '[\"int()\",\"integer()\",\"toInt()\",\"Number()\"]', 'int()', 'int() mengkonversi nilai ke tipe data integer.', NULL, NULL),
(20, 'Apa hasil dari bool([])?', 'print(bool([]))', '[\"False\",\"True\",\"None\",\"Error\"]', 'False', 'List kosong, string kosong, dan angka 0 bernilai False (falsy).', NULL, NULL),
(21, 'Nilai kosong di Python direpresentasikan oleh...', NULL, '[\"None\",\"null\",\"nil\",\"Empty\"]', 'None', 'None adalah keyword khusus untuk menyatakan ketiadaan nilai.', NULL, NULL),
(22, 'Berapa angka yang dihasilkan oleh range(5)?', NULL, '[\"0,1,2,3,4\",\"1,2,3,4,5\",\"0,1,2,3,4,5\",\"0,5\"]', '0,1,2,3,4', 'range(n) menghasilkan angka dari 0 sampai n-1.', NULL, NULL),
(23, 'enumerate([\"a\", \"b\"]) mengembalikan pasangan...', NULL, '[\"(0,\\\"a\\\"), (1,\\\"b\\\")\",\"(\\\"a\\\",0), (\\\"b\\\",1)\",\"0, 1\",\"\\\"a\\\", \\\"b\\\"\"]', '(0,\"a\"), (1,\"b\")', 'enumerate() mengembalikan tuple berisi (index, nilai).', NULL, NULL),
(24, 'zip([1,2], [3,4]) menghasilkan...', NULL, '[\"(1,3), (2,4)\",\"(1,2), (3,4)\",\"1,2,3,4\",\"Error\"]', '(1,3), (2,4)', 'zip() menggabungkan elemen-elemen dari beberapa iterable secara berpasangan.', NULL, NULL),
(25, 'Simbol untuk membuat set secara langsung adalah...', NULL, '[\"{}\",\"[]\",\"()\",\"<>\"]', '{}', 'Set menggunakan kurung kurawal, sama seperti dictionary tapi tanpa pasangan key-value.', NULL, NULL),
(26, 'Keyword untuk memuat modul eksternal adalah...', NULL, '[\"import\",\"include\",\"require\",\"use\"]', 'import', 'import digunakan untuk memuat fungsionalitas dari modul lain.', NULL, NULL),
(27, 'random.random() menghasilkan angka acak antara...', NULL, '[\"0 sampai 1\",\"1 sampai 10\",\"0 sampai 100\",\"-1 sampai 1\"]', '0 sampai 1', 'Fungsi random() menghasilkan float acak di rentang [0.0, 1.0).', NULL, NULL),
(28, 'Simbol untuk komentar satu baris di Python adalah...', NULL, '[\"#\",\"\\/\\/\",\"\\/*\",\"--\"]', '#', '# digunakan untuk komentar yang diabaikan oleh interpreter.', NULL, NULL),
(29, 'Keyword untuk mendefinisikan kelas adalah...', NULL, '[\"class\",\"struct\",\"object\",\"type\"]', 'class', 'class digunakan untuk membuat blueprint objek baru.', NULL, NULL),
(30, 'Apa hasil dari print(2 + 3)?', NULL, '[\"5\",\"23\",\"6\",\"Error\"]', '5', 'Penjumlahan sederhana antara dua integer.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaderboards`
--

CREATE TABLE `leaderboards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_score` int(11) NOT NULL,
  `rank` int(11) DEFAULT NULL,
  `period` enum('weekly','all_time') NOT NULL DEFAULT 'all_time',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaderboards`
--

INSERT INTO `leaderboards` (`id`, `user_id`, `total_score`, `rank`, `period`, `created_at`, `updated_at`) VALUES
(1, 1, 100, 1, 'all_time', '2026-05-09 16:19:05', '2026-05-09 16:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `order_number` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `description`, `order_number`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Dasar Python', 'Memahami dasar-dasar Python', 1, 1, NULL, NULL),
(2, 'Variabel & Tipe Data', 'Belajar tentang variabel dan tipe data', 2, 1, NULL, NULL),
(3, 'Operators', 'Menggunakan operator', 3, 1, NULL, NULL),
(4, 'Strings', 'Bermain dengan string', 4, 1, NULL, NULL),
(5, 'Lists', 'Belajar struktur data list', 5, 1, NULL, NULL),
(6, 'Tuples & Sets', 'Belajar Tuple dan Set', 6, 1, NULL, NULL),
(7, 'Dictionaries', 'Belajar struktur data dictionary', 7, 1, NULL, NULL),
(8, 'Conditional Statements', 'Percabangan If-Else', 8, 1, NULL, NULL),
(9, 'Loops', 'Perulangan For dan While', 9, 1, NULL, NULL),
(10, 'Functions', 'Membuat dan menggunakan fungsi', 10, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_05_04_045309_create_add_xp_to_users', 1),
(6, '2026_05_04_045413_create_levels', 1),
(7, '2026_05_04_045455_create_questions', 1),
(8, '2026_05_04_045511_create_badges', 1),
(9, '2026_05_04_045530_create_user_progress', 1),
(10, '2026_05_04_045552_create_user_answers', 1),
(11, '2026_05_04_045621_create_user_streaks', 1),
(12, '2026_05_04_045650_create_user_badges', 1),
(13, '2026_05_04_045714_create_leaderboard', 1),
(14, '2026_05_07_052529_add_xp_and_streak_to_user_answers', 1),
(15, '2026_05_07_053053_fix_questions_answer_type', 1),
(16, '2026_05_07_053644_add_login_streak_to_users', 1),
(17, '2026_05_08_010632_create_daily_quests_table', 1),
(18, '2026_05_08_012449_create_daily_quest_questions_table', 1),
(19, '2026_05_08_052228_add_indexes_to_quiz_tables', 1),
(20, '2026_05_09_230118_add_indexes_to_tables', 1),
(21, '2026_05_09_232949_fix_user_badges_earned_at', 2),
(22, '2026_05_10_053014_add_options_to_daily_quest_questions_table', 3),
(23, '2026_05_10_060937_change_condition_to_string_in_badges_table', 4),
(24, '2026_05_11_223600_remove_unique_constraint_from_daily_quests', 5),
(25, '2026_05_15_022132_add_role_to_users_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(50) NOT NULL,
  `answer_type` varchar(20) NOT NULL,
  `question_text` text NOT NULL,
  `code_snippet` text DEFAULT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`options`)),
  `correct_answer` text NOT NULL,
  `explanation` text DEFAULT NULL,
  `test_cases` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`test_cases`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `level_id`, `type`, `answer_type`, `question_text`, `code_snippet`, `options`, `correct_answer`, `explanation`, `test_cases`, `created_at`, `updated_at`) VALUES
(1, 1, 'coding', 'mcq', 'Apa output dari	print(\"Hello World\")?', NULL, '[\"Hello World\",\"Hello\",\"World\",\"Error\"]', 'Hello World', 'print() digunakan untuk menampilkan teks ke layar', NULL, NULL, NULL),
(2, 1, 'coding', 'mcq', 'Manakah cara yang benar untuk membuat komentar single-line di Python?', NULL, '[\"# komentar\",\"\\/\\/ komentar\",\"<!-- komentar\",\"-- komentar\"]', '# komentar', '# digunakan untuk komentar single-line di Python', NULL, NULL, NULL),
(3, 1, 'coding', 'mcq', 'Apa fungsi dari keyword \"def\" di Python?', NULL, '[\"Mendefinisikan fungsi\",\"Menghapus variabel\",\"Mengimport modul\",\"Mendeklarasikan class\"]', 'Mendefinisikan fungsi', 'def digunakan untuk mendefinisikan fungsi baru', NULL, NULL, NULL),
(4, 1, 'coding', 'mcq', 'Bagaimana cara menjalankan script Python?', NULL, '[\"python file.py\",\"run file.py\",\"execute file.py\",\"start file.py\"]', 'python file.py', 'Gunakan command \"python\" diikuti nama file', NULL, NULL, NULL),
(5, 1, 'coding', 'mcq', 'Ekstensi file Python adalah...', NULL, '[\".py\",\".python\",\".pyt\",\".pt\"]', '.py', 'File Python menggunakan ekstensi .py', NULL, NULL, NULL),
(6, 1, 'coding', 'mcq', 'Apa output dari	print(2 + 3)?', NULL, '[\"5\",\"23\",\"2+3\",\"6\"]', '5', '2 + 3 = 5', NULL, NULL, NULL),
(7, 1, 'coding', 'mcq', 'Manakah bukan keyword di Python?', NULL, '[\"if\",\"for\",\"loop\",\"while\"]', 'loop', 'loop bukan keyword Python, tapi if, for, dan while adalah keyword', NULL, NULL, NULL),
(8, 1, 'coding', 'mcq', 'Apa fungsi dari keyword \"return\" dalam fungsi?', NULL, '[\"Mengembalikan nilai\",\"Menghapus fungsi\",\"Memanggil fungsi\",\"Mendefinisikan fungsi\"]', 'Mengembalikan nilai', 'return digunakan untuk mengembalikan nilai dari fungsi', NULL, NULL, NULL),
(9, 1, 'coding', 'mcq', 'Python dikembangkan oleh...', NULL, '[\"Guido van Rossum\",\"James Gosling\",\"Bjarne Stroustrup\",\"Dennis Ritchie\"]', 'Guido van Rossum', 'Python diciptakan oleh Guido van Rossum', NULL, NULL, NULL),
(10, 1, 'coding', 'mcq', 'Apa itu Python?', NULL, '[\"Bahasa pemrograman\",\"Ular\",\"Game\",\"Sistem operasi\"]', 'Bahasa pemrograman', 'Python adalah bahasa pemrograman', NULL, NULL, NULL),
(11, 2, 'coding', 'mcq', 'Bagaimana cara mendeklarasikan variabel di Python?', NULL, '[\"x = 5\",\"var x = 5\",\"int x = 5\",\"let x = 5\"]', 'x = 5', 'Python tidak perlu keyword var, langsung nama = nilai', NULL, NULL, NULL),
(12, 2, 'coding', 'mcq', 'Tipe data apa untuk \"Hello\"?', NULL, '[\"str\",\"int\",\"float\",\"bool\"]', 'str', 'String adalah tipe data untuk teks', NULL, NULL, NULL),
(13, 2, 'coding', 'mcq', 'Tipe data apa untuk angka desimal?', NULL, '[\"float\",\"int\",\"double\",\"decimal\"]', 'float', 'Float untuk angka desimal', NULL, NULL, NULL),
(14, 2, 'coding', 'mcq', 'Apa hasil type(10)?', NULL, '[\"<class \'int\'>\",\"<class \'str\'>\",\"<class \'float\'>\",\"<class \'bool\'>\"]', '<class \'int\'>', '10 adalah integer', NULL, NULL, NULL),
(15, 2, 'coding', 'mcq', 'Bagaimana membuat boolean True?', NULL, '[\"True\",\"true\",\"TRUE\",\"T\"]', 'True', 'Boolean True dengan T besar di Python', NULL, NULL, NULL),
(16, 2, 'coding', 'mcq', 'Apa tipe data dari [1, 2, 3]?', NULL, '[\"list\",\"array\",\"tuple\",\"set\"]', 'list', '[1, 2, 3] adalah list', NULL, NULL, NULL),
(17, 2, 'coding', 'mcq', 'Apa fungsi dari type()?', NULL, '[\"Mengecek tipe data\",\"Mengubah tipe data\",\"Menghapus tipe data\",\"Membuat tipe data\"]', 'Mengecek tipe data', 'type() mengembalikan tipe data', NULL, NULL, NULL),
(18, 2, 'coding', 'mcq', 'Dict di Python menggunakan...', NULL, '[\"{}\",\"[]\",\"()\",\"<>\"]', '{}', 'Dict menggunakan kurung kurawal', NULL, NULL, NULL),
(19, 2, 'coding', 'mcq', 'Apa output dari	type(3.14)?', NULL, '[\"<class \'float\'>\",\"<class \'int\'>\",\"<class \'str\'>\",\"<class \'double\'>\"]', '<class \'float\'>', '3.14 adalah float', NULL, NULL, NULL),
(20, 2, 'coding', 'mcq', 'Tipe data None表示...', NULL, '[\"Kosong\",\"Angka 0\",\"False\",\"Error\"]', 'Kosong', 'None berarti kosong/nilai tidak ada', NULL, NULL, NULL),
(21, 3, 'coding', 'mcq', 'Apa hasil 10 + 5?', NULL, '[15,\"15\",105,\"105\"]', '15', 'Penjumlahan: 10 + 5 = 15', NULL, NULL, NULL),
(22, 3, 'coding', 'mcq', 'Apa hasil 10 - 3?', NULL, '[7,13,-7,30]', '7', 'Pengurangan: 10 - 3 = 7', NULL, NULL, NULL),
(23, 3, 'coding', 'mcq', 'Apa hasil 4 * 3?', NULL, '[12,43,7,6]', '12', 'Perkalian: 4 * 3 = 12', NULL, NULL, NULL),
(24, 3, 'coding', 'mcq', 'Apa hasil 10 / 2?', NULL, '[5,2,5,20]', '5.0', 'Pembagian: 10 / 2 = 5.0', NULL, NULL, NULL),
(25, 3, 'coding', 'mcq', 'Apa hasil 10 // 3?', NULL, '[3,3.333,7,2]', '3', 'Floor division: 10 // 3 = 3', NULL, NULL, NULL),
(26, 3, 'coding', 'mcq', 'Apa hasil 10 % 3?', NULL, '[1,3,7,0]', '1', 'Modulus: 10 % 3 = 1', NULL, NULL, NULL),
(27, 3, 'coding', 'mcq', 'Apa hasil 2 ** 3?', NULL, '[8,6,5,9]', '8', 'Pangkat: 2 ** 3 = 8', NULL, NULL, NULL),
(28, 3, 'coding', 'mcq', 'Manakah operator perbandingan?', NULL, '[\"==\",\"=\",\":=\",\"=>\"]', '==', '== adalah operator sama dengan', NULL, NULL, NULL),
(29, 3, 'coding', 'mcq', 'Apa hasil 5 > 3?', NULL, '[\"True\",\"False\",\"5\",\"3\"]', 'True', '5 lebih besar dari 3', NULL, NULL, NULL),
(30, 3, 'coding', 'mcq', 'Apa hasil 3 == 3?', NULL, '[\"True\",\"False\",\"3\",\"0\"]', 'True', '3 sama dengan 3', NULL, NULL, NULL),
(31, 4, 'coding', 'mcq', 'Bagaimana membuat string di Python?', NULL, '[\"\'text\'\",\"\\\"text\\\"\",\"Semua benar\",\"String\"]', 'Semua benar', 'Bisa pakai \" atau \"', NULL, NULL, NULL),
(32, 4, 'coding', 'mcq', 'Apa method untuk uppercase?', NULL, '[\"upper()\",\"uppercase()\",\"toUpper()\",\"UP()\"]', 'upper()', 'upper() untuk huruf besar', NULL, NULL, NULL),
(33, 4, 'coding', 'mcq', 'Apa method untuk lowercase?', NULL, '[\"lower()\",\"lowercase()\",\"toLower()\",\"LO()\"]', 'lower()', 'lower() untuk huruf kecil', NULL, NULL, NULL),
(34, 4, 'coding', 'mcq', 'Apa len(\"Python\")?', NULL, '[6,7,5,8]', '6', 'Python punya 6 karakter', NULL, NULL, NULL),
(35, 4, 'coding', 'mcq', 'Bagaimana mengambil karakter pertama?', NULL, '[\"s[0]\",\"s[1]\",\"s.first()\",\"s.get(0)\"]', 's[0]', 'Index dimulai dari 0', NULL, NULL, NULL),
(36, 4, 'coding', 'mcq', 'Apa method untuk menghitung karakter?', NULL, '[\"count()\",\"len()\",\"find()\",\"index()\"]', 'count()', 'count() menghitung karakter', NULL, NULL, NULL),
(37, 4, 'coding', 'mcq', 'Apa \"Py\" + \"thon\"?', NULL, '[\"Python\",\"Pyth on\",\"Pyton\",\"Python \"]', 'Python', 'String dapat digabungkan', NULL, NULL, NULL),
(38, 4, 'coding', 'mcq', 'Apa method replace?', NULL, '[\"replace()\",\"change()\",\"switch()\",\"sub()\"]', 'replace()', 'replace() mengganti karakter', NULL, NULL, NULL),
(39, 4, 'coding', 'mcq', 'Apa method split?', NULL, '[\"split()\",\"divide()\",\"separate()\",\"cut()\"]', 'split()', 'split() memecah string', NULL, NULL, NULL),
(40, 4, 'coding', 'mcq', 'Apa.strip()?', NULL, '[\"Hapus spasi\",\"Tambah spasi\",\"Ubah spasi\",\"Hitung spasi\"]', 'Hapus spasi', 'strip() hapus spasi awal/akhir', NULL, NULL, NULL),
(41, 5, 'coding', 'mcq', 'Bagaimana membuat list?', NULL, '[\"[1, 2, 3]\",\"(1, 2, 3)\",\"{1, 2, 3}\",\"<1, 2, 3>\"]', '[1, 2, 3]', 'List menggunakan []', NULL, NULL, NULL),
(42, 5, 'coding', 'mcq', 'Bagaimana menambah item ke list?', NULL, '[\"append()\",\"add()\",\"insert()\",\"push()\"]', 'append()', 'append() menambah di akhir', NULL, NULL, NULL),
(43, 5, 'coding', 'mcq', 'Apa len([1,2,3])?', NULL, '[3,2,4,1]', '3', 'List punya 3 elemen', NULL, NULL, NULL),
(44, 5, 'coding', 'mcq', 'Bagaimana akses elemen pertama?', NULL, '[\"list[0]\",\"list[1]\",\"list.first()\",\"list[1]\"]', 'list[0]', 'Index mulai dari 0', NULL, NULL, NULL),
(45, 5, 'coding', 'mcq', 'Method hapus item?', NULL, '[\"remove()\",\"delete()\",\"erase()\",\"drop()\"]', 'remove()', 'remove() hapus berdasarkan nilai', NULL, NULL, NULL),
(46, 5, 'coding', 'mcq', 'Apa.pop()?', NULL, '[\"Hapus akhir\",\"Hapus awal\",\"Tambah akhir\",\"Urutkan\"]', 'Hapus akhir', 'pop() hapus elemen terakhir', NULL, NULL, NULL),
(47, 5, 'coding', 'mcq', 'Apa.sort()?', NULL, '[\"Urutkan\",\"Balik\",\"acak\",\"hapus\"]', 'Urutkan', 'sort() mengurutkan list', NULL, NULL, NULL),
(48, 5, 'coding', 'mcq', 'Method gabung list?', NULL, '[\"extend()\",\"concat()\",\"merge()\",\"join()\"]', 'extend()', 'extend() gabung list', NULL, NULL, NULL),
(49, 5, 'coding', 'mcq', 'Apa.reverse()?', NULL, '[\"Balik urutan\",\"Hapus\",\"Urutkan\",\"acak\"]', 'Balik urutan', 'reverse() balik urutan', NULL, NULL, NULL),
(50, 5, 'coding', 'mcq', 'Apa in untuk list?', NULL, '[\"Cek anggota\",\"Input\",\"Index\",\"Insert\"]', 'Cek anggota', 'in cek apakah ada dalam list', NULL, NULL, NULL),
(51, 6, 'coding', 'mcq', 'Bagaimana membuat tuple?', NULL, '[\"(1, 2, 3)\",\"[1, 2, 3]\",\"{1, 2, 3}\",\"<1, 2, 3>\"]', '(1, 2, 3)', 'Tuple menggunakan ()', NULL, NULL, NULL),
(52, 6, 'coding', 'mcq', 'Apa karakteristik tuple?', NULL, '[\"Tidak bisa diubah\",\"Bisa diubah\",\"Hanya angka\",\"Hanya string\"]', 'Tidak bisa diubah', 'Tuple bersifat immutable (tidak bisa diubah)', NULL, NULL, NULL),
(53, 6, 'coding', 'mcq', 'Apa hasil len((1,2,3,4))?', NULL, '[4,3,5,2]', '4', 'Tuple punya 4 elemen', NULL, NULL, NULL),
(54, 6, 'coding', 'mcq', 'Bagaimana membuat set?', NULL, '[\"{1, 2, 3}\",\"[1, 2, 3]\",\"(1, 2, 3)\",\"<1, 2, 3>\"]', '{1, 2, 3}', 'Set menggunakan {}', NULL, NULL, NULL),
(55, 6, 'coding', 'mcq', 'Apa itu duplicate dalam set?', NULL, '[\"Dihapus otomatis\",\"Diizinkan\",\"Error\",\"Ditandai\"]', 'Dihapus otomatis', 'Set tidak mengizinkan duplikat', NULL, NULL, NULL),
(56, 6, 'coding', 'mcq', 'Method untuk tambah ke set?', NULL, '[\"add()\",\"append()\",\"insert()\",\"push()\"]', 'add()', 'add() menambah elemen ke set', NULL, NULL, NULL),
(57, 6, 'coding', 'mcq', 'Method hapus dari set?', NULL, '[\"remove()\",\"delete()\",\"pop()\",\"erase()\"]', 'remove()', 'remove() hapus elemen dari set', NULL, NULL, NULL),
(58, 6, 'coding', 'mcq', 'Apa perbedaan tuple dan list?', NULL, '[\"Tuple tidak bisa diubah\",\"Tuple hanya satu elemen\",\"List lebih cepat\",\"Tidak ada bedanya\"]', 'Tuple tidak bisa diubah', 'Tuple immutable, list mutable', NULL, NULL, NULL),
(59, 6, 'coding', 'mcq', 'Apa hasil (1,) + (2,)?', NULL, '[\"(1, 2)\",\"(1, 2,)\",\"Error\",\"[1, 2]\"]', '(1, 2)', 'Tuple dapat digabungkan', NULL, NULL, NULL),
(60, 6, 'coding', 'mcq', 'Apa itu set operations?', NULL, '[\"union, intersection\",\"add, remove\",\"sort, reverse\",\"push, pop\"]', 'union, intersection', 'Set mendukung union dan intersection', NULL, NULL, NULL),
(61, 7, 'coding', 'mcq', 'Bagaimana membuat dictionary?', NULL, '[\"{\'a\': 1}\",\"[a:1]\",\"(a:1)\",\"<a:1>\"]', '{\'a\': 1}', 'Dict menggunakan {key: value}', NULL, NULL, NULL),
(62, 7, 'coding', 'mcq', 'Bagaimana akses nilai dict?', NULL, '[\"dict[\\\"key\\\"]\",\"dict.key\",\"dict->key\",\"dict(key)\"]', 'dict[\"key\"]', 'Gunakan [key] untuk akses', NULL, NULL, NULL),
(63, 7, 'coding', 'mcq', 'Apa method dapat semua keys?', NULL, '[\"keys()\",\"getkeys()\",\"allkeys()\",\"listkeys()\"]', 'keys()', 'keys() mengembalikan semua key', NULL, NULL, NULL),
(64, 7, 'coding', 'mcq', 'Apa method dapat semua values?', NULL, '[\"values()\",\"getvalues()\",\"allvalues()\",\"listvalues()\"]', 'values()', 'values() mengembalikan semua value', NULL, NULL, NULL),
(65, 7, 'coding', 'mcq', 'Bagaimana tambah data ke dict?', NULL, '[\"dict[\\\"key\\\"] = value\",\"dict.add(key, value)\",\"dict.push(key, value)\",\"dict.insert(key, value)\"]', 'dict[\"key\"] = value', 'Assign key-value untuk tambah', NULL, NULL, NULL),
(66, 7, 'coding', 'mcq', 'Method hapus item dict?', NULL, '[\"pop()\",\"remove()\",\"delete()\",\"erase()\"]', 'pop()', 'pop() hapus berdasarkan key', NULL, NULL, NULL),
(67, 7, 'coding', 'mcq', 'Apa items() return?', NULL, '[\"Key-value pairs\",\"Hanya keys\",\"Hanya values\",\"Jumlah item\"]', 'Key-value pairs', 'items() mengembalikan tuple key-value', NULL, NULL, NULL),
(68, 7, 'coding', 'mcq', 'Apa hasil len({\"a\":1, \"b\":2})?', NULL, '[2,1,3,4]', '2', 'Dict punya 2 key-value', NULL, NULL, NULL),
(69, 7, 'coding', 'mcq', 'Apa get() dalam dict?', NULL, '[\"Ambil nilai aman\",\"Hapus nilai\",\"Tambah nilai\",\"Update nilai\"]', 'Ambil nilai aman', 'get() ambil nilai, return None jika tidak ada', NULL, NULL, NULL),
(70, 7, 'coding', 'mcq', 'Dict bisa nested?', NULL, '[\"Ya\",\"Tidak\",\"Hanya 1 level\",\"Maksimal 2 level\"]', 'Ya', 'Dict dapat berisi dict lain (nested)', NULL, NULL, NULL),
(71, 8, 'coding', 'mcq', 'Keyword untuk if statement?', NULL, '[\"if\",\"elif\",\"else\",\"then\"]', 'if', 'if untuk conditional awal', NULL, NULL, NULL),
(72, 8, 'coding', 'mcq', 'Keyword untuk kondisi lain?', NULL, '[\"elif\",\"elseif\",\"ifelse\",\"otherwise\"]', 'elif', 'elif untuk kondisi tambahan', NULL, NULL, NULL),
(73, 8, 'coding', 'mcq', 'Keyword untuk fallback?', NULL, '[\"else\",\"if\",\"elif\",\"switch\"]', 'else', 'else sebagai fallback condition', NULL, NULL, NULL),
(74, 8, 'coding', 'mcq', 'Apa hasil: if True: print(\"A\") else: print(\"B\")?', NULL, '[\"A\",\"B\",\"Error\",\"A B\"]', 'A', 'Kondisi True menjalankan blok if', NULL, NULL, NULL),
(75, 8, 'coding', 'mcq', 'Apa elif kependekan dari?', NULL, '[\"Else if\",\"Else ifs\",\"Extended if\",\"End if\"]', 'Else if', 'elif = else if', NULL, NULL, NULL),
(76, 8, 'coding', 'mcq', 'Operator logika AND?', NULL, '[\"and\",\"&&\",\" & \",\" dan \"]', 'and', 'and untuk logika AND di Python', NULL, NULL, NULL),
(77, 8, 'coding', 'mcq', 'Operator logika OR?', NULL, '[\"or\",\"||\",\" | \",\" atau \"]', 'or', 'or untuk logika OR di Python', NULL, NULL, NULL),
(78, 8, 'coding', 'mcq', 'Operator negasi?', NULL, '[\"not\",\"!\",\"no\",\"~\"]', 'not', 'not untuk negasi boolean', NULL, NULL, NULL),
(79, 8, 'coding', 'mcq', 'Apa hasil: 5 > 3 and 2 < 1?', NULL, '[\"False\",\"True\",\"Error\",\"5\"]', 'False', 'False and True = False', NULL, NULL, NULL),
(80, 8, 'coding', 'mcq', 'Tentang pass statement?', NULL, '[\"Tidak lakukan apa-apa\",\"Lewati iterasi\",\"Hentikan loop\",\"Lanjutkan\"]', 'Tidak lakukan apa-apa', 'pass adalah placeholder kosong', NULL, NULL, NULL),
(81, 9, 'coding', 'mcq', 'Keyword untuk loop for?', NULL, '[\"for\",\"while\",\"loop\",\"repeat\"]', 'for', 'for untuk perulangan', NULL, NULL, NULL),
(82, 9, 'coding', 'mcq', 'Keyword untuk loop while?', NULL, '[\"while\",\"for\",\"loop\",\"do\"]', 'while', 'while untuk perulangan kondisional', NULL, NULL, NULL),
(83, 9, 'coding', 'mcq', 'Apa range(5) menghasilkan?', NULL, '[0,1,2,3,4,1,2,3,4,5,0,1,2,3,1,2,3,4]', '0,1,2,3,4', 'range(5) = 0 sampai 4', NULL, NULL, NULL),
(84, 9, 'coding', 'mcq', 'Apa range(1,5) menghasilkan?', NULL, '[1,2,3,4,0,1,2,3,4,1,2,3,4,5,0,1,2,3]', '1,2,3,4', 'range(1,5) = 1 sampai 4', NULL, NULL, NULL),
(85, 9, 'coding', 'mcq', 'Keyword break untuk?', NULL, '[\"Hentikan loop\",\"Lewati iterasi\",\"Lanjut ke else\",\"Restart loop\"]', 'Hentikan loop', 'break keluar dari loop', NULL, NULL, NULL),
(86, 9, 'coding', 'mcq', 'Keyword continue untuk?', NULL, '[\"Lewati iterasi\",\"Hentikan loop\",\"Restart\",\"Exit\"]', 'Lewati iterasi', 'continue skip ke iterasi berikutnya', NULL, NULL, NULL),
(87, 9, 'coding', 'mcq', 'for i in [1,2,3]: print(i)?', NULL, '[\"1 2 3\",\"0 1 2\",\"1 2 3 4\",\"Error\"]', '1 2 3', 'Iterasi semua elemen list', NULL, NULL, NULL),
(88, 9, 'coding', 'mcq', 'while True tanpa break?', NULL, '[\"Infinite loop\",\"Error\",\"Tidak dijalankan\",\"Langsung berhenti\"]', 'Infinite loop', 'while True tanpa exit infinite loop', NULL, NULL, NULL),
(89, 9, 'coding', 'mcq', 'for i in range(0,10,2)?', NULL, '[0,2,4,6,8,0,1,2,3,4,1,3,5,7,9,2,4,6,8,10]', '0,2,4,6,8', 'range(start, stop, step)', NULL, NULL, NULL),
(90, 9, 'coding', 'mcq', 'Apa else setelah for?', NULL, '[\"Jalankan setelah selesai\",\"Jalankan jika break\",\"Tidak pernah\",\"Salah satu\"]', 'Jalankan setelah selesai', 'for-else jalan saat loop selesai tanpa break', NULL, NULL, NULL),
(91, 10, 'coding', 'mcq', 'Keyword untuk buat fungsi?', NULL, '[\"def\",\"function\",\"func\",\"define\"]', 'def', 'def untuk mendefinisikan fungsi', NULL, NULL, NULL),
(92, 10, 'coding', 'mcq', 'Cara panggil fungsi?', NULL, '[\"function()\",\"call function\",\"run function\",\"execute function\"]', 'function()', 'Gunakan nama() untuk memanggil', NULL, NULL, NULL),
(93, 10, 'coding', 'mcq', 'Parameter fungsi?', NULL, '[\"Input ke fungsi\",\"Output fungsi\",\"Nama fungsi\",\"Jenis fungsi\"]', 'Input ke fungsi', 'Parameter adalah input ke fungsi', NULL, NULL, NULL),
(94, 10, 'coding', 'mcq', 'Return untuk?', NULL, '[\"Kembalikan nilai\",\"Hapus fungsi\",\"Panggil fungsi\",\"Definisikan fungsi\"]', 'Kembalikan nilai', 'return mengembalikan output', NULL, NULL, NULL),
(95, 10, 'coding', 'mcq', 'Apa tanpa return?', NULL, '[\"Return None\",\"Error\",\"Return 0\",\"Return False\"]', 'Return None', 'Fungsi tanpa return mengembalikan None', NULL, NULL, NULL),
(96, 10, 'coding', 'mcq', 'Default parameter?', NULL, '[\"Nilai default jika tidak input\",\"Param wajib\",\"Jenis return\",\"Nama lain\"]', 'Nilai default jika tidak input', 'Default digunakan jika argumen tidak diberikan', NULL, NULL, NULL),
(97, 10, 'coding', 'mcq', '*args untuk?', NULL, '[\"Argument tidak terbatas\",\"Wajib 1 argumen\",\"Tidak ada argumen\",\"Argumen opsional\"]', 'Argument tidak terbatas', '*args terima banyak argumen', NULL, NULL, NULL),
(98, 10, 'coding', 'mcq', '**kwargs untuk?', NULL, '[\"Keyword arguments\",\"Angka\",\"Wajib\",\"Batas\"]', 'Keyword arguments', '**kwargs terima keyword args', NULL, NULL, NULL),
(99, 10, 'coding', 'mcq', 'Scope variabel lokal?', NULL, '[\"Hanya dalam fungsi\",\"Seluruh file\",\"Module lain\",\"Global\"]', 'Hanya dalam fungsi', 'Variabel lokal hanya di dalam fungsi', NULL, NULL, NULL),
(100, 10, 'coding', 'mcq', 'Global keyword?', NULL, '[\"Akses variabel global\",\"Buat fungsi global\",\"Export fungsi\",\"Import modul\"]', 'Akses variabel global', 'global untuk ubah variabel di luar fungsi', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `xp` int(11) NOT NULL DEFAULT 0,
  `login_streak` int(11) NOT NULL DEFAULT 0,
  `last_login_date` date DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `xp`, `login_streak`, `last_login_date`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'user@test.com', 'user', NULL, '$2y$12$JPDyXggeb1fJz0ZMS.nPa.D7tyomvXH6xpIY5SeX5ACVcMleDmuVe', 2369, 3, '2026-05-16', NULL, '2026-05-09 16:19:04', '2026-05-15 22:48:43'),
(2, 'Mohammad Afif Nashiruddin', 'nashiruddinafif84@gmail.com', 'user', NULL, '$2y$12$4t7dsn7LsWfqZ3s78NcagOQXsjnGBMKb8zVZJpjn5diuPPbH8iVEi', 2066, 1, '2026-05-17', NULL, '2026-05-09 16:22:59', '2026-05-17 11:27:42'),
(6, 'Alif Basyir', 'alifbasyir@gmail.com', 'user', NULL, '$2y$12$2GEoOjoRvoLN3eU3/1H9ZOhJk8y8rYWgy6JmnBh86aqnWM9aQduT6', 235, 0, NULL, NULL, '2026-05-10 04:47:42', '2026-05-10 04:56:23'),
(7, 'Adib Amiruddin', 'adibamiruddin@gmail.com', 'user', NULL, '$2y$12$45KU4WDXSkzzPjAcuMVhhOicdBK0Njzgp70yzXcc/OO9YRv8zlEqi', 0, 0, NULL, NULL, '2026-05-10 05:10:24', '2026-05-10 05:10:24'),
(8, 'Kevin Satria', 'kevinsatria@gmail.com', 'user', NULL, '$2y$12$8L0cTfGSLEjvwbR2f4hbue4LemiAF1lzS0ECSaoLoOuSY42wOE75e', 65, 0, NULL, NULL, '2026-05-10 05:18:59', '2026-05-10 05:20:19'),
(11, 'Admin', 'admin@pylearn.com', 'admin', NULL, '$2y$12$ld0juRayxLr8n8kDK0wtGOTlXC4KQUZucdFheObRPLGT1efdk6GcS', 0, 1, '2026-05-17', NULL, '2026-05-14 19:37:52', '2026-05-17 11:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `user_answer` text NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `xp_earned` int(11) NOT NULL DEFAULT 0,
  `streak` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`id`, `user_id`, `question_id`, `user_answer`, `is_correct`, `score`, `xp_earned`, `streak`, `created_at`) VALUES
(1, 1, 1, 'Hello World', 1, 20, 20, 1, '2026-05-09 16:19:05'),
(2, 1, 2, '# komentar', 1, 20, 20, 1, '2026-05-09 16:19:05'),
(3, 1, 3, 'Mendefinisikan fungsi', 1, 20, 20, 1, '2026-05-09 16:19:05'),
(4, 1, 4, 'python file.py', 1, 20, 20, 1, '2026-05-09 23:36:19'),
(5, 1, 5, '.py', 1, 20, 20, 1, '2026-05-09 23:36:53'),
(6, 1, 6, '5', 1, 20, 20, 1, '2026-05-09 23:37:13'),
(7, 1, 7, 'loop', 1, 20, 20, 1, '2026-05-09 23:37:37'),
(8, 1, 8, 'Mengembalikan nilai', 1, 20, 20, 1, '2026-05-09 23:38:27'),
(9, 1, 9, 'Guido van Rossum', 1, 20, 20, 1, '2026-05-09 23:38:43'),
(10, 1, 10, 'Bahasa pemrograman', 1, 20, 20, 1, '2026-05-09 23:38:56'),
(11, 2, 1, 'Hello World', 1, 20, 25, 5, '2026-05-10 05:51:57'),
(12, 2, 2, '# komentar', 1, 20, 25, 5, '2026-05-10 05:52:05'),
(13, 2, 3, 'Mendefinisikan fungsi', 1, 20, 25, 5, '2026-05-10 05:52:18'),
(14, 2, 4, 'python file.py', 1, 20, 25, 4, '2026-05-10 05:52:31'),
(15, 2, 5, '.py', 1, 20, 25, 5, '2026-05-10 05:52:41'),
(16, 2, 6, '5', 1, 20, 25, 6, '2026-05-10 05:52:58'),
(17, 2, 7, 'loop', 1, 20, 25, 7, '2026-05-10 05:53:07'),
(18, 2, 8, 'Mengembalikan nilai', 1, 20, 25, 8, '2026-05-10 05:53:19'),
(19, 2, 9, 'Guido van Rossum', 1, 20, 25, 9, '2026-05-10 05:53:27'),
(20, 2, 10, 'Bahasa pemrograman', 1, 20, 25, 10, '2026-05-10 05:53:34'),
(21, 2, 11, 'x = 5', 1, 20, 20, 3, '2026-05-10 05:53:50'),
(22, 2, 12, 'str', 1, 20, 20, 3, '2026-05-10 05:54:01'),
(23, 2, 13, 'float', 1, 20, 20, 3, '2026-05-10 05:54:11'),
(24, 2, 14, '<class \'int\'>', 1, 20, 20, 3, '2026-05-10 05:54:21'),
(25, 2, 15, 'True', 1, 20, 20, 3, '2026-05-10 05:54:32'),
(26, 2, 16, 'list', 1, 20, 20, 3, '2026-05-10 05:54:44'),
(27, 2, 17, 'Mengecek tipe data', 1, 20, 20, 3, '2026-05-10 05:54:56'),
(28, 2, 18, '{}', 1, 20, 20, 3, '2026-05-10 05:55:10'),
(29, 2, 19, '<class \'float\'>', 1, 20, 20, 3, '2026-05-10 05:55:18'),
(30, 2, 20, 'Kosong', 1, 20, 20, 3, '2026-05-10 05:55:28'),
(31, 2, 21, '15', 1, 20, 20, 3, '2026-05-10 05:55:39'),
(32, 2, 22, '7', 1, 20, 20, 3, '2026-05-10 05:55:49'),
(33, 2, 23, '12', 1, 20, 20, 3, '2026-05-10 05:55:55'),
(34, 2, 24, '5', 1, 20, 20, 3, '2026-05-10 05:56:02'),
(35, 2, 25, '3', 1, 20, 20, 3, '2026-05-10 05:56:12'),
(36, 2, 26, '1', 1, 20, 20, 3, '2026-05-10 05:56:22'),
(37, 2, 27, '8', 1, 20, 20, 3, '2026-05-10 05:56:43'),
(38, 2, 28, '==', 1, 20, 20, 3, '2026-05-10 05:56:59'),
(39, 2, 29, 'True', 1, 20, 20, 3, '2026-05-10 05:57:07'),
(40, 2, 30, 'True', 1, 20, 20, 3, '2026-05-10 05:57:16'),
(41, 2, 31, 'Semua benar', 1, 20, 20, 3, '2026-05-10 05:57:36'),
(42, 2, 32, 'upper()', 1, 20, 20, 3, '2026-05-10 05:57:47'),
(43, 2, 33, 'lower()', 1, 20, 20, 3, '2026-05-10 05:57:56'),
(44, 2, 34, '6', 1, 20, 20, 3, '2026-05-10 05:58:07'),
(45, 2, 35, 's[0]', 1, 20, 20, 3, '2026-05-10 05:58:35'),
(46, 2, 36, 'count()', 1, 20, 20, 3, '2026-05-10 05:58:44'),
(47, 2, 37, 'Python', 1, 20, 20, 3, '2026-05-10 05:58:59'),
(48, 2, 38, 'replace()', 1, 20, 20, 3, '2026-05-10 05:59:08'),
(49, 2, 39, 'split()', 1, 20, 20, 3, '2026-05-10 05:59:16'),
(50, 2, 40, 'Hapus spasi', 1, 20, 20, 3, '2026-05-10 05:59:27'),
(51, 2, 41, 'def', 1, 20, 25, 5, '2026-05-10 05:59:42'),
(52, 2, 42, 'append()', 1, 20, 20, 3, '2026-05-10 05:59:53'),
(53, 2, 43, '3', 1, 20, 20, 3, '2026-05-10 06:00:04'),
(54, 2, 44, 'list[0]', 1, 20, 20, 3, '2026-05-10 06:00:17'),
(55, 2, 45, 'remove()', 1, 20, 20, 3, '2026-05-10 06:00:30'),
(56, 2, 46, 'Hapus akhir', 1, 20, 20, 3, '2026-05-10 06:00:51'),
(57, 2, 47, 'Urutkan', 1, 20, 20, 3, '2026-05-10 06:00:59'),
(58, 2, 48, 'extend()', 1, 20, 20, 3, '2026-05-10 06:01:12'),
(59, 2, 49, 'Balik urutan', 1, 20, 20, 3, '2026-05-10 06:01:20'),
(60, 2, 50, 'Cek anggota', 1, 20, 20, 3, '2026-05-10 06:01:40'),
(61, 1, 11, 'x = 5', 1, 20, 20, 2, '2026-05-10 06:35:50'),
(62, 1, 12, 'str', 1, 20, 20, 3, '2026-05-10 06:35:59'),
(63, 1, 13, 'float', 1, 20, 25, 4, '2026-05-10 06:36:09'),
(64, 1, 14, '<class \'int\'>', 1, 20, 25, 5, '2026-05-10 06:36:18'),
(65, 1, 15, 'True', 1, 20, 25, 6, '2026-05-10 06:36:27'),
(66, 1, 16, 'list', 1, 20, 25, 7, '2026-05-10 06:36:36'),
(67, 1, 17, 'Mengecek tipe data', 1, 20, 25, 8, '2026-05-10 06:36:46'),
(68, 1, 18, '{}', 1, 20, 25, 9, '2026-05-10 06:36:55'),
(69, 1, 19, '<class \'float\'>', 1, 20, 25, 10, '2026-05-10 06:37:09'),
(70, 1, 20, 'Kosong', 1, 20, 25, 11, '2026-05-10 06:37:51'),
(71, 1, 21, '15', 1, 20, 25, 15, '2026-05-10 06:38:11'),
(72, 1, 22, '7', 1, 20, 25, 15, '2026-05-10 06:38:19'),
(73, 1, 23, '12', 1, 20, 25, 15, '2026-05-10 06:38:33'),
(74, 1, 24, '5', 1, 20, 25, 15, '2026-05-10 06:38:51'),
(75, 1, 25, '3', 1, 20, 25, 15, '2026-05-10 06:39:07'),
(76, 1, 26, '1', 1, 20, 25, 15, '2026-05-10 06:39:34'),
(77, 1, 27, '8', 1, 20, 25, 15, '2026-05-10 06:40:04'),
(78, 1, 28, '==', 1, 20, 25, 15, '2026-05-10 06:40:17'),
(79, 1, 29, 'True', 1, 20, 25, 15, '2026-05-10 06:40:26'),
(80, 1, 30, 'True', 1, 20, 25, 15, '2026-05-10 06:40:35'),
(81, 1, 31, 'Semua benar', 1, 20, 25, 15, '2026-05-10 06:40:49'),
(82, 1, 32, 'upper()', 1, 20, 25, 15, '2026-05-10 06:40:57'),
(83, 1, 33, 'lower()', 1, 20, 25, 15, '2026-05-10 06:41:06'),
(84, 1, 34, '6', 1, 20, 25, 15, '2026-05-10 06:41:15'),
(85, 1, 35, 's[0]', 1, 20, 25, 15, '2026-05-10 06:41:25'),
(86, 1, 36, 'count()', 1, 20, 25, 15, '2026-05-10 06:41:52'),
(87, 1, 37, 'Python', 1, 20, 25, 15, '2026-05-10 06:42:07'),
(88, 1, 38, 'replace()', 1, 20, 25, 15, '2026-05-10 06:42:21'),
(89, 1, 39, 'split()', 1, 20, 25, 15, '2026-05-10 06:42:30'),
(90, 1, 40, 'Hapus spasi', 1, 20, 25, 15, '2026-05-10 06:42:40'),
(91, 1, 41, '[1, 2, 3]', 1, 20, 25, 5, '2026-05-10 06:43:02'),
(92, 1, 42, 'append()', 1, 20, 25, 6, '2026-05-10 06:43:13'),
(93, 1, 43, '3', 1, 20, 25, 7, '2026-05-10 06:43:22'),
(94, 1, 44, 'list[0]', 1, 20, 25, 8, '2026-05-10 06:43:32'),
(95, 1, 45, 'remove()', 1, 20, 25, 9, '2026-05-10 06:44:02'),
(96, 1, 46, 'Hapus akhir', 1, 20, 25, 10, '2026-05-10 06:44:15'),
(97, 1, 47, 'Urutkan', 1, 20, 25, 11, '2026-05-10 06:44:23'),
(98, 1, 48, 'extend()', 1, 20, 25, 12, '2026-05-10 06:44:32'),
(99, 1, 49, 'Balik urutan', 1, 20, 25, 13, '2026-05-10 06:44:39'),
(100, 1, 50, 'Cek anggota', 1, 20, 25, 14, '2026-05-10 06:45:09'),
(101, 6, 1, 'Hello World', 1, 20, 20, 1, '2026-05-10 11:54:35'),
(102, 6, 2, '# komentar', 1, 20, 20, 2, '2026-05-10 11:54:51'),
(103, 6, 3, 'Mendefinisikan fungsi', 1, 20, 20, 3, '2026-05-10 11:54:58'),
(104, 6, 4, 'python file.py', 1, 20, 25, 4, '2026-05-10 11:55:15'),
(105, 6, 5, '.py', 1, 20, 25, 5, '2026-05-10 11:55:24'),
(106, 6, 6, '5', 1, 20, 25, 6, '2026-05-10 11:55:39'),
(107, 6, 7, 'loop', 1, 20, 25, 7, '2026-05-10 11:55:48'),
(108, 6, 8, 'Mengembalikan nilai', 1, 20, 25, 8, '2026-05-10 11:55:57'),
(109, 6, 9, 'Guido van Rossum', 1, 20, 25, 9, '2026-05-10 11:56:12'),
(110, 6, 10, 'Bahasa pemrograman', 1, 20, 25, 10, '2026-05-10 11:56:23'),
(111, 8, 1, 'Hello World', 1, 20, 20, 1, '2026-05-10 12:20:03'),
(112, 8, 2, '# komentar', 1, 20, 20, 2, '2026-05-10 12:20:12'),
(113, 8, 3, 'Mendefinisikan fungsi', 1, 20, 20, 3, '2026-05-10 12:20:19'),
(114, 2, 51, 'Hello World', 1, 20, 25, 4, '2026-05-13 05:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_badges`
--

CREATE TABLE `user_badges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `badge_id` bigint(20) UNSIGNED NOT NULL,
  `earned_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_badges`
--

INSERT INTO `user_badges` (`id`, `user_id`, `badge_id`, `earned_at`) VALUES
(1, 1, 1, '2026-05-09 16:19:05'),
(2, 2, 1, '2026-05-09 23:13:31'),
(3, 2, 4, '2026-05-09 23:13:31'),
(4, 1, 4, '2026-05-09 23:42:07'),
(5, 1, 6, '2026-05-10 00:26:14'),
(6, 6, 1, '2026-05-10 04:54:36'),
(7, 8, 1, '2026-05-10 05:20:03'),
(8, 1, 3, '2026-05-11 08:32:26'),
(9, 2, 3, '2026-05-11 18:45:18'),
(10, 2, 7, '2026-05-11 21:00:00'),
(11, 2, 6, '2026-05-11 21:05:57'),
(12, 1, 7, '2026-05-15 22:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_progress`
--

CREATE TABLE `user_progress` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `status` enum('locked','unlocked','completed') NOT NULL DEFAULT 'locked',
  `attempt_count` int(11) NOT NULL DEFAULT 1,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_progress`
--

INSERT INTO `user_progress` (`id`, `user_id`, `level_id`, `score`, `status`, `attempt_count`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 'unlocked', 1, NULL, '2026-05-09 16:19:05', '2026-05-09 16:19:05'),
(2, 1, 2, 0, 'locked', 1, NULL, '2026-05-09 16:19:05', '2026-05-09 16:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_streaks`
--

CREATE TABLE `user_streaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `current_streak` int(11) NOT NULL DEFAULT 0,
  `max_streak` int(11) NOT NULL DEFAULT 0,
  `last_correct_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_streaks`
--

INSERT INTO `user_streaks` (`id`, `user_id`, `current_streak`, `max_streak`, `last_correct_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, '2026-05-09 16:19:05', '2026-05-09 16:19:05', '2026-05-09 16:19:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_quests`
--
ALTER TABLE `daily_quests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daily_quests_question_id_foreign` (`question_id`),
  ADD KEY `daily_quests_user_id_quest_date_index` (`user_id`,`quest_date`);

--
-- Indexes for table `daily_quest_questions`
--
ALTER TABLE `daily_quest_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `leaderboards`
--
ALTER TABLE `leaderboards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leaderboards_user_id_foreign` (`user_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_level_id_index` (`level_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_email_index` (`email`),
  ADD KEY `users_xp_index` (`xp`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_answers_user_id_question_id_index` (`user_id`,`question_id`),
  ADD KEY `user_answers_is_correct_index` (`is_correct`),
  ADD KEY `user_answers_created_at_index` (`created_at`),
  ADD KEY `user_answers_user_id_is_correct_index` (`user_id`,`is_correct`),
  ADD KEY `user_answers_question_id_user_id_index` (`question_id`,`user_id`);

--
-- Indexes for table `user_badges`
--
ALTER TABLE `user_badges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_badges_user_id_badge_id_unique` (`user_id`,`badge_id`),
  ADD KEY `user_badges_badge_id_foreign` (`badge_id`),
  ADD KEY `user_badges_user_id_index` (`user_id`);

--
-- Indexes for table `user_progress`
--
ALTER TABLE `user_progress`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_progress_user_id_level_id_unique` (`user_id`,`level_id`),
  ADD KEY `user_progress_level_id_foreign` (`level_id`),
  ADD KEY `user_progress_user_id_level_id_index` (`user_id`,`level_id`);

--
-- Indexes for table `user_streaks`
--
ALTER TABLE `user_streaks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_streaks_user_id_unique` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `daily_quests`
--
ALTER TABLE `daily_quests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `daily_quest_questions`
--
ALTER TABLE `daily_quest_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaderboards`
--
ALTER TABLE `leaderboards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `user_badges`
--
ALTER TABLE `user_badges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_progress`
--
ALTER TABLE `user_progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_streaks`
--
ALTER TABLE `user_streaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daily_quests`
--
ALTER TABLE `daily_quests`
  ADD CONSTRAINT `daily_quests_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `daily_quests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leaderboards`
--
ALTER TABLE `leaderboards`
  ADD CONSTRAINT `leaderboards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD CONSTRAINT `user_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_answers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_badges`
--
ALTER TABLE `user_badges`
  ADD CONSTRAINT `user_badges_badge_id_foreign` FOREIGN KEY (`badge_id`) REFERENCES `badges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_badges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_progress`
--
ALTER TABLE `user_progress`
  ADD CONSTRAINT `user_progress_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_progress_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_streaks`
--
ALTER TABLE `user_streaks`
  ADD CONSTRAINT `user_streaks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
