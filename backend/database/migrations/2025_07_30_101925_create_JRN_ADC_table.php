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
        Schema::create('JRN_ADC', function (Blueprint $table) {
            $table->string('JRN_CODE', 10);
            $table->string('ADC_CODE', 3);
            $table->string('CPT_NUMERO', 25)->nullable();
            $table->string('ADC_FORMUL', 40)->nullable();

            $table->primary(['JRN_CODE', 'ADC_CODE'], 'adc_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('JRN_ADC');
    }
};
