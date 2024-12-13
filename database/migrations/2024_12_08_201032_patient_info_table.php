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
        Schema::create('patient_infos', function (Blueprint $table) {
            $table->id();
            $table->string('patient_fname');
            $table->string('patient_mname');
            $table->string('patient_lname');
            $table->string('patient_address');
            $table->string('patient_contact_number');
            $table->tinyInteger('patient_age');
            $table->string('patient_gender');
            $table->tinyInteger('branch_id');
            $table->tinyInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('patient_infos');
    }
};
