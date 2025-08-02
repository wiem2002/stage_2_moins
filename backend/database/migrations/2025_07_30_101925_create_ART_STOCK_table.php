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
        Schema::create('ART_STOCK', function (Blueprint $table) {
            $table->string('DEP_CODE', 3);
            $table->string('ART_CODE', 30);
            $table->string('ART_GAMME', 35);
            $table->string('STK_NUMLOT', 25);
            $table->string('STK_ZONE', 100)->nullable();
            $table->float('STK_INV', 53, 0)->nullable();
            $table->dateTime('STK_DTINV')->nullable();
            $table->dateTime('STK_DTINVT')->nullable();
            $table->string('STK_EXSINV', 1)->nullable();
            $table->string('STK_SELALE', 1)->nullable();
            $table->float('STK_ENTREE', 53, 0)->nullable();
            $table->float('STK_SORTIE', 53, 0)->nullable();
            $table->float('STK_PERTES', 53, 0)->nullable();
            $table->float('STK_ALTERA', 53, 0)->nullable();
            $table->float('STK_REEL', 53, 0)->nullable();
            $table->float('STK_COMPTA', 53, 0)->nullable();
            $table->float('STK_RESDEV', 53, 0)->nullable();
            $table->float('STK_RESCMD', 53, 0)->nullable();
            $table->float('STK_CMDFRS', 53, 0)->nullable();
            $table->float('STK_CMDCLI', 53, 0)->nullable();
            $table->float('STK_CMDCLA', 53, 0)->nullable();
            $table->float('STK_CMDCLC', 53, 0)->nullable();
            $table->float('STK_PRET', 53, 0)->nullable();
            $table->float('STK_SAV', 53, 0)->nullable();
            $table->float('STK_MINI', 53, 0)->nullable();
            $table->float('STK_SEUIL', 53, 0)->nullable();
            $table->float('STK_MAXI', 53, 0)->nullable();
            $table->decimal('STK_P_PRV', 20, 4)->nullable();
            $table->string('STK_CBRLOT', 30)->nullable();
            $table->dateTime('STK_DT_LOT')->nullable();
            $table->dateTime('STK_DT_FAB')->nullable();
            $table->dateTime('STK_DT_PER')->nullable();
            $table->integer('STK_DREVIE')->nullable();
            $table->boolean('STK_ALMIVI')->nullable();

            $table->unique(['ART_CODE', 'DEP_CODE', 'ART_GAMME', 'STK_NUMLOT'], 'stk_kart');
            $table->primary(['DEP_CODE', 'ART_CODE', 'ART_GAMME', 'STK_NUMLOT'], 'stk_pdep');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ART_STOCK');
    }
};
