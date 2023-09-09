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
        Schema::create('mujib_corner_photos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('details')->nullable();
            $table->string('image')->default('0');
            $table->integer('type')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mujib_corner_photos');
    }
};
