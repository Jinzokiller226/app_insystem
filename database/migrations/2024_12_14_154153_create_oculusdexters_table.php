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
        Schema::create('oculusdexters', function (Blueprint $table) {
            $table->id();
            $table->string('od_sphere');
            $table->string('od_cylinder');
            $table->string('od_axis');
            $table->string('od_add');
            $table->string('od_va');
            $table->foreignId('pos_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oculusdexters');
    }
};
