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
        Schema::create('HARTICLES', function (Blueprint $table) {
            $table->dateTime('VTE_DATE');
            $table->string('ART_CODE', 30);
            $table->string('ART_GAMME', 35);
            $table->string('PRD_CODE', 30);
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
            $table->decimal('VTE_MT_ESC', 20, 4)->nullable();

            $table->primary(['VTE_DATE', 'ART_CODE', 'ART_GAMME', 'PRD_CODE'], 'vte_part');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('HARTICLES');
    }
};
