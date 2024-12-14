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
        Schema::create('oculussinisters', function (Blueprint $table) {
            $table->id();
            $table->string('os_sphere');
            $table->string('os_cylinder');
            $table->string('os_axis');
            $table->string('os_add');
            $table->string('os_va');
            $table->foreignId('pos_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oculussinisters');
    }
};
