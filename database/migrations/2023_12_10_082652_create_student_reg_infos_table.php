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
        Schema::create('student_reg_infos', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->nullable();
            $table->string('class_roll')->nullable();
            $table->bigInteger('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('addclass');
            $table->bigInteger('group_id')->unsigned()->nullable();
            $table->foreign('group_id')->references('id')->on('addgroup');
            $table->bigInteger('section_id')->unsigned()->nullable();
            $table->foreign('section_id')->references('id')->on('addsection');
            $table->string('session')->nullable();
            $table->string('year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_reg_infos');
    }
};
