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
        Schema::create('ART_MVT', function (Blueprint $table) {
            $table->string('DOC_NUMERO', 10);
            $table->string('LIG_NUMERO', 5);
            $table->string('LIG_SUBNUM', 5);
            $table->string('MVT_TYPE', 1)->nullable();
            $table->string('MVT_TSTOCK', 1)->nullable();
            $table->boolean('MVT_CLOT')->nullable();
            $table->string('DOC_PIECE', 30)->nullable();
            $table->dateTime('DOC_DATE')->nullable();
            $table->string('DOC_ORIGIN', 10)->nullable();
            $table->string('DEP_CODE', 3)->nullable();
            $table->string('ART_CODE', 30)->nullable();
            $table->string('ART_GAMME', 35)->nullable();
            $table->string('ART_TGAMME', 10)->nullable();
            $table->boolean('MVT_NLOT')->nullable();
            $table->string('MVT_NUMLOT', 25);
            $table->string('MVT_CBAR', 30)->nullable();
            $table->dateTime('MVT_DT_FAB')->nullable();
            $table->boolean('MVT_PERIMA')->nullable();
            $table->dateTime('MVT_DT_PER')->nullable();
            $table->integer('MVT_DELCOM')->nullable();
            $table->integer('MVT_DREVIE')->nullable();
            $table->boolean('MVT_ALMIVI')->nullable();
            $table->boolean('MVT_NSERIE')->nullable();
            $table->string('MVT_UC', 15)->nullable();
            $table->float('MVT_COND', 53, 0)->nullable();
            $table->string('MVT_UB', 15)->nullable();
            $table->float('MVT_UCUV', 53, 0)->nullable();
            $table->string('MVT_ZONE', 100)->nullable();
            $table->string('MVT_DEPOT', 3)->nullable();
            $table->string('MVT_TPERTE', 15)->nullable();
            $table->string('MVT_TALTER', 15)->nullable();
            $table->float('MVT_INV', 53, 0)->nullable();
            $table->float('MVT_INVBEF', 53, 0)->nullable();
            $table->float('MVT_ENTREE', 53, 0)->nullable();
            $table->float('MVT_SORTIE', 53, 0)->nullable();
            $table->float('MVT_STOCK', 53, 0)->nullable();
            $table->float('MVT_PSTOCK', 53, 0)->nullable();
            $table->decimal('MVT_VALSTK', 20, 4)->nullable();
            $table->decimal('MVT_PVALST', 20, 4)->nullable();
            $table->float('MVT_PRIXAU', 53, 0)->nullable();
            $table->decimal('MVT_PMOYEN', 20, 4)->nullable();
            $table->decimal('MVT_PACH', 20, 4)->nullable();
            $table->decimal('MVT_PUMP', 20, 4)->nullable();
            $table->decimal('MVT_DPA', 20, 4)->nullable();
            $table->decimal('MVT_FILIFO', 20, 4)->nullable();
            $table->float('MVT_PMASTK', 53, 0)->nullable();
            $table->decimal('MVT_PMAPRX', 20, 4)->nullable();
            $table->integer('MVT_NSTOCK')->nullable();
            $table->string('SAL_CODE', 3)->nullable();
            $table->string('PRJ_CODE', 40)->nullable();
            $table->boolean('MVT_IMPAFE')->nullable();
            $table->boolean('MVT_IMPAFS')->nullable();
            $table->string('MVT_LIB', 40)->nullable();
            $table->float('MVA_STOCK', 53, 0)->nullable();
            $table->decimal('MVA_VALSTK', 20, 4)->nullable();
            $table->float('MVA_PSTOCK', 53, 0)->nullable();
            $table->float('MVA_PMASTK', 53, 0)->nullable();
            $table->decimal('MVA_PMAPRX', 20, 4)->nullable();
            $table->decimal('MVA_PMOYEN', 20, 4)->nullable();
            $table->float('MVT_QNTAER', 53, 0)->nullable();
            $table->float('MVT_QNRAER', 53, 0)->nullable();
            $table->string('MVT_NMCDEP', 3)->nullable();
            $table->boolean('MVT_NMCDPM')->nullable();
            $table->float('MVT_NMCQTE', 53, 0)->nullable();
            $table->string('MVT_NMCART', 30)->nullable();
            $table->string('MVT_NMCPRD', 3)->nullable();
            $table->decimal('MVT_NMCPRV', 20, 4)->nullable();
            $table->string('MVT_MJSASS', 3)->nullable();
            $table->boolean('MVT_PRDPRM')->nullable();
            $table->boolean('MVT_PRDPVM')->nullable();
            $table->decimal('MVT_PRDPRIX', 20, 4)->nullable();
            $table->boolean('MVT_PRDIMP')->nullable();
            $table->string('MVT_NICCOA', 10)->nullable();
            $table->string('MVT_NPCCOA', 30)->nullable();
            $table->string('MVT_NLCCOA', 5)->nullable();

            $table->index(['ART_CODE', 'DEP_CODE', 'ART_GAMME', 'MVT_NUMLOT', 'DOC_DATE', 'DOC_ORIGIN', 'LIG_NUMERO', 'LIG_SUBNUM'], 'mvt_kart');
            $table->index(['ART_CODE', 'MVT_NUMLOT', 'DOC_DATE', 'DOC_ORIGIN', 'LIG_NUMERO', 'LIG_SUBNUM'], 'mvt_kart2');
            $table->index(['MVT_CLOT', 'ART_CODE'], 'mvt_kca');
            $table->index(['MVT_CLOT', 'ART_CODE', 'MVT_NUMLOT'], 'mvt_kcal');
            $table->index(['MVT_CLOT', 'DEP_CODE', 'ART_CODE', 'MVT_NUMLOT'], 'mvt_kcdal');
            $table->index(['DEP_CODE', 'ART_CODE', 'DOC_DATE'], 'mvt_kdad');
            $table->index(['DEP_CODE', 'ART_CODE', 'MVT_NUMLOT'], 'mvt_kdal');
            $table->index(['DEP_CODE', 'ART_CODE', 'MVT_NUMLOT', 'DOC_DATE'], 'mvt_kdald');
            $table->index(['DEP_CODE', 'ART_CODE', 'MVT_TYPE', 'DOC_DATE'], 'mvt_kdatd');
            $table->index(['DEP_CODE', 'ART_CODE', 'ART_GAMME', 'MVT_NUMLOT', 'DOC_DATE', 'DOC_ORIGIN'], 'mvt_kdepot');
            $table->primary(['DOC_NUMERO', 'LIG_NUMERO', 'LIG_SUBNUM', 'MVT_NUMLOT'], 'mvt_pdoc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ART_MVT');
    }
};
