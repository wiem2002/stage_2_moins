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
        Schema::create('ART_FOURN', function (Blueprint $table) {
            $table->string('PCF_CODE', 20);
            $table->string('ART_CODE', 30);
            $table->string('ART_GAMME', 35);
            $table->string('ART_PFOURN', 1);
            $table->string('ART_REFFRS', 30)->nullable();
            $table->string('ART_UC_ACH', 15)->nullable();
            $table->float('ART_CD_ACH', 53, 0)->nullable();
            $table->string('ART_UB_ACH', 15)->nullable();
            $table->float('ART_R_UAUV', 53, 0)->nullable();
            $table->string('DEV_CODE', 3)->nullable();
            $table->boolean('ART_PACHUB')->nullable();
            $table->decimal('ART_P_ACH', 20, 4)->nullable();
            $table->decimal('ART_P_VTE', 20, 4)->nullable();
            $table->float('ART_QTEMIN', 53, 0)->nullable();
            $table->string('ART_CODREM', 10)->nullable();
            $table->integer('ART_DELAI')->nullable();

            $table->unique(['ART_CODE', 'ART_GAMME', 'PCF_CODE', 'ART_PFOURN'], 'art_kfrs2');
            $table->primary(['PCF_CODE', 'ART_CODE', 'ART_GAMME', 'ART_PFOURN'], 'art_pfrs1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ART_FOURN');
    }
};
