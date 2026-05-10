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
        // Add indexes to user_answers for frequently queried columns
        Schema::table('user_answers', function (Blueprint $table) {
            $table->index(['user_id', 'is_correct']);
            $table->index(['question_id', 'user_id']);
        });

        // Add indexes to daily_quests for date queries
        Schema::table('daily_quests', function (Blueprint $table) {
            $table->index(['user_id', 'quest_date']);
            $table->unique(['user_id', 'quest_date']);
        });

        // Add indexes to user_progress
        Schema::table('user_progress', function (Blueprint $table) {
            $table->index(['user_id', 'level_id']);
        });

        // Add indexes to users for frequently queried columns
        Schema::table('users', function (Blueprint $table) {
            $table->index('email');
            $table->index('xp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_answers', function (Blueprint $table) {
            $table->dropIndex(['user_id', 'is_correct']);
            $table->dropIndex(['question_id', 'user_id']);
        });

        Schema::table('daily_quests', function (Blueprint $table) {
            $table->dropIndex(['user_id', 'quest_date']);
            $table->dropUnique(['user_id', 'quest_date']);
        });

        Schema::table('user_progress', function (Blueprint $table) {
            $table->dropIndex(['user_id', 'level_id']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['email']);
            $table->dropIndex(['xp']);
        });
    }
};
