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
        Schema::create('GEST_ABONNES_FOURNISSEURS', function (Blueprint $table) {
            $table->string('AFG_NUMERO', 10);
            $table->string('DEP_CODE', 3)->nullable();
            $table->string('ART_CODE', 30)->nullable()->index('afg_kart');
            $table->string('PCF_CODE', 20)->nullable()->index('afg_kpcf');
            $table->string('DEV_CODE', 3)->nullable();
            $table->float('LIG_QTE', 53, 0)->nullable();
            $table->decimal('LIG_P_BRUT', 20, 4)->nullable();
            $table->string('LIG_REMISE', 30)->nullable();
            $table->boolean('AFG_DORT')->nullable()->index('afg_kdort');
            $table->dateTime('AFG_DTLAST')->nullable()->index('afg_kdate');
            $table->string('AFG_PERIOD', 3)->nullable();
            $table->boolean('AFG_LIMITE')->nullable();
            $table->integer('AFG_NBTODO')->nullable();
            $table->string('AFG_SUSP', 1)->nullable();
            $table->dateTime('AFG_DTSUSP')->nullable();
            $table->boolean('AFG_SEUL')->nullable();
            $table->string('AFG_REFPCF', 100)->nullable();
            $table->dateTime('AFG_DTSCPN')->nullable();
            $table->integer('AFG_DUREE')->nullable();
            $table->string('AFG_UDUREE', 1)->nullable();
            $table->dateTime('AFG_DTRENO')->nullable();
            $table->boolean('AFG_RNVAUT')->nullable();
            $table->dateTime('AFG_DTMAJ')->nullable();
            $table->string('AFG_USRMAJ', 20)->nullable();
            $table->integer('AFG_NUMMAJ')->nullable();

            $table->index(['PCF_CODE', 'ART_CODE'], 'afg_kabt');
            $table->primary(['AFG_NUMERO'], 'afg_plig');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('GEST_ABONNES_FOURNISSEURS');
    }
};
