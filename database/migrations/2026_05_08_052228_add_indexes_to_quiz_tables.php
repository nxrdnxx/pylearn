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
        Schema::table('user_answers', function (Blueprint $table) {
            $table->index(['user_id', 'question_id']);
            $table->index('is_correct');
            $table->index('created_at');
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->index('level_id');
        });

        Schema::table('user_badges', function (Blueprint $table) {
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_answers', function (Blueprint $table) {
            $table->dropIndex(['user_id', 'question_id']);
            $table->dropIndex(['is_correct']);
            $table->dropIndex(['created_at']);
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->dropIndex(['level_id']);
        });

        Schema::table('user_badges', function (Blueprint $table) {
            $table->dropIndex(['user_id']);
        });
    }
};
