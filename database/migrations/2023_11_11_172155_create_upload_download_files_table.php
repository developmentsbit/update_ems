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
        Schema::create('upload_download_files', function (Blueprint $table) {
            $table->id();
            $table->string('title_en',200)->nullable();
            $table->string('title_bn',200)->nullable();
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
        Schema::dropIfExists('upload_download_files');
    }
};
