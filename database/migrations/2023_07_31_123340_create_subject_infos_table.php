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
        Schema::create('subject_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('addclass');
            $table->bigInteger('group_id')->unsigned()->nullable();
            $table->foreign('group_id')->references('id')->on('addgroup');
            $table->string('subject_name')->nullable();
            $table->string('subject_name_bn')->nullable();
            $table->string('subject_code')->nullable();
            $table->string('subject_code_bn')->nullable();
            $table->integer('subject_type')->comment(' 1 = Compulsory | 2 = Group Subject | 3 = Optional Subject')->nullable();
            $table->integer('serial')->nullable();
            $table->integer('status')->nullable();
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('subject_infos');
    }
};
