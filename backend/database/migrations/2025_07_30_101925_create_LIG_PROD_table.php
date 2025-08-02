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
        Schema::create('LIG_PROD', function (Blueprint $table) {
            $table->string('DOC_NUMERO', 10);
            $table->string('LIG_NUMERO', 5);
            $table->string('LIG_SUBNUM', 5);
            $table->integer('LIG_NIVEAU')->nullable();
            $table->string('PRD_CODE', 30)->nullable();
            $table->string('PRD_TYPE', 1)->nullable();
            $table->string('PRD_TSTOCK', 1)->nullable();
            $table->string('PRD_TSTCKA', 1)->nullable();
            $table->string('PRD_TGAMME', 10)->nullable();
            $table->string('PRD_GAMME', 35)->nullable();
            $table->string('PRD_TLOT', 1)->nullable();
            $table->string('PRD_NUMLOT', 25)->nullable();
            $table->dateTime('PRD_DT_FAB')->nullable();
            $table->boolean('PRD_PERIMA')->nullable();
            $table->dateTime('PRD_DT_PER')->nullable();
            $table->integer('PRD_DELCOM')->nullable();
            $table->integer('PRD_DREVIE')->nullable();
            $table->boolean('PRD_ALMIVI')->nullable();
            $table->float('PRD_QTE', 53, 0)->nullable();
            $table->float('PRD_QTETOT', 53, 0)->nullable();
            $table->decimal('PRD_COUT', 20, 4)->nullable();
            $table->decimal('PRD_COUTTOTAL', 20, 4)->nullable();
            $table->decimal('PRD_P_BASE', 20, 4)->nullable();
            $table->decimal('PRD_P_BRUT', 20, 4)->nullable();
            $table->string('PRD_REMISE', 30)->nullable();
            $table->string('TAR_CODE', 30)->nullable();
            $table->string('PRM_CODE', 10)->nullable();
            $table->decimal('PRD_PRIX', 20, 4)->nullable();
            $table->float('PRD_PRIXAU', 53, 0)->nullable();
            $table->boolean('PRD_IMP')->nullable();
            $table->string('PRD_LIB', 250)->nullable();
            $table->string('PRD_ZONE', 100)->nullable();
            $table->decimal('NAT_TVATX', 8, 3)->nullable();
            $table->string('NAT_TVATYP', 1)->nullable();
            $table->decimal('NAT_TPF1TX', 8, 3)->nullable();
            $table->string('NAT_TPF1SQ', 1)->nullable();
            $table->decimal('NAT_TPF1XT', 8, 3)->nullable();
            $table->string('NAT_TPF1ED', 15)->nullable();
            $table->decimal('NAT_TPF2TX', 8, 3)->nullable();
            $table->string('NAT_TPF2SQ', 1)->nullable();
            $table->decimal('NAT_TPF2XT', 8, 3)->nullable();
            $table->string('NAT_TPF2ED', 15)->nullable();
            $table->decimal('LIG_TPF_Q', 20, 4)->nullable();
            $table->float('LIG_MSUPPTPF1', 53, 0)->nullable();
            $table->float('LIG_MSUPPTPF2', 53, 0)->nullable();
            $table->float('PRD_Q_RSRV', 53, 0)->nullable();
            $table->dateTime('PRD_RVLE')->nullable();
            $table->string('PRD_RVPAR', 20)->nullable();
            $table->dateTime('PRD_RVALE')->nullable();
            $table->string('PRD_RVAPAR', 20)->nullable();

            $table->primary(['DOC_NUMERO', 'LIG_NUMERO', 'LIG_SUBNUM'], 'lig_pprod');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('LIG_PROD');
    }
};
