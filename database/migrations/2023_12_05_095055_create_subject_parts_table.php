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
        Schema::create('subject_parts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('addclass');
            $table->bigInteger('group_id')->unsigned()->nullable();
            $table->foreign('group_id')->references('id')->on('addgroup');
            $table->bigInteger('exam_type_id')->unsigned();
            $table->foreign('exam_type_id')->references('id')->on('add_exam_types');
            $table->bigInteger('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subject_infos');
            $table->integer('subject_type')->nullable()->comment(' 1 = Compulsory | 2 = Group Subject | 3 = Optional Subject | ');
            $table->string('part_name',150)->nullable();
            $table->string('part_name_bn',150)->nullable();
            $table->string('part_code',150)->nullable();
            $table->integer('order_by')->nullable();
            $table->integer('status')->nullable()->comment(' 1 = Active | 0 = Inactive');
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_parts');
    }
};
