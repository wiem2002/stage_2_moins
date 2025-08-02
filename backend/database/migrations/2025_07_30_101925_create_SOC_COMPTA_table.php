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
        Schema::create('SOC_COMPTA', function (Blueprint $table) {
            $table->string('SOC_BASE', 100);
            $table->string('SOC_CPTFND', 3)->nullable();
            $table->integer('SOC_ABTLIM')->nullable();
            $table->string('SOC_JRNANV', 10)->nullable();
            $table->string('SOC_TVAJRN', 10)->nullable();
            $table->string('SOC_TVA_CC', 25)->nullable();
            $table->string('SOC_TVA_CD', 25)->nullable();
            $table->string('SOC_TVA_CR', 25)->nullable();
            $table->boolean('SOC_IMPLBF')->nullable();
            $table->boolean('SOC_PIECOB')->nullable();
            $table->boolean('SOC_LIECOB')->nullable();
            $table->string('SOC_TP_RS', 60)->nullable();
            $table->string('SOC_TP_RUE', 60)->nullable();
            $table->string('SOC_TP_COM', 60)->nullable();
            $table->string('SOC_TP_CP', 10)->nullable();
            $table->string('SOC_TP_VIL', 200)->nullable();
            $table->string('SOC_TP_REC', 7)->nullable();
            $table->string('SOC_TP_DOS', 6)->nullable();
            $table->string('SOC_TP_CLE', 2)->nullable();
            $table->string('SOC_TP_CDI', 2)->nullable();
            $table->string('SOC_TP_INS', 3)->nullable();
            $table->string('SOC_TP_DEC', 3)->nullable();
            $table->string('SOC_TP_REG', 3)->nullable();
            $table->string('SOC_TP_STA', 2)->nullable();
            $table->string('SOC_CADD', 15)->nullable();
            $table->string('SOC_CADC', 15)->nullable();
            $table->string('SOC_PERDOT', 1)->nullable();

            $table->primary(['SOC_BASE'], 'soc_pbasec');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SOC_COMPTA');
    }
};
