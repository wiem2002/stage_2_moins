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
        Schema::create('FRAIS', function (Blueprint $table) {
            $table->string('FPT_CODE', 3);
            $table->string('FPT_LIB', 40)->nullable()->index('fpt_klib');
            $table->string('FPT_TYPE', 1)->nullable();
            $table->string('FPT_CALCUL', 1)->nullable();
            $table->decimal('FPT_VALEUR', 20, 4)->nullable();
            $table->string('PCF_CODE', 20)->nullable();
            $table->decimal('FPT_SEUIL1', 20, 4)->nullable();
            $table->decimal('FPT_SEUIL2', 20, 4)->nullable();
            $table->decimal('FPT_SEUIL3', 20, 4)->nullable();
            $table->decimal('FPT_SEUIL4', 20, 4)->nullable();
            $table->decimal('FPT_SEUIL5', 20, 4)->nullable();
            $table->decimal('FPT_MT1', 20, 4)->nullable();
            $table->decimal('FPT_MT2', 20, 4)->nullable();
            $table->decimal('FPT_MT3', 20, 4)->nullable();
            $table->decimal('FPT_MT4', 20, 4)->nullable();
            $table->decimal('FPT_MT5', 20, 4)->nullable();
            $table->string('DEB_CNDLIV', 3)->nullable();
            $table->string('DEB_MODTRP', 1)->nullable();
            $table->decimal('DEB_COEFST', 8, 3)->nullable();
            $table->boolean('FPT_DORT')->nullable()->index('fpt_kdort');
            $table->dateTime('FPT_DTMAJ')->nullable();
            $table->string('FPT_USRMAJ', 20)->nullable();
            $table->integer('FPT_NUMMAJ')->nullable();

            $table->primary(['FPT_CODE'], 'fpt_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('FRAIS');
    }
};
