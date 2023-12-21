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
        Schema::create('supplier_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name',200);
            $table->string('name_bn',200)->nullable();
            $table->integer('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('address_bn')->nullable();
            $table->integer('order_by')->nullable();
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_infos');
    }
};
