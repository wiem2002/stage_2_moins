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
        Schema::create('MODE_REG', function (Blueprint $table) {
            $table->string('REG_CODE', 8);
            $table->string('REG_LIB', 40)->nullable()->index('reg_klib');
            $table->string('REG_TYPE', 15)->nullable();
            $table->integer('REG_NBJ')->nullable();
            $table->integer('REG_LE')->nullable();
            $table->integer('REG_LE2')->nullable();
            $table->integer('REG_LE3')->nullable();
            $table->boolean('REG_FDM')->nullable();
            $table->boolean('REG_30MOIS')->nullable();
            $table->boolean('REG_RELEVE')->nullable();
            $table->string('CPT_NUMERO', 25)->nullable();
            $table->string('JRN_CODE', 10)->nullable();
            $table->boolean('REG_HTCMDE')->nullable();
            $table->float('REG_P_CMDE', 53, 0)->nullable();
            $table->boolean('REG_HTLIVR')->nullable();
            $table->float('REG_P_LIVR', 53, 0)->nullable();
            $table->string('DEV_CODE', 3)->nullable();
            $table->boolean('REG_DORT')->nullable()->index('reg_kdort');
            $table->dateTime('MRG_DTMAJ')->nullable();
            $table->string('MRG_USRMAJ', 20)->nullable();
            $table->integer('MRG_NUMMAJ')->nullable();

            $table->primary(['REG_CODE'], 'reg_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('MODE_REG');
    }
};
