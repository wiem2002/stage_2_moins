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
        Schema::create('REG_AVISBQ', function (Blueprint $table) {
            $table->string('RAB_NUMERO', 10);
            $table->string('RMB_NUMERO', 10)->nullable();
            $table->string('RAB_STYPE', 1)->nullable();
            $table->string('RAB_ETAT', 1)->nullable();
            $table->string('JRN_CODE', 10)->nullable();
            $table->string('RMB_PIECE', 30)->nullable();
            $table->string('REG_TYPE', 15)->nullable();
            $table->dateTime('RAB_DT')->nullable();
            $table->string('DEV_CODE', 3)->nullable();
            $table->decimal('RAB_MT', 20, 4)->nullable();
            $table->decimal('RAB_MTREG', 20, 4)->nullable();
            $table->decimal('RAB_MTFRA', 20, 4)->nullable();
            $table->decimal('RAB_MTTVA', 20, 4)->nullable();
            $table->decimal('RAB_MTINT', 20, 4)->nullable();
            $table->string('RAB_CPTFRA', 25)->nullable();
            $table->string('RAB_CPTTTVA', 25)->nullable();
            $table->string('RAB_CPTINT', 25)->nullable();
            $table->string('RAB_ECRBQ', 10)->nullable();
            $table->string('RAB_ECRFRA', 10)->nullable();
            $table->string('RAB_ECRTVA', 10)->nullable();
            $table->string('RAB_ECRINT', 10)->nullable();
            $table->string('RAB_ECREFF', 10)->nullable();
            $table->dateTime('RAB_DTMAJ')->nullable();
            $table->string('RAB_USRMAJ', 20)->nullable();
            $table->integer('RAB_NUMMAJ')->nullable();

            $table->index(['RAB_DT', 'RAB_NUMERO'], 'rab_kdt');
            $table->index(['JRN_CODE', 'RAB_DT', 'RMB_PIECE'], 'rab_kjrn');
            $table->index(['DEV_CODE', 'RAB_MT', 'RAB_DT', 'RAB_NUMERO'], 'rab_kmt');
            $table->index(['RMB_PIECE', 'RAB_DT'], 'rab_kpiece');
            $table->unique(['RMB_NUMERO', 'RAB_NUMERO'], 'rab_krem');
            $table->primary(['RAB_NUMERO'], 'rab_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('REG_AVISBQ');
    }
};
