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
        Schema::create('ARTICLES', function (Blueprint $table) {
            $table->string('ART_CODE', 30);
            $table->string('ART_LIB', 250)->nullable();
            $table->string('ART_TGAMME', 10)->nullable();
            $table->boolean('ART_DORT')->nullable()->index('art_kdort');
            $table->string('FAR_CODE', 10)->nullable();
            $table->string('ART_FARNAT', 10)->nullable();
            $table->string('SFA_CODE', 10)->nullable();
            $table->string('ART_SFANAT', 10)->nullable();
            $table->string('ART_TYPE', 1)->nullable();
            $table->string('ART_CATEG', 1)->nullable();
            $table->float('ART_QTEDFT', 53, 0)->nullable();
            $table->float('ART_PRIXAU', 53, 0)->nullable();
            $table->string('ART_T_APP', 15)->nullable();
            $table->decimal('ART_F_APP', 20, 4)->nullable();
            $table->string('ART_T_APP2', 15)->nullable();
            $table->decimal('ART_F_APP2', 20, 4)->nullable();
            $table->string('ART_T_APP3', 15)->nullable();
            $table->decimal('ART_F_APP3', 20, 4)->nullable();
            $table->string('ART_T_ACH', 15)->nullable();
            $table->decimal('ART_F_ACH', 20, 4)->nullable();
            $table->string('ART_T_ACH2', 15)->nullable();
            $table->decimal('ART_F_ACH2', 20, 4)->nullable();
            $table->string('ART_T_ACH3', 15)->nullable();
            $table->decimal('ART_F_ACH3', 20, 4)->nullable();
            $table->string('ART_M_PRV', 1)->nullable();
            $table->string('ART_I_PRV', 1)->nullable();
            $table->float('ART_V_ARR', 53, 0)->nullable();
            $table->string('ART_T_ARR', 1)->nullable();
            $table->decimal('ART_REMMAX', 20, 4)->nullable();
            $table->boolean('ART_RMXDOC')->nullable();
            $table->string('ART_TRENDU', 15)->nullable();
            $table->decimal('ART_FRENDU', 20, 4)->nullable();
            $table->decimal('ART_P_ACH', 20, 4)->nullable();
            $table->decimal('ART_P_PRV', 20, 4)->nullable();
            $table->float('ART_P_COEF', 53, 0)->nullable();
            $table->decimal('ART_P_VTEB', 20, 4)->nullable();
            $table->decimal('ART_P_VTE', 20, 4)->nullable();
            $table->decimal('ART_P_EURO', 20, 4)->nullable();
            $table->string('ART_LIBC', 20)->nullable()->index('art_klib');
            $table->string('ART_CBAR', 30)->nullable()->unique('art_kcbar');
            $table->string('ART_REF', 30)->nullable()->unique('art_kref');
            $table->string('ART_NII', 14)->nullable();
            $table->string('ART_MFACT', 1)->nullable();
            $table->string('ART_MACHAT', 1)->nullable();
            $table->integer('ART_DELAI')->nullable();
            $table->string('ART_CONSIG', 30)->nullable();
            $table->string('GAR_CODE', 3)->nullable();
            $table->string('FA1_CODE', 15)->nullable();
            $table->string('FA2_CODE', 15)->nullable();
            $table->string('FA3_CODE', 15)->nullable();
            $table->string('FA4_CODE', 15)->nullable();
            $table->string('FA5_CODE', 15)->nullable();
            $table->boolean('ART_NIMP')->nullable();
            $table->boolean('ART_NSTAT')->nullable();
            $table->boolean('ART_NCOM')->nullable();
            $table->boolean('ART_CONTRM')->nullable();
            $table->boolean('ART_INTV')->nullable();
            $table->boolean('ART_INTA')->nullable();
            $table->float('ART_MSUPPTPF1', 53, 0)->nullable();
            $table->float('ART_MSUPPTPF2', 53, 0)->nullable();
            $table->string('ART_UC_ACH', 15)->nullable();
            $table->float('ART_CD_ACH', 53, 0)->nullable();
            $table->string('ART_UB_ACH', 15)->nullable();
            $table->string('ART_UC_STK', 15)->nullable();
            $table->float('ART_CD_STK', 53, 0)->nullable();
            $table->string('ART_UB_STK', 15)->nullable();
            $table->string('ART_UC_VTE', 15)->nullable();
            $table->float('ART_CD_VTE', 53, 0)->nullable();
            $table->string('ART_UB_VTE', 15)->nullable();
            $table->float('ART_R_UAUV', 53, 0)->nullable();
            $table->float('ART_R_USUV', 53, 0)->nullable();
            $table->float('ART_NCOLIS', 53, 0)->nullable();
            $table->float('ART_POIDSN', 53, 0)->nullable();
            $table->float('ART_POIDST', 53, 0)->nullable();
            $table->float('ART_POIDSB', 53, 0)->nullable();
            $table->float('ART_LONG', 53, 0)->nullable();
            $table->float('ART_LARG', 53, 0)->nullable();
            $table->float('ART_HAUT', 53, 0)->nullable();
            $table->float('ART_VOLUME', 53, 0)->nullable();
            $table->boolean('ART_PACHUB')->nullable();
            $table->boolean('ART_PVTEUB')->nullable();
            $table->boolean('ART_PV_MAN')->nullable();
            $table->string('ART_STOCK', 1)->nullable();
            $table->string('ART_TLOT', 1)->nullable();
            $table->boolean('ART_LCSNSH')->nullable();
            $table->boolean('ART_PERIMA')->nullable();
            $table->integer('ART_DELCOM')->nullable();
            $table->string('ART_S_PRV', 1)->nullable();
            $table->string('ART_D_PRV', 1)->nullable();
            $table->string('ART_GROUPE', 10)->nullable()->index('art_kgroup');
            $table->string('ART_REMPL', 30)->nullable();
            $table->boolean('ART_AUCFS')->nullable();
            $table->text('ART_MEMO')->nullable();
            $table->boolean('ART_AFFMES')->nullable();
            $table->text('ART_MESSAG')->nullable();
            $table->binary('ART_IMAGE')->nullable();
            $table->string('ART_FMTIMG')->nullable();
            $table->dateTime('ART_DTCREE')->nullable();
            $table->string('ART_USRCRE', 20)->nullable();
            $table->dateTime('ART_DTMAJ')->nullable();
            $table->string('ART_USRMAJ', 20)->nullable();
            $table->integer('ART_NUMMAJ')->nullable();
            $table->string('ART_OLDCOD', 30)->nullable();
            $table->string('ART_RENPAR', 20)->nullable();
            $table->dateTime('ART_RENLE')->nullable();
            $table->string('PCF_CODE', 20)->nullable();
            $table->string('XXX_CLI', 20)->nullable();
            $table->boolean('XXX_MAT')->nullable();
            $table->string('XXX_NSERIE', 20)->nullable();

            $table->index(['FAR_CODE', 'ART_CODE'], 'art_kfar');
            $table->index(['SFA_CODE', 'ART_CODE'], 'art_ksfa');
            $table->primary(['ART_CODE'], 'art_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ARTICLES');
    }
};
