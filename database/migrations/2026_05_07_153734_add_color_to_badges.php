<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('badges', function (Blueprint $table) {
            $table->string('color', 20)->default('#f59e0b')->after('icon');
        });

        $badges = [
            ['name' => 'First Blood', 'color' => '#ef4444'],
            ['name' => 'Quiz Master', 'color' => '#f59e0b'],
            ['name' => 'Python King', 'color' => '#fbbf24'],
            ['name' => 'Night Owl', 'color' => '#8b5cf6'],
            ['name' => 'Diamond', 'color' => '#06b6d4'],
            ['name' => 'Streak Starter', 'color' => '#f97316'],
        ];

        foreach ($badges as $badge) {
            DB::table('badges')->where('name', $badge['name'])->update(['color' => $badge['color']]);
        }
    }

    public function down(): void
    {
        Schema::table('badges', function (Blueprint $table) {
            $table->dropColumn('color');
        });
    }
};