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
        Schema::create('REGLEMENTS', function (Blueprint $table) {
            $table->string('REG_NUMERO', 10);
            $table->string('REG_ECRPCF', 10)->nullable();
            $table->string('REG_ECRBQ', 10)->nullable();
            $table->string('PCF_CODE', 20)->nullable();
            $table->dateTime('REG_DATE')->nullable();
            $table->dateTime('ECH_DATE')->nullable();
            $table->string('DOC_PIECE', 30)->nullable();
            $table->string('REG_TYPE', 15)->nullable();
            $table->string('REG_CHEQUE', 10)->nullable();
            $table->string('REG_REF', 40)->nullable();
            $table->string('DEV_CODE', 3)->nullable();
            $table->decimal('REG_RECU', 20, 4)->nullable();
            $table->decimal('REG_D_REC', 20, 4)->nullable();
            $table->decimal('REG_E_REC', 20, 4)->nullable();
            $table->decimal('REG_DONNEE', 20, 4)->nullable();
            $table->decimal('REG_D_DEP', 20, 4)->nullable();
            $table->decimal('REG_E_DEP', 20, 4)->nullable();
            $table->decimal('REG_ECATO', 20, 4)->nullable();
            $table->decimal('REG_ECATOD', 20, 4)->nullable();
            $table->decimal('REG_ECATOE', 20, 4)->nullable();
            $table->decimal('REG_ECARG', 20, 4)->nullable();
            $table->decimal('REG_ECARGD', 20, 4)->nullable();
            $table->decimal('REG_ECARGE', 20, 4)->nullable();
            $table->string('REG_CPTRG', 25)->nullable();
            $table->string('REG_ECRRG', 10)->nullable();
            $table->decimal('REG_ECACV', 20, 4)->nullable();
            $table->decimal('REG_ECACVD', 20, 4)->nullable();
            $table->decimal('REG_ECACVE', 20, 4)->nullable();
            $table->string('REG_CPTCV', 25)->nullable();
            $table->string('REG_ECRCV', 10)->nullable();
            $table->decimal('REG_ECACH', 20, 4)->nullable();
            $table->decimal('REG_ECACHD', 20, 4)->nullable();
            $table->decimal('REG_ECACHE', 20, 4)->nullable();
            $table->string('REG_CPTCH', 25)->nullable();
            $table->string('REG_ECRCH', 10)->nullable();
            $table->decimal('REG_ECAES', 20, 4)->nullable();
            $table->decimal('REG_ECAESD', 20, 4)->nullable();
            $table->decimal('REG_ECAESE', 20, 4)->nullable();
            $table->string('REG_CPTES', 25)->nullable();
            $table->string('REG_ECRES', 10)->nullable();
            $table->decimal('REG_ECASU', 20, 4)->nullable();
            $table->decimal('REG_ECASUD', 20, 4)->nullable();
            $table->decimal('REG_ECASUE', 20, 4)->nullable();
            $table->string('RMB_NUMERO', 10)->nullable();
            $table->string('REG_ACCEPT', 1)->nullable();
            $table->string('RIB_BQ_NOM', 40)->nullable();
            $table->string('RIB_BQ_ADR', 40)->nullable();
            $table->string('RIB_BQ_SWI', 20)->nullable();
            $table->string('RIB_TYPE', 3)->nullable();
            $table->string('RIB_IBAN', 4)->nullable();
            $table->string('RIB_AGENCE', 12)->nullable();
            $table->string('RIB_GUICHE', 12)->nullable();
            $table->string('RIB_COMPTE', 34)->nullable();
            $table->string('RIB_CLE', 2)->nullable();
            $table->dateTime('RIB_CB_DTF')->nullable();
            $table->string('RIB_CB_TYP', 15)->nullable();
            $table->string('REG_R_TIRE', 20)->nullable();
            $table->string('RIB_TEXTE', 40)->nullable();
            $table->dateTime('RIB_DT_SM')->nullable();
            $table->string('RIB_RUM', 35)->nullable();
            $table->string('RIB_SEQPRE', 4)->nullable();
            $table->string('REG_EFFET', 1)->nullable();
            $table->string('REG_JRNEF', 10)->nullable();
            $table->string('REG_CPTEF', 25)->nullable();
            $table->string('REG_ECREFE', 10)->nullable();
            $table->string('REG_ECREFT', 10)->nullable();
            $table->string('RAB_NUMERO', 10)->nullable();
            $table->string('RIP_NUMERO', 10)->nullable();
            $table->dateTime('REG_DTMAJ')->nullable();
            $table->string('REG_USRMAJ', 20)->nullable();
            $table->integer('REG_NUMMAJ')->nullable();
            $table->string('REG_CLEINA', 300)->nullable();

            $table->index(['REG_DATE', 'PCF_CODE'], 'reg_kdate');
            $table->index(['ECH_DATE', 'PCF_CODE', 'REG_NUMERO'], 'reg_kdtech');
            $table->index(['DEV_CODE', 'REG_DONNEE', 'REG_DATE', 'DOC_PIECE'], 'reg_kpaye');
            $table->index(['DOC_PIECE', 'REG_DATE'], 'reg_kpiece');
            $table->index(['RAB_NUMERO', 'REG_NUMERO'], 'reg_krab');
            $table->index(['DEV_CODE', 'REG_RECU', 'REG_DATE', 'DOC_PIECE'], 'reg_krecu');
            $table->index(['RMB_NUMERO', 'REG_NUMERO'], 'reg_krmb');
            $table->index(['PCF_CODE', 'DOC_PIECE', 'REG_DATE'], 'reg_ktiers');
            $table->primary(['REG_NUMERO'], 'reg_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('REGLEMENTS');
    }
};
