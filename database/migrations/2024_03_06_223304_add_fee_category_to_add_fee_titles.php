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
        Schema::table('add_fee_titles', function (Blueprint $table) {
            $table->tinyInteger('fee_category')->default(1)->nullable()->comment('1=school,2=hostel,3=transport fee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('add_fee_titles', function (Blueprint $table) {
            $table->dropColumn('fee_category');
        });
    }
};
