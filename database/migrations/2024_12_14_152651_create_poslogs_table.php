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
        Schema::create('pos_logs', function (Blueprint $table) {
            $table->id();
            $table->string('pos_typeOfPurchase');
            $table->integer('pos_addamount');
            $table->integer('pos_deposit');
            $table->integer('pos_balance');
            $table->string('pos_invoice_id');
            $table->integer('pos_status');
            $table->foreignId('pr_id');
            $table->foreignId('lens_product_id');
            $table->foreignId('frame_product_id');
            $table->foreignId('patient_id');
            $table->foreignId('branch_id');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poslogs');
    }
};
