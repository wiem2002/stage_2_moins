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
        Schema::create('SOC_GESTION', function (Blueprint $table) {
            $table->string('SOC_BASE', 100);
            $table->boolean('SOC_ARTCOD')->nullable();
            $table->integer('SOC_ARTLGT')->nullable();
            $table->integer('SOC_ARTLGP')->nullable();
            $table->string('SOC_ARTFND', 7)->nullable();
            $table->string('SOC_ARTPCB', 6)->nullable();
            $table->string('ART_TYPE', 1)->nullable();
            $table->string('ART_CATEG', 1)->nullable();
            $table->boolean('SOC_PRENDU')->nullable();
            $table->string('SOC_UC_REF', 15)->nullable();
            $table->string('ART_STOCK', 1)->nullable();
            $table->string('ART_STOCKN', 1)->nullable();
            $table->string('SOC_M_PRV', 1)->nullable();
            $table->string('SOC_I_PRV', 1)->nullable();
            $table->string('SOC_S_PRV', 1)->nullable();
            $table->string('SOC_D_PRV', 1)->nullable();
            $table->string('SOC_FMTPDS', 20)->nullable();
            $table->string('SOC_LIBELLETPF1', 9)->nullable();
            $table->integer('SOC_PRORATATPF1')->nullable();
            $table->string('SOC_LIBELLETPF2', 9)->nullable();
            $table->integer('SOC_PRORATATPF2')->nullable();
            $table->string('DEP_CODE', 3)->nullable();
            $table->string('SOC_S_DEPA', 3)->nullable();
            $table->string('SOC_NEGSTK', 1)->nullable();
            $table->boolean('SOC_CSTCF')->nullable();
            $table->boolean('SOC_CSTCCA')->nullable();
            $table->boolean('SOC_CSTCCC')->nullable();
            $table->boolean('SOC_USTOCK')->nullable();
            $table->boolean('SOC_LCSNSH')->nullable();
            $table->boolean('SOC_QMPSPS')->nullable();
            $table->boolean('SOC_ALPAVS')->nullable();
            $table->integer('SOC_DELCOM')->nullable();
            $table->string('SOC_TRTCOM', 9)->nullable();
            $table->boolean('SOC_AALAVS')->nullable();
            $table->boolean('SOC_TPCAAL')->nullable();
            $table->boolean('SOC_ILPDAA')->nullable();
            $table->boolean('SOC_ICLSDF')->nullable();
            $table->boolean('SOC_R_LOT')->nullable();
            $table->string('SOC_PCFCOD', 2)->nullable();
            $table->integer('SOC_PCFLGT')->nullable();
            $table->integer('SOC_PCFLGP')->nullable();
            $table->string('SOC_PCFCPT', 1)->nullable();
            $table->string('SOC_PCFFND', 3)->nullable();
            $table->string('SOC_VPORT', 3)->nullable();
            $table->string('SOC_APORT', 3)->nullable();
            $table->string('SOC_VFRAIS', 3)->nullable();
            $table->string('SOC_AFRAIS', 3)->nullable();
            $table->decimal('SOC_ENCMAX', 20, 4)->nullable();
            $table->decimal('SOC_ENCASS', 20, 4)->nullable();
            $table->string('SOC_DEFENCOURS', 2)->nullable();
            $table->string('SOC_BLOQENCOURS', 2)->nullable();
            $table->boolean('SOC_ENCECH')->nullable();
            $table->decimal('SOC_MINCMD', 20, 4)->nullable();
            $table->boolean('SOC_GEAUAD')->nullable();
            $table->string('SOC_CLGOMA', 86)->nullable();
            $table->boolean('SOC_DOCNEG')->nullable();
            $table->string('SOC_V_SLIB', 4)->nullable();
            $table->boolean('SOC_IMDIT')->nullable();
            $table->boolean('SOC_DOCCMA')->nullable();
            $table->boolean('SOC_ROUND_LIG_TOTAL')->nullable();
            $table->boolean('SOC_MABRQO')->nullable();
            $table->boolean('SOC_GTCLI')->nullable();
            $table->boolean('SOC_GT_REC')->nullable();
            $table->boolean('SOC_DGPQTMO')->nullable();
            $table->boolean('SOC_INTESC')->nullable();
            $table->decimal('SOC_TX_ESC', 8, 3)->nullable();
            $table->integer('SOC_ABTLIM')->nullable();
            $table->boolean('SOC_EDI')->nullable();
            $table->boolean('SOC_EDIIML')->nullable();
            $table->boolean('SOC_EDIISP')->nullable();
            $table->boolean('SOC_HT_TTC')->nullable();
            $table->boolean('SOC_PCNFNC')->nullable();
            $table->string('SOC_V_TYPE', 1)->nullable();
            $table->string('SOC_V_MOD', 1)->nullable();
            $table->boolean('SOC_MCUVPM')->nullable();
            $table->boolean('SOC_MAIV')->nullable();
            $table->boolean('SOC_V_HT')->nullable();
            $table->boolean('SOC_V_CAO')->nullable();
            $table->boolean('SOC_V_ACR')->nullable();
            $table->boolean('SOC_V_DACR')->nullable();
            $table->boolean('SOC_V_WEEK')->nullable();
            $table->boolean('SOC_V_LIV')->nullable();
            $table->boolean('SOC_DTLVMD')->nullable();
            $table->integer('SOC_VDELAI')->nullable();
            $table->float('SOC_VALERT', 53, 0)->nullable();
            $table->boolean('SOC_V_PRV')->nullable();
            $table->boolean('SOC_V_PRL')->nullable();
            $table->string('SOC_V_CVIR', 1)->nullable();
            $table->boolean('SOC_V_RAGP')->nullable();
            $table->boolean('SOC_V_ANA')->nullable();
            $table->boolean('SOC_V_ANC')->nullable();
            $table->boolean('SOC_V_ANAF')->nullable();
            $table->string('SOC_SERVRE', 1)->nullable();
            $table->string('SOC_SERVAU', 1)->nullable();
            $table->boolean('SOC_RASCMD')->nullable();
            $table->boolean('SOC_AMASTI')->nullable();
            $table->string('SOC_CSTAAM', 2)->nullable();
            $table->string('SOC_CDVCDA', 1)->nullable();
            $table->string('SOC_VAFOBL', 1)->nullable();
            $table->string('SOC_A_TYPE', 1)->nullable();
            $table->string('SOC_A_MOD', 1)->nullable();
            $table->boolean('SOC_MCUAPM')->nullable();
            $table->boolean('SOC_MAIA')->nullable();
            $table->boolean('SOC_A_HT')->nullable();
            $table->boolean('SOC_A_WEEK')->nullable();
            $table->boolean('SOC_A_LIV')->nullable();
            $table->boolean('SOC_DTRPMD')->nullable();
            $table->integer('SOC_ADELAI')->nullable();
            $table->boolean('SOC_A_RAGP')->nullable();
            $table->boolean('SOC_A_ANA')->nullable();
            $table->boolean('SOC_A_ANC')->nullable();
            $table->boolean('SOC_A_ANAF')->nullable();
            $table->string('SOC_SERARE', 1)->nullable();
            $table->string('SOC_SERAAU', 1)->nullable();
            $table->string('SOC_CDACDA', 1)->nullable();
            $table->string('SOC_CARDBA', 1)->nullable();
            $table->string('SOC_AAFOBL', 1)->nullable();
            $table->boolean('SOC_CHK_BUD')->nullable();
            $table->integer('SOC_BUD_SEUIL')->nullable();
            $table->boolean('SOC_BUD_BLK')->nullable();
            $table->boolean('SOC_BUD_TTC')->nullable();
            $table->text('SOC_CNDESC')->nullable();
            $table->text('SOC_CNDPEN')->nullable();
            $table->string('SOC_PRJCOD', 2)->nullable();
            $table->integer('SOC_PRJLGT')->nullable();
            $table->integer('SOC_PRJLGP')->nullable();
            $table->boolean('SOC_PRJSA')->nullable();
            $table->string('SOC_ANAPLA', 25)->nullable();

            $table->primary(['SOC_BASE'], 'soc_pbaseg');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SOC_GESTION');
    }
};
