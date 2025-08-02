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
        Schema::create('SOC_PARAMS', function (Blueprint $table) {
            $table->string('SOC_PARAM', 40);
            $table->integer('SOC_PRMINT')->nullable();
            $table->string('SOC_PRMTXT')->nullable();
            $table->integer('SOC_PRMEXT')->nullable();
            $table->dateTime('SOC_DTMAJ')->nullable();
            $table->string('SOC_USRMAJ', 20)->nullable();
            $table->integer('SOC_NUMMAJ')->nullable();

            $table->primary(['SOC_PARAM'], 'soc_pparam');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SOC_PARAMS');
    }
};
