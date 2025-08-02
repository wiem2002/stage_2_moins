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
        Schema::create('HPROJETS', function (Blueprint $table) {
            $table->string('PRJ_CODE', 40);
            $table->string('ART_CODE', 30);
            $table->string('ART_GAMME', 35);
            $table->float('VTE_QTE', 53, 0)->nullable();
            $table->float('VTE_QTEACH', 53, 0)->nullable();
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

            $table->primary(['PRJ_CODE', 'ART_CODE', 'ART_GAMME'], 'vte_pprj');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('HPROJETS');
    }
};
