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
        Schema::create('patientrecords', function (Blueprint $table) {
            $table->id();
            $table->string('pr_notes');
            $table->string('pr_pd');
            $table->foreignId('doctor_id');
            $table->foreignId('patient_id');
            $table->foreignId('user_id');
            $table->foreignId('os_id');
            $table->foreignId('od_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patientrecords');
    }
};
