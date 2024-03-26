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
        Schema::create('add_fee_titles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_bn')->nullable();
            $table->integer('year')->nullable();
            $table->double('amount',11,2)->nullable();
            $table->bigInteger('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('addclass');
            $table->string('month',10)->nullable();
            $table->longText('details')->nullable();
            $table->longText('details_bn')->nullable();
            $table->integer('index')->default(0)->nullable()->comment("SL no");
            $table->tinyInteger('feeType')->default(1)->nullable()->comment("1=common fee 2=exceptional fee");
            $table->tinyInteger('fee_category')->default(1)->nullable()->comment('1=school,2=hostel,3=transport fee');
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_fee_titles');
    }
};
