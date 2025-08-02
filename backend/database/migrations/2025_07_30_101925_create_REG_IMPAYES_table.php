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
        Schema::create('REG_IMPAYES', function (Blueprint $table) {
            $table->string('RIP_NUMERO', 10);
            $table->string('REG_NUMERO', 10)->nullable();
            $table->string('PCF_CODE', 20)->nullable();
            $table->dateTime('RIP_DATE')->nullable();
            $table->string('RIP_MOTIF', 15)->nullable();
            $table->string('RIP_ETAT', 1)->nullable();
            $table->string('JRN_CODE', 10)->nullable();
            $table->string('REG_TYPE', 15)->nullable();
            $table->string('DEV_CODE', 3)->nullable();
            $table->decimal('RIP_MT', 20, 4)->nullable();
            $table->decimal('RIP_MTREG', 20, 4)->nullable();
            $table->decimal('RIP_MTFRA', 20, 4)->nullable();
            $table->decimal('RIP_MTTVA', 20, 4)->nullable();
            $table->string('RIP_CPTFRA', 25)->nullable();
            $table->string('RIP_CPTTTVA', 25)->nullable();
            $table->string('RIP_ECRPCF', 10)->nullable();
            $table->string('RIP_ECRFRA', 10)->nullable();
            $table->string('RIP_ECRTVA', 10)->nullable();
            $table->string('RIP_ECRBQ', 10)->nullable();
            $table->dateTime('RIP_DTMAJ')->nullable();
            $table->string('RIP_USRMAJ', 20)->nullable();
            $table->integer('RIP_NUMMAJ')->nullable();

            $table->index(['RIP_DATE', 'PCF_CODE', 'RIP_NUMERO'], 'rip_kdate');
            $table->index(['RIP_DATE', 'RIP_NUMERO'], 'rip_kdt');
            $table->index(['JRN_CODE', 'RIP_DATE', 'RIP_NUMERO'], 'rip_kjrn');
            $table->index(['DEV_CODE', 'RIP_MT', 'RIP_DATE', 'RIP_NUMERO'], 'rip_kmt');
            $table->unique(['REG_NUMERO', 'RIP_NUMERO'], 'rip_kreg');
            $table->index(['PCF_CODE', 'RIP_DATE', 'RIP_NUMERO'], 'rip_ktiers');
            $table->primary(['RIP_NUMERO'], 'rip_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('REG_IMPAYES');
    }
};
