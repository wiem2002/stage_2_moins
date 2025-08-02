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
        Schema::create('BANQUESCOMPTES', function (Blueprint $table) {
            $table->string('BQC_CODE', 15);
            $table->string('BQC_NOM', 40)->nullable()->index('bqc_knom');
            $table->boolean('BQC_DORT')->nullable()->index('bqc_kdort');
            $table->string('BNQ_CODE', 15)->nullable();
            $table->decimal('BQC_REMPLA', 20, 4)->nullable();
            $table->integer('BQC_REMPRI')->nullable();
            $table->boolean('BQC_CHORUS')->nullable();
            $table->string('BQC_TYPE', 3)->nullable();
            $table->string('BQC_IBAN', 4)->nullable();
            $table->string('BQC_AGENCE', 12)->nullable();
            $table->string('BQC_GUICHE', 12)->nullable();
            $table->string('BQC_COMPTE', 34)->nullable();
            $table->string('BQC_CLE', 2)->nullable();
            $table->string('DEV_CODE', 3)->nullable();
            $table->string('CPT_NUMERO', 25)->nullable();
            $table->string('BQC_JRNREB', 10)->nullable();
            $table->string('BQC_JRNREC', 10)->nullable();
            $table->string('BQC_JRNRES', 10)->nullable();
            $table->string('BQC_JRNEMP', 10)->nullable();
            $table->string('BQC_JRNIMP', 10)->nullable();
            $table->text('BQC_MEMO')->nullable();
            $table->dateTime('BQC_DTMAJ')->nullable();
            $table->string('BQC_USRMAJ', 20)->nullable();
            $table->integer('BQC_NUMMAJ')->nullable();

            $table->unique(['BQC_REMPRI', 'BQC_CODE'], 'bqc_krempr');
            $table->primary(['BQC_CODE'], 'bqc_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('BANQUESCOMPTES');
    }
};
