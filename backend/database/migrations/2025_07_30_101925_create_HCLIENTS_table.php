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
        Schema::create('HCLIENTS', function (Blueprint $table) {
            $table->dateTime('VTE_DATE');
            $table->string('PRJ_CODE', 40);
            $table->string('REP_CODE', 3);
            $table->string('PCF_CODE', 20);
            $table->string('PCF_PAYEUR', 20);
            $table->integer('VTE_ANNEE')->nullable();
            $table->integer('VTE_MOIS')->nullable();
            $table->integer('VTE_JOUR')->nullable();
            $table->integer('VTE_SEMAIN')->nullable();
            $table->integer('VTE_TRIMES')->nullable();
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
            $table->decimal('VTE_PORT', 20, 4)->nullable();
            $table->decimal('VTE_FRAIS', 20, 4)->nullable();
            $table->decimal('VTE_SUPPL', 20, 4)->nullable();

            $table->primary(['VTE_DATE', 'PRJ_CODE', 'REP_CODE', 'PCF_CODE', 'PCF_PAYEUR'], 'vte_ptiers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('HCLIENTS');
    }
};
