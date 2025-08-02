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
        Schema::create('TIERS', function (Blueprint $table) {
            $table->string('PCF_CODE', 20);
            $table->string('PCF_TYPE', 1)->nullable()->index('pcf_ktype');
            $table->string('PCF_RS', 60)->nullable()->index('pcf_krs');
            $table->string('PCF_CIVILE', 25)->nullable();
            $table->boolean('PCF_DORT')->nullable();
            $table->string('FAT_CODE', 10)->nullable();
            $table->string('SFT_CODE', 10)->nullable();
            $table->string('PCF_RS2', 60)->nullable();
            $table->string('PCF_RUE', 60)->nullable();
            $table->string('PCF_COMP', 60)->nullable();
            $table->string('PCF_ETAT', 100)->nullable();
            $table->string('PCF_REG', 100)->nullable();
            $table->string('PCF_CP', 10)->nullable();
            $table->string('PCF_VILLE', 200)->nullable();
            $table->string('PAY_CODE', 3)->nullable();
            $table->string('PCF_TEL1', 20)->nullable();
            $table->string('PCF_TEL2', 20)->nullable();
            $table->string('PCF_FAX', 20)->nullable();
            $table->string('PCF_TELEX', 10)->nullable();
            $table->string('PCF_EMAIL', 60)->nullable();
            $table->string('PCF_URL', 128)->nullable();
            $table->text('PCF_ADRMEM')->nullable();
            $table->boolean('PCF_NPAI')->nullable();
            $table->string('PCF_CBARAD', 30)->nullable();
            $table->string('PCF_APE', 5)->nullable();
            $table->string('PCF_CMPAPE', 100)->nullable();
            $table->string('PCF_STATUS', 15)->nullable();
            $table->string('PCF_INSC', 15)->nullable();
            $table->string('PCF_SIRET', 14)->nullable();
            $table->string('PCF_RCS', 200)->nullable();
            $table->string('PCF_SIREN', 9)->nullable();
            $table->dateTime('PCF_DATIMM')->nullable();
            $table->dateTime('PCF_DATRAD')->nullable();
            $table->string('PCF_NII', 14)->nullable();
            $table->string('PCF_ACCISE', 15)->nullable();
            $table->decimal('PCF_CAPITA', 20, 4)->nullable();
            $table->dateTime('PCF_DATCLO')->nullable();
            $table->string('PCF_CASOC', 15)->nullable();
            $table->string('PCF_EFF', 15)->nullable();
            $table->boolean('PCF_EN_TTC')->nullable();
            $table->boolean('PCF_BLOQUE')->nullable();
            $table->decimal('PCF_REMVAL', 8, 3)->nullable();
            $table->decimal('PCF_REMMIN', 20, 4)->nullable();
            $table->decimal('PCF_TX_RFA', 8, 3)->nullable();
            $table->decimal('PCF_TX_ESC', 8, 3)->nullable();
            $table->string('REP_CODE', 3)->nullable();
            $table->string('SRV_CODE', 3)->nullable();
            $table->string('DIV_CODE', 3)->nullable();
            $table->string('DEP_CODE', 3)->nullable();
            $table->string('PCF_LANGUE', 15)->nullable();
            $table->string('PCF_CBAR', 30)->nullable()->index('pcf_kcbar');
            $table->string('FC1_CODE', 15)->nullable();
            $table->string('FC2_CODE', 15)->nullable();
            $table->string('FC3_CODE', 15)->nullable();
            $table->string('FC4_CODE', 15)->nullable();
            $table->string('FC5_CODE', 15)->nullable();
            $table->string('PCF_URGENT', 1)->nullable();
            $table->string('TAR_CODE', 30)->nullable();
            $table->string('PCF_FPT_01', 3)->nullable();
            $table->string('PCF_FPT_02', 3)->nullable();
            $table->string('PCF_FPT_03', 3)->nullable();
            $table->boolean('PCF_EDIIRC')->nullable();
            $table->string('PCF_EDICOM', 350)->nullable();
            $table->boolean('PCF_CHORUS')->nullable();
            $table->string('PCF_CSCHRS', 100)->nullable();
            $table->string('PCF_NMCHRS', 50)->nullable();
            $table->string('CPT_NUMERO', 25)->nullable()->unique('pcf_knum');
            $table->string('NAT_CODE', 3)->nullable();
            $table->string('PCF_PAYEUR', 20)->nullable();
            $table->string('REG_CODE', 8)->nullable();
            $table->string('DEV_CODE', 3)->nullable();
            $table->string('PCF_TC_DA', 3)->nullable();
            $table->dateTime('PCF_FACTDT')->nullable();
            $table->string('PCF_FACTNO', 30)->nullable();
            $table->decimal('PCF_FACTMT', 20, 4)->nullable();
            $table->string('PCF_REGBL', 1)->nullable();
            $table->string('PCF_PERIOD', 15)->nullable();
            $table->string('PCF_EXCMDE', 1)->nullable();
            $table->string('PCF_EXBL', 1)->nullable();
            $table->string('PCF_EXFACT', 1)->nullable();
            $table->decimal('PCF_FRAIS', 20, 4)->nullable();
            $table->decimal('PCF_ENCMDE', 20, 4)->nullable();
            $table->decimal('PCF_ENLIVR', 20, 4)->nullable();
            $table->decimal('PCF_ENFACT', 20, 4)->nullable();
            $table->decimal('PCF_ENCMAX', 20, 4)->nullable();
            $table->decimal('PCF_ENCASS', 20, 4)->nullable();
            $table->string('PCF_RISQUE', 15)->nullable();
            $table->decimal('PCF_MT_REL', 20, 4)->nullable();
            $table->dateTime('PCF_DTCREE')->nullable();
            $table->string('PCF_USRCRE', 20)->nullable();
            $table->dateTime('PCF_DTMAJ')->nullable();
            $table->string('PCF_USRMAJ', 20)->nullable();
            $table->integer('PCF_NUMMAJ')->nullable();
            $table->text('PCF_MEMO')->nullable();
            $table->boolean('PCF_AFFMES')->nullable();
            $table->text('PCF_MESSAG')->nullable();
            $table->binary('PCF_IMAGE')->nullable();
            $table->string('PCF_FMTIMG')->nullable();
            $table->decimal('PCF_HAUSSE', 8, 3)->nullable();
            $table->dateTime('PCF_REGDT')->nullable();
            $table->decimal('PCF_REGMT', 20, 4)->nullable();
            $table->string('PCF_REGNO', 10)->nullable();
            $table->boolean('PCF_SYNOUT')->nullable();
            $table->dateTime('PCF_DTSOUT')->nullable();
            $table->string('PCF_OLDCOD', 20)->nullable();
            $table->string('PCF_RENPAR', 20)->nullable();
            $table->dateTime('PCF_RENLE')->nullable();
            $table->string('XXX_RESREG')->nullable();
            $table->string('XXX_TOUR', 60)->nullable();

            $table->index(['FAT_CODE', 'PCF_CODE'], 'pcf_kfat');
            $table->index(['SFT_CODE', 'PCF_CODE'], 'pcf_ksft');
            $table->unique(['PCF_TYPE', 'PCF_CODE'], 'pcf_ktcode');
            $table->unique(['PCF_TYPE', 'CPT_NUMERO'], 'pcf_ktnum');
            $table->index(['PCF_TYPE', 'PCF_RS'], 'pcf_ktrs');
            $table->index(['PCF_TYPE', 'PCF_DORT'], 'pcf_ktyped');
            $table->primary(['PCF_CODE'], 'pcf_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TIERS');
    }
};
