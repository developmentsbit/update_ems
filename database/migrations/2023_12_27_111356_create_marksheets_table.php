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
        Schema::create('marksheets', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->nullable();
            $table->bigInteger('class_id')->unsigned()->nullable();
            $table->foreign('class_id')->references('id')->on('addclass');
            $table->bigInteger('group_id')->unsigned()->nullable();
            $table->foreign('group_id')->references('id')->on('addgroup');
            $table->bigInteger('exam_id')->unsigned()->nullable();
            $table->foreign('exam_id')->references('id')->on('add_exam_types');
            $table->bigInteger('subject_id')->unsigned()->nullable();
            $table->foreign('subject_id')->references('id')->on('subject_infos');
            $table->bigInteger('subject_part_id')->unsigned()->nullable();
            $table->foreign('subject_part_id')->references('id')->on('subject_parts');
            $table->string('session')->nullable();
            $table->integer('mcq')->default('0');
            $table->integer('written')->default('0');
            $table->integer('practical')->default('0');
            $table->integer('count_asses')->default('0');
            $table->integer('obtain_mark')->default('0');
            $table->string('letter_grade')->nullable();
            $table->string('gpa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marksheets');
    }
};
