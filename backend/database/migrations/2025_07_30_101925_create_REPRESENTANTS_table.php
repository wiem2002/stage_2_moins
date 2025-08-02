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
        Schema::create('REPRESENTANTS', function (Blueprint $table) {
            $table->string('REP_CODE', 3);
            $table->string('REP_CIVILE', 25)->nullable();
            $table->string('REP_PRENOM', 20)->nullable();
            $table->string('REP_NOM', 30)->nullable()->index('rep_knom');
            $table->boolean('REP_DORT')->nullable()->index('rep_kdort');
            $table->string('REP_RUE', 60)->nullable();
            $table->string('REP_COMP', 60)->nullable();
            $table->string('REP_ETAT', 100)->nullable();
            $table->string('REP_REG', 100)->nullable();
            $table->string('REP_CP', 10)->nullable();
            $table->string('REP_VILLE', 200)->nullable();
            $table->string('PAY_CODE', 3)->nullable();
            $table->string('REP_TELB', 20)->nullable();
            $table->string('REP_TELD', 20)->nullable();
            $table->string('REP_TELM', 20)->nullable();
            $table->string('REP_FAX', 20)->nullable();
            $table->string('REP_EMAIL', 60)->nullable();
            $table->string('REP_URL', 128)->nullable();
            $table->string('SRV_CODE', 3)->nullable();
            $table->string('DIV_CODE', 3)->nullable();
            $table->decimal('REP_OBJ', 20, 4)->nullable();
            $table->decimal('REP_TX_COM', 8, 3)->nullable();
            $table->string('REP_BAREME', 60)->nullable();
            $table->dateTime('REP_DTMAJ')->nullable();
            $table->string('REP_USRMAJ', 20)->nullable();
            $table->integer('REP_NUMMAJ')->nullable();

            $table->primary(['REP_CODE'], 'rep_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('REPRESENTANTS');
    }
};
