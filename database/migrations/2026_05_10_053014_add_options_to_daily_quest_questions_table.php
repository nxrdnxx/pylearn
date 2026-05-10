<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('daily_quest_questions', function (Blueprint $table) {
            $table->json('options')->nullable()->after('code_snippet');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('daily_quest_questions', function (Blueprint $table) {
            $table->dropColumn('options');
        });
    }
};
