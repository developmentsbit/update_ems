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
        Schema::create('online_lecture_uploads', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('addclass');
            $table->bigInteger('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('addgroup');
            $table->string('title_en',200)->nullable();
            $table->string('title_bn',200)->nullable();
            $table->string('teacher_name_en',200)->nullable();
            $table->string('teacher_name_bn',200)->nullable(); 
            $table->string('video_url',200)->nullable(); 
            $table->text('details')->nullable();
            $table->text('details_bn')->nullable();
            $table->string('date')->nullable();
            $table->string('image',100)->default('0');
            $table->integer('status')->default(1)->comment('1 = Active & 0 = Inactive');
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('online_lecture_uploads');
    }
};
