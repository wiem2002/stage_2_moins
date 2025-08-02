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
        Schema::create('DEVISES', function (Blueprint $table) {
            $table->string('DEV_CODE', 3);
            $table->string('DEV_LIB', 40)->nullable()->index('dev_klib');
            $table->string('DEV_MONEY', 12)->nullable();
            $table->string('DEV_MONEYS', 12)->nullable();
            $table->string('DEV_FORMAT', 20)->nullable();
            $table->string('DEV_NB_DEC', 1)->nullable();
            $table->string('DEV_SYMBOL', 3)->nullable();
            $table->dateTime('DEV_DT_ACT')->nullable();
            $table->boolean('DEV_INCERT')->nullable();
            $table->float('DEV_COURS', 53, 0)->nullable();
            $table->dateTime('DEV_DTEURO')->nullable();
            $table->float('DEV_EURO', 53, 0)->nullable();
            $table->boolean('DEV_DORT')->nullable()->index('dev_kdort');
            $table->dateTime('DEV_DTMAJ')->nullable();
            $table->string('DEV_USRMAJ', 20)->nullable();
            $table->integer('DEV_NUMMAJ')->nullable();

            $table->primary(['DEV_CODE'], 'dev_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DEVISES');
    }
};
