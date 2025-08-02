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
        Schema::create('ARC_LIG_SERIE', function (Blueprint $table) {
            $table->string('DOC_NUMERO', 10);
            $table->string('LIG_NUMERO', 5);
            $table->string('LIG_SUBNUM', 5);
            $table->string('ART_SERIED', 30);
            $table->string('ART_SERIEF', 30)->nullable();
            $table->float('ART_SERIEQ', 53, 0)->nullable();
            $table->string('DEP_CODE', 3)->nullable();
            $table->string('ART_CODE', 30)->nullable();
            $table->string('ART_GAMME', 35)->nullable();
            $table->string('ART_SERRES', 1)->nullable();
            $table->string('ART_NUMERO', 5)->nullable();

            $table->index(['DEP_CODE', 'ART_CODE', 'ART_GAMME', 'ART_SERIED'], 'alg_kserie');
            $table->index(['DOC_NUMERO', 'LIG_NUMERO', 'LIG_SUBNUM', 'ART_NUMERO'], 'alg_ksernu');
            $table->primary(['DOC_NUMERO', 'LIG_NUMERO', 'LIG_SUBNUM', 'ART_SERIED'], 'alg_pserie');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ARC_LIG_SERIE');
    }
};
