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
        Schema::create('JOURNAUX', function (Blueprint $table) {
            $table->string('JRN_CODE', 10);
            $table->string('JRN_LIB', 40)->nullable()->index('jrn_klib');
            $table->string('JRN_TYPE', 1)->nullable();
            $table->string('DEV_CODE', 3)->nullable();
            $table->boolean('JRN_MULDEV')->nullable();
            $table->string('USR_NAME', 20)->nullable();
            $table->string('JRN_CTRL', 250)->nullable();
            $table->string('JRN_CPTINTERDIT', 250)->nullable();
            $table->string('JRN_PIECE', 1)->nullable();
            $table->string('JRN_NPIECE', 30)->nullable();
            $table->boolean('JRN_TCNPIE')->nullable();
            $table->string('JRN_LIBA', 15)->nullable();
            $table->string('JRN_ECRLIB', 1)->nullable();
            $table->string('JRN_CPTCTR', 25)->nullable();
            $table->boolean('JRN_AUTO')->nullable();
            $table->boolean('JRN_CONTRE')->nullable();
            $table->boolean('JRN_ECH')->nullable();
            $table->boolean('JRN_LETAUT')->nullable();
            $table->boolean('JRN_VLAUTO')->nullable();
            $table->boolean('JRN_DORT')->nullable()->index('jrn_kdort');
            $table->dateTime('JRN_DTMAJ')->nullable();
            $table->string('JRN_USRMAJ', 20)->nullable();
            $table->integer('JRN_NUMMAJ')->nullable();
            $table->string('XXX_CHEQUE', 20)->nullable();

            $table->primary(['JRN_CODE'], 'jrn_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('JOURNAUX');
    }
};
