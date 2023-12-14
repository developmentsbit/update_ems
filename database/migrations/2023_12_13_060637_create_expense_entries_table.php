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
        Schema::create('expense_entries', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_no')->nullable();
            $table->string('date');
            $table->bigInteger('expense_id')->unsigned();
            $table->foreign('expense_id')->references('id')->on('income_expenses');
            $table->longText('details')->nullable();
            $table->longText('details_bn')->nullable();
            $table->integer('amount')->nullable();
            $table->string('receiver',200)->nullable();
            $table->longText('address')->nullable();
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
        Schema::dropIfExists('expense_entries');
    }
};
