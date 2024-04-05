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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('sl_no')->nullable();
            $table->integer('student_type')->comment(' 1 - General, 2 - Vocational')->nullable();
            $table->date('date')->nullable();
            $table->string('title')->nullable();
            $table->string('group_subject')->nullable();
            $table->string('session')->nullable();
            $table->string('year')->nullable();
            $table->integer('student_status')->comment(' 1 - Regular, 2 - Irregular, 3 - Private')->nullable();
            $table->string('student_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('roll_no')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('gpa')->nullable();
            $table->date('birth_date')->nullable();
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
