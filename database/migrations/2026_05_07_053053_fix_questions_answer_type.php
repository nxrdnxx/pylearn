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
        Schema::table('questions', function (Blueprint $table) {
            // Change enum to string
            $table->string('answer_type', 20)->change();
            $table->string('type', 50)->change();
        });
        DB::statement("UPDATE questions SET answer_type = 'mcq' WHERE answer_type IS NULL OR answer_type = ''");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->enum('answer_type', ['mcq'])->change();
            $table->enum('type', ['output', 'coding', 'debugging'])->change();
        });
    }
};
