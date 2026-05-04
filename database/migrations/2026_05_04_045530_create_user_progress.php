<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// create_user_progress_table

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_progress', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('level_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->integer('score')->default(0);
            $table->enum('status', ['locked', 'unlocked', 'completed'])->default('locked');
            $table->integer('attempt_count')->default(1);

            $table->timestamp('completed_at')->nullable();

            $table->timestamps();

            $table->unique(['user_id', 'level_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_progress');
    }
};
