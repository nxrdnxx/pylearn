<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $maxId = DB::table('user_badges')->max('id') ?? 0;
        DB::statement("ALTER TABLE user_badges MODIFY COLUMN id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT");
        DB::statement("ALTER TABLE user_badges AUTO_INCREMENT = " . ($maxId + 1));
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE user_badges MODIFY COLUMN id BIGINT UNSIGNED NOT NULL");
    }
};
