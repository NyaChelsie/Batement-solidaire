<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('q_r_codes', function (Blueprint $table) {
            if (!Schema::hasColumn('q_r_codes', 'code_data')) {
                $table->string('code_data')->after('donation_campaign_id');
            }
            if (!Schema::hasColumn('q_r_codes', 'file_path')) {
                $table->string('file_path')->nullable()->after('code_data');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('q_r_codes', function (Blueprint $table) {
            if (Schema::hasColumn('q_r_codes', 'code_data')) {
                $table->dropColumn('code_data');
            }
            if (Schema::hasColumn('q_r_codes', 'file_path')) {
                $table->dropColumn('file_path');
            }
        });
    }
};
