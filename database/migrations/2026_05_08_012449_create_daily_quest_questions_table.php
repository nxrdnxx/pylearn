<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daily_quest_questions', function (Blueprint $table) {
            $table->id();
            $table->text('question_text');
            $table->text('code_snippet')->nullable();
            $table->text('correct_answer');
            $table->text('explanation')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daily_quest_questions');
    }
};