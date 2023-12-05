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
        Schema::create('add_exam_types', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('addclass');
            $table->string('exam_code',200)->nullable();
            $table->string('exam_name',200);
            $table->string('exam_name_bn',200)->nullable();
            $table->string('total_subject',200);
            $table->integer('status')->default(1)->comment('1 = Active & 0 = Inactive');
            $table->string('order_by',200)->nullable();
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_exam_types');
    }
};
