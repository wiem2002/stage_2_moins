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
        Schema::create('ECHEANCES', function (Blueprint $table) {
            $table->string('ECH_NUMERO', 10);
            $table->string('DOC_NUMERO', 10)->nullable()->index('ech_kdoc');
            $table->string('ECR_NUMERO', 10)->nullable()->index('ech_kecr');
            $table->string('FAA_NUMERO', 10)->nullable();
            $table->string('PCF_CODE', 20)->nullable();
            $table->string('PCF_RS', 60)->nullable();
            $table->string('ECH_LIB', 60)->nullable();
            $table->string('ECH_PIECE', 30)->nullable();
            $table->dateTime('ECH_DTEMIS')->nullable();
            $table->dateTime('ECH_DATE')->nullable()->index('ech_kdate2');
            $table->dateTime('ECH_DATINI')->nullable();
            $table->dateTime('ECH_DTMJLE')->nullable();
            $table->string('ECH_DTMJPR', 20)->nullable();
            $table->string('REG_CODE', 8)->nullable();
            $table->dateTime('ECH_DT_IMP')->nullable();
            $table->string('ECH_IMPAYE', 15)->nullable();
            $table->string('DEV_CODE', 3)->nullable();
            $table->decimal('ECH_ARECEV', 20, 4)->nullable();
            $table->decimal('ECH_RECU', 20, 4)->nullable();
            $table->decimal('ECH_D_AREC', 20, 4)->nullable();
            $table->decimal('ECH_D_REC', 20, 4)->nullable();
            $table->decimal('ECH_E_AREC', 20, 4)->nullable();
            $table->decimal('ECH_E_REC', 20, 4)->nullable();
            $table->decimal('ECH_APAYER', 20, 4)->nullable();
            $table->decimal('ECH_PAYER', 20, 4)->nullable();
            $table->decimal('ECH_D_ADEP', 20, 4)->nullable();
            $table->decimal('ECH_D_DEP', 20, 4)->nullable();
            $table->decimal('ECH_E_ADEP', 20, 4)->nullable();
            $table->decimal('ECH_E_DEP', 20, 4)->nullable();
            $table->boolean('ECH_SOLDER')->nullable();
            $table->dateTime('ECH_MCSLE')->nullable();
            $table->string('ECH_MCSPAR', 20)->nullable();
            $table->boolean('ECH_NO_DOC')->nullable();
            $table->string('ECH_ETAT', 1)->nullable();
            $table->integer('ECH_NBREL')->nullable();
            $table->string('ECH_NUOREX', 10)->nullable();
            $table->dateTime('ECH_DTMAJ')->nullable();
            $table->string('ECH_USRMAJ', 20)->nullable();
            $table->integer('ECH_NUMMAJ')->nullable();
            $table->string('ECH_CLEINA', 300)->nullable();

            $table->index(['DEV_CODE', 'ECH_APAYER', 'ECH_DATE', 'ECH_PIECE'], 'ech_kapay');
            $table->index(['DEV_CODE', 'ECH_ARECEV', 'ECH_DATE', 'ECH_PIECE'], 'ech_karec');
            $table->index(['ECH_DATE', 'PCF_CODE'], 'ech_kdate');
            $table->index(['PCF_CODE', 'ECH_DATE'], 'ech_kpcfdt');
            $table->index(['PCF_CODE', 'ECH_PIECE', 'ECH_DATE'], 'ech_kpcfpc');
            $table->index(['ECH_PIECE', 'ECH_DATE'], 'ech_kpiece');
            $table->primary(['ECH_NUMERO'], 'ech_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ECHEANCES');
    }
};
