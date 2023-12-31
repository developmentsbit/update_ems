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
        Schema::create('supplier_payments', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->bigInteger('supplier_id')->unsigned();
            $table->foreign('supplier_id')->references('id')->on('supplier_infos');
            $table->double('payable')->nullable();
            $table->double('payment')->nullable();
            $table->string('receiver')->nullable();
            $table->longText('details')->nullable();
            $table->longText('details_bn')->nullable();
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_payments');
    }
};
