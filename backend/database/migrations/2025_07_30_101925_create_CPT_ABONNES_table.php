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
        Schema::create('CPT_ABONNES', function (Blueprint $table) {
            $table->string('GDE_CODE', 8);
            $table->string('JRN_CODE', 10);
            $table->string('CPT_NUMERO', 25);
            $table->decimal('ABT_MT', 20, 4)->nullable();
            $table->string('DEV_CODE', 3)->nullable();
            $table->string('ABT_PERIOD', 3)->nullable();
            $table->boolean('ABT_DORT')->nullable()->index('abt_kdort');
            $table->dateTime('ABT_DTLAST')->nullable();
            $table->boolean('ABT_LIMITE')->nullable();
            $table->integer('ABT_NBTODO')->nullable();
            $table->string('ABT_SUSP', 1)->nullable();
            $table->dateTime('ABT_DTSUSP')->nullable();
            $table->dateTime('ABT_DTMAJ')->nullable();
            $table->string('ABT_USRMAJ', 20)->nullable();
            $table->integer('ABT_NUMMAJ')->nullable();

            $table->primary(['GDE_CODE', 'JRN_CODE', 'CPT_NUMERO'], 'abt_pcpt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CPT_ABONNES');
    }
};
