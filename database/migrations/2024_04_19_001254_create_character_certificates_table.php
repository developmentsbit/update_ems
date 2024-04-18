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
        Schema::create('character_certificates', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('village')->nullable();
            $table->string('post_office')->nullable();
            $table->string('upazila')->nullable();
            $table->string('district')->nullable();
            $table->string('passing_class')->nullable();
            $table->string('passing_year')->nullable();
            $table->string('group')->nullable();
            $table->string('gpa')->nullable();
            $table->string('roll_no')->nullable();
            $table->string('reg_no')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('session')->nullable();
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('character_certificates');
    }
};
