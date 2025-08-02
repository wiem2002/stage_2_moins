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
        Schema::create('TIERS_RIB', function (Blueprint $table) {
            $table->string('PCF_CODE', 20);
            $table->string('RIB_ORDRE', 2);
            $table->string('RIB_BQ_NOM', 40)->nullable();
            $table->string('RIB_BQ_ADR', 40)->nullable();
            $table->string('RIB_BQ_NUM', 6)->nullable();
            $table->string('RIB_ASWIFT', 20)->nullable();
            $table->string('RIB_TYPE', 3)->nullable();
            $table->string('RIB_IBAN', 4)->nullable();
            $table->string('RIB_AGENCE', 12)->nullable();
            $table->string('RIB_GUICHE', 12)->nullable();
            $table->string('RIB_COMPTE', 34)->nullable();
            $table->string('RIB_CLE', 2)->nullable();
            $table->dateTime('RIB_CB_DTF')->nullable();
            $table->string('RIB_CB_TYP', 15)->nullable();
            $table->string('RIB_TEXTE', 40)->nullable();
            $table->dateTime('RIB_DT_SM')->nullable();
            $table->string('RIB_RUM', 35)->nullable();
            $table->string('RIB_SEQPRE', 4)->nullable();
            $table->boolean('RIB_DORT')->nullable()->index('rib_kdort');
            $table->dateTime('RIB_DTMAJ')->nullable();
            $table->string('RIB_USRMAJ', 20)->nullable();
            $table->integer('RIB_NUMMAJ')->nullable();

            $table->primary(['PCF_CODE', 'RIB_ORDRE'], 'rib_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TIERS_RIB');
    }
};
