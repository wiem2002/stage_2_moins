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
        Schema::create('BAREMES', function (Blueprint $table) {
            $table->string('COM_CODE', 6);
            $table->string('COM_LIB', 40)->nullable()->index('com_klib');
            $table->string('DEV_CODE', 3)->nullable();
            $table->string('COM_CALCUL', 1)->nullable();
            $table->boolean('COM_DORT')->nullable()->index('com_kdort');
            $table->dateTime('COM_DTMAJ')->nullable();
            $table->string('COM_USRMAJ', 20)->nullable();
            $table->integer('COM_NUMMAJ')->nullable();

            $table->primary(['COM_CODE'], 'com_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('BAREMES');
    }
};
