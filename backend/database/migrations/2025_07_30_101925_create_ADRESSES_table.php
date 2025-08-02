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
        Schema::create('ADRESSES', function (Blueprint $table) {
            $table->string('ADR_TBL', 3);
            $table->string('ADR_CODE', 20);
            $table->string('ADR_NUMERO', 3);
            $table->string('ADR_TITLE', 60)->nullable();
            $table->boolean('ADR_NPAI')->nullable();
            $table->string('ADR_RS', 60)->nullable();
            $table->string('ADR_RS2', 60)->nullable();
            $table->string('ADR_RUE', 60)->nullable();
            $table->string('ADR_COMP', 60)->nullable();
            $table->string('ADR_ETAT', 100)->nullable();
            $table->string('ADR_REG', 100)->nullable();
            $table->string('ADR_CP', 10)->nullable();
            $table->string('ADR_VILLE', 200)->nullable();
            $table->string('PAY_CODE', 3)->nullable();
            $table->string('ADR_LAT', 25)->nullable();
            $table->string('ADR_LNG', 25)->nullable();
            $table->string('ADR_TEL1', 20)->nullable();
            $table->string('ADR_TEL2', 20)->nullable();
            $table->string('ADR_FAX', 20)->nullable();
            $table->string('ADR_TELEX', 10)->nullable();
            $table->string('ADR_CBAR', 30)->nullable()->index('adr_kcbar');
            $table->string('ADR_SIRET', 14)->nullable();
            $table->string('ADR_EMAIL', 60)->nullable();
            $table->string('ADR_URL', 128)->nullable();
            $table->text('ADR_MEMO')->nullable();
            $table->boolean('ADR_DORT')->nullable()->index('adr_kdort');
            $table->string('ADR_NATUBC', 3)->nullable();
            $table->dateTime('ADR_DTCRE')->nullable();
            $table->string('ADR_USRCRE', 20)->nullable();
            $table->dateTime('ADR_DTMAJ')->nullable();
            $table->string('ADR_USRMAJ', 20)->nullable();
            $table->integer('ADR_NUMMAJ')->nullable();

            $table->index(['ADR_CODE', 'ADR_NUMERO'], 'adr_kcoden');
            $table->primary(['ADR_TBL', 'ADR_CODE', 'ADR_NUMERO'], 'adr_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ADRESSES');
    }
};
