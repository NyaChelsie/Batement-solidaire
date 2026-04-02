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
        Schema::create('donation_campaigns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('urgency_level')->default('normale'); // normale, urgente, critique
            $table->json('blood_types_needed')->nullable(); // e.g. ["A+", "O-"]
            $table->integer('expected_donors_count')->default(0);
            $table->string('hospital')->default('Hôpital Général de Douala');
            $table->string('slug')->unique();
            $table->string('secret_code')->nullable();
            $table->string('qr_code_path')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // Foreign key if user table exists (assuming generic Laravel user table)
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation_campaigns');
    }
};
