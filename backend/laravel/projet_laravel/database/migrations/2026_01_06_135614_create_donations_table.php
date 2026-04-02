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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donor_id')->nullable();
            $table->unsignedBigInteger('donation_campaign_id')->nullable();
            $table->dateTime('appointment_datetime')->nullable();
            $table->string('status')->default('scheduled'); // scheduled, in_progress, completed, cancelled
            $table->string('blood_pressure')->nullable();
            $table->decimal('hemoglobin_level', 5, 2)->nullable();
            $table->unsignedBigInteger('qr_code_id')->nullable();
            $table->timestamps();

            // FK
            // $table->foreign('donation_campaign_id')->references('id')->on('donation_campaigns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
