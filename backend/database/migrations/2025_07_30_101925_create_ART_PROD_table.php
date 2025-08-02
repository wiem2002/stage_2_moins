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
        Schema::create('ART_PROD', function (Blueprint $table) {
            $table->string('ART_CODE', 30);
            $table->string('PRD_LIGNE', 3);
            $table->string('PRD_CODE', 30)->nullable();
            $table->string('PRD_GAMME', 35)->nullable();
            $table->string('PRD_TGAMME', 10)->nullable();
            $table->float('PRD_QTE', 53, 0)->nullable();
            $table->decimal('PRD_COUT', 20, 4)->nullable();
            $table->decimal('PRD_PRIX', 20, 4)->nullable();
            $table->boolean('PRD_PR_MAN')->nullable();
            $table->boolean('PRD_PV_MAN')->nullable();
            $table->boolean('PRD_APP_TP')->nullable();
            $table->string('PRD_LIB', 250)->nullable();
            $table->boolean('PRD_IMP')->nullable();

            $table->index(['PRD_CODE', 'ART_CODE'], 'prd_kprod');
            $table->primary(['ART_CODE', 'PRD_LIGNE'], 'prd_plig');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ART_PROD');
    }
};
