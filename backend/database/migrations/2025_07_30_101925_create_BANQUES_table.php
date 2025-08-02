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
        Schema::create('BANQUES', function (Blueprint $table) {
            $table->string('BNQ_CODE', 15);
            $table->string('BNQ_NOM', 40)->nullable()->index('bnq_knom');
            $table->boolean('BNQ_DORT')->nullable()->index('bnq_kdort');
            $table->string('BNQ_DOMICI', 40)->nullable();
            $table->string('BNQ_RUE', 60)->nullable();
            $table->string('BNQ_COMP', 60)->nullable();
            $table->string('BNQ_ETAT', 100)->nullable();
            $table->string('BNQ_REG', 100)->nullable();
            $table->string('BNQ_CP', 10)->nullable();
            $table->string('BNQ_VILLE', 200)->nullable();
            $table->string('PAY_CODE', 3)->nullable();
            $table->string('BNQ_TEL1', 20)->nullable();
            $table->string('BNQ_TEL2', 20)->nullable();
            $table->string('BNQ_FAX', 20)->nullable();
            $table->string('BNQ_TELEX', 10)->nullable();
            $table->string('BNQ_EMAIL', 60)->nullable();
            $table->string('BNQ_URL', 128)->nullable();
            $table->string('BNQ_NUMEME', 6)->nullable();
            $table->boolean('BNQ_Z03P80')->nullable();
            $table->string('BNQ_NUMCLI', 7)->nullable();
            $table->string('BNQ_SWIFT', 20)->nullable();
            $table->boolean('BNQ_CE07TI')->nullable();
            $table->boolean('BNQ_TRCRLF')->nullable();
            $table->text('BNQ_MEMO')->nullable();
            $table->dateTime('BNQ_DTMAJ')->nullable();
            $table->string('BNQ_USRMAJ', 20)->nullable();
            $table->integer('BNQ_NUMMAJ')->nullable();

            $table->primary(['BNQ_CODE'], 'bnq_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('BANQUES');
    }
};
