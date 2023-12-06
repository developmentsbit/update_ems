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
        Schema::create('marks_distributions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('addclass');
            $table->bigInteger('exam_id')->unsigned();
            $table->foreign('exam_id')->references('id')->on('add_exam_types');
            $table->bigInteger('group_id')->unsigned()->nullable();
            $table->foreign('group_id')->references('id')->on('addgroup');
            $table->integer('subject_type')->comment(' 1 = Compulsory | 2 = Group Subject | 3 = Optional Subject')->nullable();
            $table->bigInteger('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subject_infos');
            $table->bigInteger('subject_part_id')->unsigned()->nullable();
            $table->foreign('subject_part_id')->references('id')->on('subject_parts');
            $table->string('subject_code')->nullable();
            $table->integer('mcq')->default('0');
            $table->integer('written')->default('0');
            $table->integer('practical')->default('0');
            $table->integer('count_asses')->default('0');
            $table->integer('total')->default('0');
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marks_distributions');
    }
};
