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
        Schema::create('PRJ_PLANNING', function (Blueprint $table) {
            $table->string('PRJ_CODE', 40);
            $table->string('LPJ_NUMERO', 5);
            $table->dateTime('LPJ_DATE')->nullable();
            $table->string('SAL_CODE', 3)->nullable();
            $table->string('LPJ_TYPE', 1)->nullable();
            $table->string('LPJ_ABSENC', 15)->nullable();

            $table->unique(['PRJ_CODE', 'LPJ_DATE', 'SAL_CODE'], 'lpj_kplann');
            $table->primary(['PRJ_CODE', 'LPJ_NUMERO'], 'lpj_pplann');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PRJ_PLANNING');
    }
};
