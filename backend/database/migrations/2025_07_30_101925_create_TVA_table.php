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
        Schema::create('TVA', function (Blueprint $table) {
            $table->string('TVA_NUMERO', 10);
            $table->string('TVA_TYPE', 3)->nullable();
            $table->string('TVA_REGIME', 3)->nullable();
            $table->boolean('TVA_ACHMP')->nullable();
            $table->boolean('TVA_PAIVIR')->nullable();
            $table->boolean('TVA_PAIIMP')->nullable();
            $table->dateTime('TVA_DATE')->nullable();
            $table->dateTime('TVA_DT_DEB')->nullable();
            $table->dateTime('TVA_DT_FIN')->nullable();
            $table->dateTime('TVA_DT_DEP')->nullable();
            $table->string('TVA_PERCOD', 5)->nullable();
            $table->string('TVA_INVADM', 16)->nullable();
            $table->string('TVA_ETAT', 1)->nullable();
            $table->string('TVA_ECRREP', 10)->nullable();
            $table->string('TVA_ECRCRE', 10)->nullable();
            $table->string('TVA_ECRDEB', 10)->nullable();
            $table->string('TVA_ECRREG', 10)->nullable();
            $table->string('TVA_ECRECA', 10)->nullable();
            $table->dateTime('TVA_DTMAJ')->nullable();
            $table->string('TVA_USRMAJ', 20)->nullable();
            $table->integer('TVA_NUMMAJ')->nullable();

            $table->primary(['TVA_NUMERO'], 'tva_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TVA');
    }
};
