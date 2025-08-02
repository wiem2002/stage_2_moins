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
        Schema::create('GUIDES', function (Blueprint $table) {
            $table->string('GDE_CODE', 8);
            $table->string('GDE_LIB', 40)->nullable()->index('gde_klib');
            $table->string('JRN_TYPE', 1)->nullable();
            $table->string('GDE_LIBA', 15)->nullable();
            $table->string('GDE_SENS', 1)->nullable();
            $table->string('CPT_NUMERO', 25)->nullable();
            $table->string('JRN_CODE', 10)->nullable();
            $table->boolean('GDE_CONTRE')->nullable();
            $table->boolean('GDE_DORT')->nullable()->index('gde_kdort');
            $table->dateTime('GDE_DTCRE')->nullable();
            $table->string('GDE_USRCRE', 20)->nullable();
            $table->dateTime('GDE_DTMAJ')->nullable();
            $table->string('GDE_USRMAJ', 20)->nullable();
            $table->integer('GDE_NUMMAJ')->nullable();

            $table->primary(['GDE_CODE'], 'gde_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('GUIDES');
    }
};
