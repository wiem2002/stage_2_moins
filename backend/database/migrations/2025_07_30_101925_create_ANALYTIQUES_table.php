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
        Schema::create('ANALYTIQUES', function (Blueprint $table) {
            $table->string('ANA_CODE', 15);
            $table->string('ANA_LIB', 60)->nullable()->index('ana_klib');
            $table->string('ANA_TYPE', 1)->nullable();
            $table->string('ANA_PLAN', 15)->nullable();
            $table->string('ANA_COUT', 15)->nullable();
            $table->boolean('ANA_DORT')->nullable()->index('ana_kdort');
            $table->dateTime('ANA_DTCRE')->nullable();
            $table->string('ANA_USRCRE', 20)->nullable();
            $table->dateTime('ANA_DTMAJ')->nullable();
            $table->string('ANA_USRMAJ', 20)->nullable();
            $table->integer('ANA_NUMMAJ')->nullable();

            $table->primary(['ANA_CODE'], 'ana_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ANALYTIQUES');
    }
};
