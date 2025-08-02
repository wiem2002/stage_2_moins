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
        Schema::create('REG_REMISES', function (Blueprint $table) {
            $table->string('RMB_NUMERO', 10);
            $table->string('RMB_TYPE', 1)->nullable();
            $table->string('RMB_STYPE', 1)->nullable();
            $table->string('RMB_ETAT', 1)->nullable();
            $table->string('RMB_PIECE', 30)->nullable();
            $table->dateTime('RMB_DT')->nullable();
            $table->string('BQC_CODE', 15)->nullable();
            $table->string('RMB_BQCCPT', 25)->nullable();
            $table->string('RMB_BQCJRN', 10)->nullable();
            $table->string('RMB_JRNOD', 10)->nullable();
            $table->string('REG_TYPE', 15)->nullable();
            $table->string('RMB_REF', 60)->nullable();
            $table->string('DEV_CODE', 3)->nullable();
            $table->decimal('RMB_MT', 20, 4)->nullable();
            $table->decimal('RMB_MTD', 20, 4)->nullable();
            $table->decimal('RMB_MTE', 20, 4)->nullable();
            $table->integer('RMB_NBREG')->nullable();
            $table->dateTime('RMB_DTVAL')->nullable();
            $table->dateTime('RMB_DTECH')->nullable();
            $table->dateTime('RMB_DTEXE')->nullable();
            $table->string('RMB_ENTREE', 1)->nullable();
            $table->string('RMB_OPERAT', 2)->nullable();
            $table->string('RMB_MOTECO', 3)->nullable();
            $table->string('RMB_IMPFRA', 2)->nullable();
            $table->string('RMB_NDFETB', 260)->nullable();
            $table->dateTime('RMB_DDFETB')->nullable();
            $table->string('RMB_UDFETB', 20)->nullable();
            $table->dateTime('RMB_DPRDFS')->nullable();
            $table->dateTime('RMB_DXVDFS')->nullable();
            $table->string('RMB_NDFSPA', 260)->nullable();
            $table->dateTime('RMB_DDFSPA')->nullable();
            $table->string('RMB_UDFSPA', 20)->nullable();
            $table->string('RMB_AVISBQ', 1)->nullable();
            $table->dateTime('RMB_DTMAJ')->nullable();
            $table->string('RMB_USRMAJ', 20)->nullable();
            $table->integer('RMB_NUMMAJ')->nullable();
            $table->string('RMB_CLEINA', 300)->nullable();

            $table->index(['BQC_CODE', 'RMB_DT', 'RMB_PIECE'], 'rmb_kbqc');
            $table->index(['RMB_DT', 'RMB_PIECE'], 'rmb_kdt');
            $table->index(['DEV_CODE', 'RMB_MT', 'RMB_DT', 'RMB_PIECE'], 'rmb_kmt');
            $table->index(['RMB_PIECE', 'RMB_DT'], 'rmb_kpiece');
            $table->index(['RMB_TYPE', 'RMB_STYPE', 'RMB_ETAT', 'DEV_CODE', 'RMB_DT'], 'rmb_ktsedd');
            $table->primary(['RMB_NUMERO'], 'rmb_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('REG_REMISES');
    }
};
