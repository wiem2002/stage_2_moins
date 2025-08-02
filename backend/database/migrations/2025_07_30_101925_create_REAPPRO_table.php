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
        Schema::create('REAPPRO', function (Blueprint $table) {
            $table->string('ART_CODE', 30);
            $table->string('ART_GAMME', 35);
            $table->string('LIG_NUMLOT', 25);
            $table->string('LIG_CBRLOT', 30)->nullable();
            $table->string('DEP_CODE', 3);
            $table->string('DOC_NUMERO', 10);
            $table->string('LIG_NUMERO', 5);
            $table->float('LIG_QTE', 53, 0)->nullable();
            $table->string('PCF_CODE', 20)->nullable();
            $table->string('ART_REFFRS', 30)->nullable();
            $table->float('LIG_Q_CMDE', 53, 0)->nullable();
            $table->string('ART_UC_ACH', 15)->nullable();
            $table->float('ART_CD_ACH', 53, 0)->nullable();
            $table->string('ART_UB_ACH', 15)->nullable();
            $table->float('ART_R_UAUV', 53, 0)->nullable();
            $table->boolean('ART_PACHUB')->nullable();
            $table->string('DEV_CODE', 3)->nullable();
            $table->decimal('ART_P_ACH', 20, 4)->nullable();
            $table->string('ART_REMISE', 30)->nullable();
            $table->decimal('ART_P_VTE', 20, 4)->nullable();
            $table->integer('ART_DELAI')->nullable();

            $table->primary(['ART_CODE', 'ART_GAMME', 'LIG_NUMLOT', 'DEP_CODE', 'DOC_NUMERO', 'LIG_NUMERO'], 'art_preapp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('REAPPRO');
    }
};
