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
        Schema::create('questionnaire_responses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->unique();
            $table->tinyInteger('q_1');
            $table->tinyInteger('q_2');
            $table->tinyInteger('q_3');
            $table->tinyInteger('q_4');
            $table->tinyInteger('q_5');
            $table->tinyInteger('q_6');
            $table->tinyInteger('q_7');
            $table->tinyInteger('q_8');
            $table->tinyInteger('q_9');
            $table->tinyInteger('q_10');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionnaire_responses');
    }
};
