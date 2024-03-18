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
        Schema::create('column_wise_fee_setups', function (Blueprint $table) {
            $table->id();
            $table->integer('column_id');
            $table->string('year');
            $table->bigInteger('class_id');
            $table->integer('fee_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('column_wise_fee_setups');
    }
};
