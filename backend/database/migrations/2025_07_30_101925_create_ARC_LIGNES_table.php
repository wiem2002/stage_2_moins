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
        Schema::create('ARC_LIGNES', function (Blueprint $table) {
            $table->string('DOC_NUMERO', 10)->index('alg_kdoc');
            $table->string('LIG_NUMERO', 5);
            $table->string('LIG_SUBNUM', 5);
            $table->string('LIG_TYPE', 1)->nullable();
            $table->string('ART_CODE', 30)->nullable()->index('alg_kart');
            $table->string('ART_TGAMME', 10)->nullable();
            $table->string('ART_GAMME', 35)->nullable();
            $table->string('ART_REFFRS', 30)->nullable();
            $table->string('ART_REFCLI', 30)->nullable();
            $table->string('LIG_LIB', 1000)->nullable();
            $table->float('LIG_QTE', 53, 0)->nullable();
            $table->float('LIG_Q_CMDE', 53, 0)->nullable();
            $table->float('LIG_Q_RSRV', 53, 0)->nullable();
            $table->float('LIG_Q_REL', 53, 0)->nullable();
            $table->float('LIG_Q_LIVR', 53, 0)->nullable();
            $table->float('LIG_Q_FACT', 53, 0)->nullable();
            $table->decimal('LIG_P_BASE', 20, 4)->nullable();
            $table->decimal('LIG_FRENDU', 20, 4)->nullable();
            $table->decimal('LIG_P_BRUT', 20, 4)->nullable();
            $table->decimal('LIG_P_BRUI', 20, 4)->nullable();
            $table->string('LIG_REMISE', 30)->nullable();
            $table->string('LIG_REMISI', 30)->nullable();
            $table->decimal('LIG_P_NET', 20, 4)->nullable();
            $table->decimal('LIG_P_NETI', 20, 4)->nullable();
            $table->decimal('LIG_TOTAL', 20, 4)->nullable();
            $table->string('LIG_GP', 1)->nullable();
            $table->string('TAR_CODE', 30)->nullable();
            $table->string('LIG_GTRET', 30)->nullable();
            $table->string('LIG_CMTLGT', 200)->nullable();
            $table->string('LIG_CMSLGT', 200)->nullable();
            $table->string('PRM_CODE', 10)->nullable();
            $table->string('LIG_CMTLPM', 200)->nullable();
            $table->boolean('LIG_P_SAIM')->nullable();
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
            $table->decimal('LIG_P_PRV', 20, 4)->nullable();
            $table->float('LIG_COEF', 53, 0)->nullable();
            $table->decimal('LIG_FRAIS', 20, 4)->nullable();
            $table->decimal('LIG_FRAIS2', 20, 4)->nullable();
            $table->decimal('LIG_FRAIS3', 20, 4)->nullable();
            $table->decimal('LIG_FRAPP', 20, 4)->nullable();
            $table->decimal('LIG_DOUANE', 20, 4)->nullable();
            $table->decimal('LIG_COUT', 20, 4)->nullable();
            $table->float('LIG_LONG', 53, 0)->nullable();
            $table->float('LIG_LARG', 53, 0)->nullable();
            $table->float('LIG_SURFAC', 53, 0)->nullable();
            $table->float('LIG_HAUT', 53, 0)->nullable();
            $table->float('LIG_VOLUME', 53, 0)->nullable();
            $table->float('LIG_VOLUTE', 53, 0)->nullable();
            $table->float('LIG_POIDSB', 53, 0)->nullable();
            $table->float('LIG_POIDST', 53, 0)->nullable();
            $table->float('LIG_POIDSN', 53, 0)->nullable();
            $table->float('LIG_POIDS', 53, 0)->nullable();
            $table->float('ART_NCOLIS', 53, 0)->nullable();
            $table->float('LIG_NCOLIS', 53, 0)->nullable();
            $table->string('LIG_MFACT', 1)->nullable();
            $table->string('LIG_UC', 15)->nullable();
            $table->float('LIG_COND', 53, 0)->nullable();
            $table->string('LIG_UB', 15)->nullable();
            $table->float('LIG_R_UCUV', 53, 0)->nullable();
            $table->boolean('LIG_PRIXUB')->nullable();
            $table->boolean('LIG_CONDUS')->nullable();
            $table->float('LIG_PRIXAU', 53, 0)->nullable();
            $table->string('LIG_TSTOCK', 1)->nullable();
            $table->string('LIG_ZONE', 100)->nullable();
            $table->boolean('LIG_NLOT')->nullable();
            $table->string('LIG_NUMLOT', 25)->nullable();
            $table->dateTime('LIG_DT_FAB')->nullable();
            $table->boolean('LIG_PERIMA')->nullable();
            $table->dateTime('LIG_DT_PER')->nullable();
            $table->integer('LIG_DELCOM')->nullable();
            $table->integer('LIG_DREVIE')->nullable();
            $table->boolean('LIG_ALMIVI')->nullable();
            $table->boolean('LIG_NSERIE')->nullable();
            $table->dateTime('LIG_RVLE')->nullable();
            $table->string('LIG_RVPAR', 20)->nullable();
            $table->dateTime('LIG_RVALE')->nullable();
            $table->string('LIG_RVAPAR', 20)->nullable();
            $table->string('LIG_FOURN', 20)->nullable();
            $table->decimal('LIG_P_ACH', 20, 4)->nullable();
            $table->string('LIG_DEVACH', 3)->nullable();
            $table->float('LIG_CDVACH', 53, 0)->nullable();
            $table->boolean('LIG_PACHUB')->nullable();
            $table->string('LIG_CNDACH', 100)->nullable();
            $table->string('PRJ_CODE', 40)->nullable();
            $table->string('REP_CODE', 3)->nullable();
            $table->float('REP_TX_COM', 53, 0)->nullable();
            $table->string('SAL_CODE', 3)->nullable();
            $table->float('SAL_TX_COM', 53, 0)->nullable();
            $table->boolean('LIG_TRANSF')->nullable();
            $table->string('LIG_DOCORI', 22)->nullable();
            $table->dateTime('LIG_DT_CMD')->nullable();
            $table->string('LIG_N_CMD', 30)->nullable();
            $table->dateTime('LIG_DT_LIV')->nullable();
            $table->string('LIG_N_LIV', 30)->nullable();
            $table->dateTime('LIG_DT_FAC')->nullable();
            $table->string('LIG_N_FAC', 30)->nullable();
            $table->string('LIG_N_LIEN', 10)->nullable();
            $table->string('LIG_L_LIEN', 5)->nullable();
            $table->integer('LIG_CONTRME')->nullable();
            $table->string('LIG_CONTRMR', 22)->nullable();
            $table->string('DEP_CODE', 3)->nullable();
            $table->string('LIG_NIAGCC', 10)->nullable();
            $table->string('LIG_NPAGCC', 30)->nullable();
            $table->string('LIG_NLAGCC', 5)->nullable();
            $table->float('LIG_EDICMD', 53, 0)->nullable();
            $table->string('LIG_EDINLC', 6)->nullable();
            $table->float('LIG_EDIQC', 53, 0)->nullable();
            $table->decimal('LIG_EDIPUC', 20, 4)->nullable();
            $table->decimal('LIG_EDIPTC', 20, 4)->nullable();
            $table->text('LIG_EDICLC')->nullable();
            $table->text('LIG_MEMO')->nullable();
            $table->dateTime('LIG_DTCRE')->nullable();
            $table->string('LIG_USRCRE', 20)->nullable();
            $table->dateTime('LIG_DTMAJ')->nullable();
            $table->string('LIG_USRMAJ', 20)->nullable();
            $table->integer('LIG_NUMMAJ')->nullable();
            $table->string('XXX_CLI', 20)->nullable();

            $table->index(['PRJ_CODE', 'DOC_NUMERO'], 'alg_kprj');
            $table->primary(['DOC_NUMERO', 'LIG_NUMERO', 'LIG_SUBNUM'], 'alg_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ARC_LIGNES');
    }
};
