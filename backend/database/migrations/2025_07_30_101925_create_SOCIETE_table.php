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
        Schema::create('SOCIETE', function (Blueprint $table) {
            $table->string('SOC_BASE', 100);
            $table->string('SOC_RS', 60)->nullable();
            $table->string('SOC_RS2', 60)->nullable();
            $table->string('SOC_RUE', 60)->nullable();
            $table->string('SOC_COMP', 60)->nullable();
            $table->string('SOC_CP', 10)->nullable();
            $table->string('SOC_VILLE', 200)->nullable();
            $table->string('SOC_ETAT', 100)->nullable();
            $table->string('SOC_REG', 100)->nullable();
            $table->string('PAY_CODE', 3)->nullable();
            $table->string('SOC_TEL1', 20)->nullable();
            $table->string('SOC_TEL2', 20)->nullable();
            $table->string('SOC_FAX', 20)->nullable();
            $table->string('SOC_TELEX', 10)->nullable();
            $table->string('SOC_EMAIL', 60)->nullable();
            $table->string('SOC_URL', 128)->nullable();
            $table->string('SOC_LOGO', 260)->nullable();
            $table->string('SOC_CBAR', 30)->nullable();
            $table->string('SOC_PXCBAR', 6)->nullable();
            $table->string('SOC_SIRET', 14)->nullable();
            $table->string('SOC_NII', 14)->nullable();
            $table->string('SOC_ACCISE', 15)->nullable();
            $table->string('SOC_SIREN', 9)->nullable();
            $table->string('SOC_RCS', 200)->nullable();
            $table->string('SOC_APE', 5)->nullable();
            $table->string('SOC_CMPAPE', 100)->nullable();
            $table->string('SOC_STATUS', 15)->nullable();
            $table->string('SOC_INSC', 15)->nullable();
            $table->string('SOC_CAPITA', 20)->nullable();
            $table->string('SOC_EFF', 15)->nullable();
            $table->dateTime('SOC_DTCREE')->nullable();
            $table->string('SOC_PERIOD', 1)->nullable();
            $table->dateTime('SOC_EXE_DD')->nullable();
            $table->dateTime('SOC_EXE_DF')->nullable();
            $table->dateTime('SOC_SUP_DD')->nullable();
            $table->dateTime('SOC_SUP_DF')->nullable();
            $table->dateTime('SOC_SAI_DD')->nullable();
            $table->dateTime('SOC_SAI_DF')->nullable();
            $table->string('SOC_PRVDEV', 3)->nullable();
            $table->string('DEV_CODE', 3)->nullable();
            $table->string('SOC_DEVLOC', 3)->nullable();
            $table->dateTime('SOC_DT_EUR')->nullable();
            $table->boolean('SOC_ECHEAN')->nullable();
            $table->string('SOC_ECHCPT', 1)->nullable();
            $table->boolean('SOC_CPTQTE')->nullable();
            $table->boolean('SOC_ANA')->nullable();
            $table->boolean('SOC_CPTNEG')->nullable();
            $table->boolean('SOC_TVAENC')->nullable();
            $table->string('SOC_ECRLIB', 1)->nullable();
            $table->boolean('SOC_ECRDQI')->nullable();
            $table->boolean('SOC_ECTRINSA')->nullable();
            $table->string('SOC_JRNOD', 10)->nullable();
            $table->string('SOC_JRNEFR', 10)->nullable();
            $table->string('SOC_BQCRB', 15)->nullable();
            $table->string('SOC_BQCREC', 15)->nullable();
            $table->string('SOC_BQCRES', 15)->nullable();
            $table->boolean('SOC_LETPOR')->nullable();
            $table->boolean('SOC_LETREG')->nullable();
            $table->string('SOC_ICS', 13)->nullable();
            $table->string('SOC_CPT2', 40)->nullable();
            $table->string('SOC_CPT3', 40)->nullable();
            $table->string('SOC_CPT40', 40)->nullable();
            $table->string('SOC_CPT41', 50)->nullable();
            $table->string('SOC_CPT445', 90)->nullable();
            $table->string('SOC_CPT51', 40)->nullable();
            $table->string('SOC_CPT60', 75)->nullable();
            $table->string('SOC_CPT70', 55)->nullable();
            $table->string('SOC_CPTRAC', 75)->nullable();
            $table->string('SOC_CPT67', 40)->nullable();
            $table->integer('SOC_CPT_LG')->nullable();
            $table->string('SOC_CPTCOL', 159)->nullable();
            $table->string('SOC_CPTEFF', 65)->nullable();
            $table->decimal('SOC_ECARTR', 20, 4)->nullable();
            $table->decimal('SOC_ECARTD', 20, 4)->nullable();
            $table->boolean('SOC_ECRCVS')->nullable();
            $table->integer('SOC_ACCESS')->nullable();
            $table->integer('SOC_P_LOAD')->nullable();
            $table->string('SOC_QTEFMT', 20)->nullable();
            $table->string('SOC_VERIFY', 100)->nullable();
            $table->string('SOC_VERSIO', 20)->nullable();
            $table->string('SOC_VPROC', 20)->nullable();
            $table->string('SOC_VLGCL', 50)->nullable();
            $table->dateTime('SOC_DTUPG')->nullable();
            $table->string('SOC_USRUPG', 20)->nullable();
            $table->string('SOC_NUMSER', 36)->nullable();
            $table->string('SOC_NUMLIC', 20)->nullable();
            $table->string('SOC_DEBRID', 16)->nullable();
            $table->string('SOC_DWSTLC', 16)->nullable();
            $table->string('SOC_SOCDEB', 100)->nullable();

            $table->primary(['SOC_BASE'], 'soc_pbase');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SOCIETE');
    }
};
