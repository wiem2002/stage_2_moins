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
        Schema::create('LMOVEAN', function (Blueprint $table) {
            $table->string('MVN_CODE', 15);
            $table->string('MVN_PLAN', 15);
            $table->string('ANA_CODE', 15);
            $table->decimal('MVN_TAUX', 8, 3)->nullable();
            $table->dateTime('LMV_DTCRE')->nullable();
            $table->string('LMV_USRCRE', 20)->nullable();
            $table->dateTime('LMV_DTMAJ')->nullable();
            $table->string('LMV_USRMAJ', 20)->nullable();
            $table->integer('LMV_NUMMAJ')->nullable();

            $table->primary(['MVN_CODE', 'MVN_PLAN', 'ANA_CODE'], 'lmv_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('LMOVEAN');
    }
};
