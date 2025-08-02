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
        Schema::create('GEST_ABONNES', function (Blueprint $table) {
            $table->string('ABT_NUMERO', 10);
            $table->string('DEP_CODE', 3)->nullable();
            $table->string('ART_CODE', 30)->nullable()->index('abt_kart');
            $table->string('PCF_CODE', 20)->nullable()->index('abt_kpcf');
            $table->string('DEV_CODE', 3)->nullable();
            $table->float('LIG_QTE', 53, 0)->nullable();
            $table->decimal('LIG_P_BRUT', 20, 4)->nullable();
            $table->string('LIG_REMISE', 30)->nullable();
            $table->boolean('ABT_DORT')->nullable()->index('abt_kdort');
            $table->dateTime('ABT_DTLAST')->nullable()->index('abt_kdate');
            $table->string('ABT_PERIOD', 3)->nullable();
            $table->boolean('ABT_LIMITE')->nullable();
            $table->integer('ABT_NBTODO')->nullable();
            $table->string('ABT_SUSP', 1)->nullable();
            $table->dateTime('ABT_DTSUSP')->nullable();
            $table->boolean('ABT_SEUL')->nullable();
            $table->string('ABT_REFPCF', 100)->nullable();
            $table->dateTime('ABT_DTSCPN')->nullable();
            $table->integer('ABT_DUREE')->nullable();
            $table->string('ABT_UDUREE', 1)->nullable();
            $table->dateTime('ABT_DTRENO')->nullable();
            $table->boolean('ABT_RNVAUT')->nullable();
            $table->dateTime('ABT_DTMAJ')->nullable();
            $table->string('ABT_USRMAJ', 20)->nullable();
            $table->integer('ABT_NUMMAJ')->nullable();
            $table->dateTime('XXX_DATENV')->nullable();
            $table->boolean('XXX_REACT')->nullable();

            $table->index(['PCF_CODE', 'ART_CODE'], 'abt_kabt');
            $table->primary(['ABT_NUMERO'], 'abt_plig');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('GEST_ABONNES');
    }
};
