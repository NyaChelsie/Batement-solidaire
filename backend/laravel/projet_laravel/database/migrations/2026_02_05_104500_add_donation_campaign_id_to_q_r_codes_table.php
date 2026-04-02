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
            if (!Schema::hasColumn('q_r_codes', 'donation_campaign_id')) {
                $table->foreignId('donation_campaign_id')->after('id')->constrained()->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('q_r_codes', function (Blueprint $table) {
            if (Schema::hasColumn('q_r_codes', 'donation_campaign_id')) {
                $table->dropForeign(['donation_campaign_id']);
                $table->dropColumn('donation_campaign_id');
            }
        });
    }
};
