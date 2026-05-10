<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Make sure earned_at column can be nullable and has default
        Schema::table('user_badges', function (Blueprint $table) {
            $table->timestamp('earned_at')->nullable()->default(null)->change();
        });

        // Update any null earned_at values with current timestamp
        DB::table('user_badges')
            ->whereNull('earned_at')
            ->update(['earned_at' => Carbon::now()]);

        // Make earned_at NOT NULL after setting values
        Schema::table('user_badges', function (Blueprint $table) {
            $table->timestamp('earned_at')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_badges', function (Blueprint $table) {
            $table->timestamp('earned_at')->nullable()->change();
        });
    }
};
