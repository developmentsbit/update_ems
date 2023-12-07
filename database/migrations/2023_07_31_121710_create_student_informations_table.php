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
        Schema::create('student_informations', function (Blueprint $table) {
            $table->id();
            $table->date('adminssion_date')->nullable();
            $table->date('entry_date')->nullable();
            $table->string('student_id')->nullable();
            $table->string('student_name')->nullable();
            $table->string('student_name_bn')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('blood_group')->nullable();
            $table->bigInteger('present_division')->unsigned()->nullable();
            $table->foreign('present_division')->references('id')->on('division_informations');
            $table->bigInteger('present_district')->unsigned()->nullable();
            $table->foreign('present_district')->references('id')->on('district_informations');
            $table->bigInteger('present_upazila')->unsigned()->nullable();
            $table->foreign('present_upazila')->references('id')->on('upazila_informations');
            $table->string('present_po')->nullable();
            $table->string('present_village')->nullable();
            $table->string('present_home')->nullable();
            $table->bigInteger('per_division')->unsigned()->nullable();
            $table->foreign('per_division')->references('id')->on('division_informations');
            $table->bigInteger('per_district')->unsigned()->nullable();
            $table->foreign('per_district')->references('id')->on('district_informations');
            $table->bigInteger('per_upazila')->unsigned()->nullable();
            $table->foreign('per_upazila')->references('id')->on('upazila_informations');
            $table->string('per_po')->nullable();
            $table->string('per_village')->nullable();
            $table->string('per_home')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_phone')->nullable();
            $table->string('guardian_email')->nullable();
            $table->string('guardian_relation')->nullable();
            $table->string('image')->default('0');
            $table->date('deleted_at')->nullable();
            $table->bigInteger('create_by')->unsigned();
            $table->foreign('create_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_informations');
    }
};
