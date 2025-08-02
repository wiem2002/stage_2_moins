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
        Schema::create('VILLES', function (Blueprint $table) {
            $table->string('VIL_CODE', 10);
            $table->string('VIL_NOM', 200)->index('vil_knom');
            $table->string('VIL_COMMUN', 5)->nullable();
            $table->string('VIL_DEPART', 100)->nullable();
            $table->string('VIL_ETAT', 100)->nullable();
            $table->string('VIL_REGION', 100)->nullable();
            $table->string('PAY_CODE', 3)->nullable();
            $table->float('VIL_LATITU', 53, 0)->nullable();
            $table->float('VIL_LONGIT', 53, 0)->nullable();
            $table->integer('VIL_POPULA')->nullable();
            $table->boolean('VIL_DORT')->nullable()->index('vil_kdort');
            $table->dateTime('VIL_DTMAJ')->nullable();
            $table->string('VIL_USRMAJ', 20)->nullable();
            $table->integer('VIL_NUMMAJ')->nullable();

            $table->primary(['VIL_CODE', 'VIL_NOM'], 'vil_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('VILLES');
    }
};
