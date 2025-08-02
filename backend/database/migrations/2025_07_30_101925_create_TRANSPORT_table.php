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
        Schema::create('TRANSPORT', function (Blueprint $table) {
            $table->string('TRP_CODE', 3);
            $table->string('TRP_CIVILE', 25)->nullable();
            $table->string('TRP_LIB', 20)->nullable()->index('trp_klib');
            $table->string('PCF_CODE', 20)->nullable();
            $table->string('TRP_CBAR', 30)->nullable()->index('trp_kcbar');
            $table->boolean('TRP_DORT')->nullable()->index('trp_kdort');
            $table->dateTime('TRP_DTMAJ')->nullable();
            $table->string('TRP_USRMAJ', 20)->nullable();
            $table->integer('TRP_NUMMAJ')->nullable();

            $table->primary(['TRP_CODE'], 'trp_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TRANSPORT');
    }
};
