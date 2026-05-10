<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

// create_badges_table

return new class extends Migration {
    public function up(): void
    {
        Schema::create('badges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('color', 20)->default('#f59e0b');
            $table->json('condition');
            $table->timestamps();
        });

        // Insert badge data
        $badges = [
            ['name' => 'First Blood', 'description' => 'Selesaikan Level 1', 'icon' => 'fa-droplet', 'color' => '#ef4444', 'condition' => json_encode(['type' => 'first_level'])],
            ['name' => 'Quiz Master', 'description' => 'Skor 100% semua level', 'icon' => 'fa-crown', 'color' => '#f59e0b', 'condition' => json_encode(['type' => 'perfect_score'])],
            ['name' => 'Python King', 'description' => 'Menempati #1 rank', 'icon' => 'fa-chess-king', 'color' => '#fbbf24', 'condition' => json_encode(['type' => 'rank_1'])],
            ['name' => 'Night Owl', 'description' => 'Belajar jam 23:00+', 'icon' => 'fa-moon', 'color' => '#8b5cf6', 'condition' => json_encode(['type' => 'night_study'])],
            ['name' => 'Diamond', 'description' => '5000 XP terkumpul', 'icon' => 'fa-gem', 'color' => '#06b6d4', 'condition' => json_encode(['type' => 'xp_5000'])],
            ['name' => 'Streak Starter', 'description' => 'Streak 3 hari', 'icon' => 'fa-fire', 'color' => '#f97316', 'condition' => json_encode(['type' => 'streak_3'])],
        ];

        foreach ($badges as $badge) {
            DB::table('badges')->insert($badge);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('badges');
    }
};
