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
        Schema::create('SOC_FIELDS_CDTVIS', function (Blueprint $table) {
            $table->string('FCV_NUMERO', 15);
            $table->string('FCV_LIB', 40)->nullable();
            $table->string('FLD_TABLE', 3)->nullable();
            $table->dateTime('FCV_DTCRE')->nullable();
            $table->string('FCV_USRCRE', 20)->nullable();
            $table->dateTime('FCV_DTMAJ')->nullable();
            $table->string('FCV_USRMAJ', 20)->nullable();
            $table->integer('FCV_NUMMAJ')->nullable();

            $table->primary(['FCV_NUMERO'], 'fcv_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SOC_FIELDS_CDTVIS');
    }
};
