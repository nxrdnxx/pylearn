<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('level_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // kategori soal
            $table->string('type', 50);

            // ✅ jenis jawaban - MCQ only sekarang
            $table->string('answer_type', 20)->default('mcq');

            $table->text('question_text');
            $table->text('code_snippet')->nullable();

            // ✅ opsi jawaban (khusus MCQ)
            $table->json('options')->nullable();

            $table->text('correct_answer');
            $table->text('explanation')->nullable();
            $table->json('test_cases')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};