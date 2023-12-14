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
        Schema::create('institute_position_details', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('title')->nullable();
            $table->string('title_bn')->nullable();
            $table->longText('details')->nullable();
            $table->longText('details_bn')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('image',100)->default('0');
            $table->integer('status')->default(1)->comment('1 = Active & 0 = Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institute_position_details');
    }
};
