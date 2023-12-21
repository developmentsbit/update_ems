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
        Schema::create('bank_transaction_entries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('users');
            $table->bigInteger('bank_id')->unsigned();
            $table->foreign('bank_id')->references('id')->on('bank_infos');
            $table->integer('transaction_type');
            $table->string('cheque_no')->nullable();
            $table->string('amount')->nullable();
            $table->string('date');
            $table->longText('details')->nullable();
            $table->longText('details_bn')->nullable();
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
        Schema::dropIfExists('bank_transaction_entries');
    }
};
