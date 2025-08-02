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
        Schema::create('ART_SERIE', function (Blueprint $table) {
            $table->string('DEP_CODE', 3);
            $table->string('ART_CODE', 30);
            $table->string('ART_GAMME', 35);
            $table->string('ART_SERIED', 30);
            $table->string('ART_SERIEF', 30)->nullable();
            $table->decimal('ART_P_ACH', 20, 4)->nullable();
            $table->dateTime('ART_DT_ACH')->nullable();
            $table->integer('ART_SERIEQ')->nullable();
            $table->integer('ART_SERIEO')->nullable();
            $table->integer('ART_SERIEI')->nullable();
            $table->integer('ART_SERIER')->nullable();
            $table->text('ART_LSERIE')->nullable();
            $table->text('ART_RSERIE')->nullable();

            $table->index(['DEP_CODE', 'ART_CODE', 'ART_GAMME', 'ART_DT_ACH', 'ART_SERIED'], 'art_kdate');
            $table->primary(['DEP_CODE', 'ART_CODE', 'ART_GAMME', 'ART_SERIED'], 'art_pserie');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ART_SERIE');
    }
};
