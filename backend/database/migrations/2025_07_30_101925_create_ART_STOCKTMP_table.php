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
        Schema::create('ART_STOCKTMP', function (Blueprint $table) {
            $table->string('DOC_NUMERO', 10);
            $table->string('DEP_CODE', 3)->index('stk_kdepot');
            $table->string('ART_CODE', 30);
            $table->string('ART_GAMME', 35);
            $table->string('STK_NUMLOT', 25);
            $table->string('STK_CBRLOT', 30)->nullable();
            $table->float('STK_INV', 53, 0)->nullable();
            $table->float('STK_ENTREE', 53, 0)->nullable();
            $table->float('STK_SORTIE', 53, 0)->nullable();
            $table->float('STK_REEL', 53, 0)->nullable();
            $table->float('STK_COMPTA', 53, 0)->nullable();
            $table->float('STK_PERTES', 53, 0)->nullable();
            $table->float('STK_SAV', 53, 0)->nullable();
            $table->float('STK_PRET', 53, 0)->nullable();
            $table->float('STK_RESDEV', 53, 0)->nullable();
            $table->float('STK_CMDFRS', 53, 0)->nullable();
            $table->float('STK_CMDCLI', 53, 0)->nullable();
            $table->float('STK_CMDCLA', 53, 0)->nullable();
            $table->float('STK_CMDCLC', 53, 0)->nullable();
            $table->float('STK_RESCMD', 53, 0)->nullable();
            $table->float('STK_ALTERA', 53, 0)->nullable();

            $table->primary(['DOC_NUMERO', 'DEP_CODE', 'ART_CODE', 'ART_GAMME', 'STK_NUMLOT'], 'stk_pdoc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ART_STOCKTMP');
    }
};
