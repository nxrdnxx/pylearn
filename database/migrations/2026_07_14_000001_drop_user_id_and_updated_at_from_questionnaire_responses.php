<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $fkExists = DB::select("
            SELECT CONSTRAINT_NAME FROM information_schema.KEY_COLUMN_USAGE
            WHERE TABLE_SCHEMA = DATABASE()
            AND TABLE_NAME = 'questionnaire_responses'
            AND CONSTRAINT_NAME = 'questionnaire_responses_user_id_foreign'
        ");

        if (!empty($fkExists)) {
            Schema::table('questionnaire_responses', function (Blueprint $table) {
                $table->dropForeign('questionnaire_responses_user_id_foreign');
            });
        }

        Schema::table('questionnaire_responses', function (Blueprint $table) {
            if (Schema::hasColumn('questionnaire_responses', 'user_id')) {
                $table->dropColumn('user_id');
            }
            if (Schema::hasColumn('questionnaire_responses', 'updated_at')) {
                $table->dropColumn('updated_at');
            }
        });
    }

    public function down(): void
    {
        Schema::table('questionnaire_responses', function (Blueprint $table) {
            if (!Schema::hasColumn('questionnaire_responses', 'user_id')) {
                $table->foreignId('user_id')->nullable()->unique()->constrained('users')->onDelete('cascade');
            }
            if (!Schema::hasColumn('questionnaire_responses', 'updated_at')) {
                $table->timestamp('updated_at')->nullable();
            }
        });
    }
};
