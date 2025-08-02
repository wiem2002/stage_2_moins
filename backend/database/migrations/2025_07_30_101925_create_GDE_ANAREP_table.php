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
        Schema::create('GDE_ANAREP', function (Blueprint $table) {
            $table->string('GDE_CODE', 8);
            $table->string('GDL_NUMERO', 4);
            $table->string('ANA_PLAN', 15);
            $table->string('ANA_CODE', 15);
            $table->decimal('ANR_TAUX', 8, 3)->nullable();
            $table->boolean('ANR_DORT')->nullable()->index('anr_kdort');
            $table->dateTime('GUA_DTMAJ')->nullable();
            $table->string('GUA_USRMAJ', 20)->nullable();
            $table->integer('GUA_NUMMAJ')->nullable();

            $table->primary(['GDE_CODE', 'GDL_NUMERO', 'ANA_PLAN', 'ANA_CODE'], 'gua_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('GDE_ANAREP');
    }
};
