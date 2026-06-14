<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('levels', function (Blueprint $table) {
            $table->longText('content')->nullable()->after('description');
        });

        Schema::table('user_progress', function (Blueprint $table) {
            $table->timestamp('material_read_at')->nullable()->after('completed_at');
        });
    }

    public function down(): void
    {
        Schema::table('levels', function (Blueprint $table) {
            $table->dropColumn('content');
        });

        Schema::table('user_progress', function (Blueprint $table) {
            $table->dropColumn('material_read_at');
        });
    }
};
