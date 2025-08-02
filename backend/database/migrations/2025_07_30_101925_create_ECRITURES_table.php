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
        Schema::create('ECRITURES', function (Blueprint $table) {
            $table->string('ECR_NUMERO', 10);
            $table->string('JRN_CODE', 10)->nullable()->index('ecr_kjrnc');
            $table->dateTime('ECR_DATE')->nullable();
            $table->string('ECR_ORDRE', 10)->nullable();
            $table->string('ECR_COMPTE', 25)->nullable();
            $table->string('ECR_CPTGEN', 25)->nullable();
            $table->string('ECR_PIECE', 30)->nullable();
            $table->string('ECR_PIECE2', 60)->nullable();
            $table->dateTime('ECR_DT_PIE')->nullable();
            $table->string('ECR_LIBA', 15)->nullable();
            $table->string('ECR_LIB', 60)->nullable();
            $table->string('ECR_REFERE', 60)->nullable();
            $table->float('ECR_QTE', 53, 0)->nullable();
            $table->decimal('ECR_D_DEV', 20, 4)->nullable();
            $table->decimal('ECR_C_DEV', 20, 4)->nullable();
            $table->string('DEV_CODE', 3)->nullable();
            $table->float('DEV_COURS', 53, 0)->nullable();
            $table->decimal('ECR_DEBIT', 20, 4)->nullable();
            $table->decimal('ECR_CREDIT', 20, 4)->nullable();
            $table->decimal('ECR_D_EURO', 20, 4)->nullable();
            $table->decimal('ECR_C_EURO', 20, 4)->nullable();
            $table->dateTime('ECR_DT_VAL')->nullable();
            $table->dateTime('ECR_DT_BQE')->nullable();
            $table->string('REG_CODE', 8)->nullable();
            $table->dateTime('ECR_DT_ECH')->nullable();
            $table->boolean('ECR_MULECH')->nullable();
            $table->boolean('ECR_ANA')->nullable();
            $table->string('SAL_CODE', 3)->nullable();
            $table->string('ECR_LETTRE', 3)->nullable();
            $table->boolean('ECR_LETSUP')->nullable();
            $table->dateTime('ECR_LETLE')->nullable();
            $table->string('ECR_LETPAR', 20)->nullable();
            $table->string('RBQ_IDENT', 15)->nullable();
            $table->dateTime('ECR_DT_RLV')->nullable();
            $table->dateTime('ECR_PTLE')->nullable();
            $table->string('ECR_PTPAR', 15)->nullable();
            $table->string('ECR_PTTYP', 1)->nullable();
            $table->string('TVA_NUMERO', 10)->nullable();
            $table->string('TVR_NUMERO', 4)->nullable();
            $table->string('ECR_TVR_BP', 1)->nullable();
            $table->string('ECR_TVAXPR', 15)->nullable();
            $table->string('IMO_CODE', 15)->nullable();
            $table->boolean('ECR_VLDEE')->nullable();
            $table->dateTime('ECR_VLDLE')->nullable();
            $table->string('ECR_VLDPAR', 20)->nullable();
            $table->boolean('ECR_REPCLO')->nullable();
            $table->boolean('ECR_SIMUL')->nullable();
            $table->boolean('ECR_CVS')->nullable();
            $table->string('ECR_REORG', 10)->nullable();
            $table->string('ECR_NUMCTR', 10)->nullable();
            $table->string('ECR_CONTRE', 25)->nullable();
            $table->string('ECR_NUMORI', 10)->nullable();
            $table->dateTime('ECR_DTORIG')->nullable();
            $table->dateTime('ECR_DT_CRE')->nullable();
            $table->string('ECR_USRCRE', 20)->nullable();
            $table->string('ECR_TYPCRE', 3)->nullable();
            $table->dateTime('ECR_DTMAJ')->nullable();
            $table->string('ECR_USRMAJ', 20)->nullable();
            $table->integer('ECR_NUMMAJ')->nullable();
            $table->string('ECR_CLEINA', 300)->nullable();
            $table->string('XXX_DOC')->nullable();
            $table->boolean('XXX_EXPERT')->nullable();

            $table->index(['ECR_COMPTE', 'ECR_DATE', 'ECR_DT_RLV', 'ECR_SIMUL', 'ECR_REPCLO'], 'ecr_kcdrsc');
            $table->index(['ECR_COMPTE', 'ECR_DATE', 'ECR_SIMUL', 'ECR_REPCLO'], 'ecr_kcdsc');
            $table->index(['ECR_COMPTE', 'JRN_CODE', 'ECR_DATE'], 'ecr_kcjd');
            $table->index(['ECR_COMPTE', 'ECR_DATE'], 'ecr_kcpt');
            $table->index(['ECR_CPTGEN', 'ECR_DATE'], 'ecr_kcptg');
            $table->index(['JRN_CODE', 'ECR_COMPTE', 'ECR_DATE'], 'ecr_kjcd');
            $table->index(['JRN_CODE', 'ECR_DATE'], 'ecr_kjrnd');
            $table->index(['ECR_PIECE', 'JRN_CODE'], 'ecr_kpiece');
            $table->primary(['ECR_NUMERO'], 'ecr_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ECRITURES');
    }
};
