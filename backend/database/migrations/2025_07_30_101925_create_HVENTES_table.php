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
        Schema::create('HVENTES', function (Blueprint $table) {
            $table->string('VTE_CLE', 20);
            $table->dateTime('VTE_DATE')->nullable();
            $table->string('PRJ_CODE', 40)->nullable();
            $table->string('REP_CODE', 3)->nullable();
            $table->string('PCF_CODE', 20)->nullable();
            $table->string('PCF_PAYEUR', 20)->nullable();
            $table->string('DEP_CODE', 3)->nullable();
            $table->string('ART_CODE', 30)->nullable();
            $table->string('ART_GAMME', 35)->nullable();
            $table->string('PRD_CODE', 30)->nullable();
            $table->integer('VTE_ANNEE')->nullable();
            $table->integer('VTE_MOIS')->nullable();
            $table->integer('VTE_JOUR')->nullable();
            $table->integer('VTE_SEMAIN')->nullable();
            $table->integer('VTE_TRIMES')->nullable();
            $table->float('VTE_QTE', 53, 0)->nullable();
            $table->float('VTE_QTEPRD', 53, 0)->nullable();
            $table->float('VTE_POIDSB', 53, 0)->nullable();
            $table->float('VTE_POIDSN', 53, 0)->nullable();
            $table->float('VTE_POIDS', 53, 0)->nullable();
            $table->float('VTE_POIDST', 53, 0)->nullable();
            $table->float('VTE_VOLUME', 53, 0)->nullable();
            $table->float('VTE_NCOLIS', 53, 0)->nullable();
            $table->decimal('VTE_F_APP1', 20, 4)->nullable();
            $table->decimal('VTE_F_APP2', 20, 4)->nullable();
            $table->decimal('VTE_F_APP3', 20, 4)->nullable();
            $table->decimal('VTE_PRVCOM', 20, 4)->nullable();
            $table->decimal('VTE_COUT', 20, 4)->nullable();
            $table->decimal('VTE_BASE', 20, 4)->nullable();
            $table->decimal('VTE_BRUT', 20, 4)->nullable();
            $table->decimal('VTE_REM1', 20, 4)->nullable();
            $table->decimal('VTE_REM2', 20, 4)->nullable();
            $table->decimal('VTE_REM3', 20, 4)->nullable();
            $table->decimal('VTE_REM4', 20, 4)->nullable();
            $table->decimal('VTE_REM5', 20, 4)->nullable();
            $table->decimal('VTE_REM6', 20, 4)->nullable();
            $table->decimal('VTE_REMCLI', 20, 4)->nullable();
            $table->decimal('VTE_REMFAC', 20, 4)->nullable();
            $table->decimal('VTE_REMRFA', 20, 4)->nullable();
            $table->decimal('VTE_MT_ESC', 20, 4)->nullable();

            $table->index(['VTE_DATE', 'PRJ_CODE', 'REP_CODE', 'PCF_CODE', 'PCF_PAYEUR', 'DEP_CODE', 'ART_CODE'], 'vte_khist');
            $table->primary(['VTE_CLE'], 'vte_pcle');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('HVENTES');
    }
};
