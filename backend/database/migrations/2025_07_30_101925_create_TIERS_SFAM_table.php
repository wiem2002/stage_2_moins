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
        Schema::create('TIERS_SFAM', function (Blueprint $table) {
            $table->string('SFT_CODE', 10);
            $table->string('SFT_LIB', 40)->nullable()->index('sft_klib');
            $table->string('FAT_CODE', 10)->nullable();
            $table->boolean('SFT_EN_TTC')->nullable();
            $table->decimal('SFT_REMVAL', 8, 3)->nullable();
            $table->decimal('SFT_REMMIN', 20, 4)->nullable();
            $table->decimal('SFT_TX_ESC', 8, 3)->nullable();
            $table->string('SRV_CODE', 3)->nullable();
            $table->string('DIV_CODE', 3)->nullable();
            $table->string('SFT_URGENT', 1)->nullable();
            $table->string('TAR_CODE', 30)->nullable();
            $table->string('SFT_NATVTE', 3)->nullable();
            $table->string('SFT_NATACH', 3)->nullable();
            $table->string('NAT_CODE', 3)->nullable();
            $table->string('REG_CODE', 8)->nullable();
            $table->string('SFT_EXCMDE', 1)->nullable();
            $table->string('SFT_EXBL', 1)->nullable();
            $table->string('SFT_EXFACT', 1)->nullable();
            $table->string('SFT_REGBL', 1)->nullable();
            $table->string('SFT_PERIOD', 15)->nullable();
            $table->boolean('SFT_DORT')->nullable()->index('sft_kdort');
            $table->dateTime('SFT_DTMAJ')->nullable();
            $table->string('SFT_USRMAJ', 20)->nullable();
            $table->integer('SFT_NUMMAJ')->nullable();
            $table->string('XXX_CMT', 20)->nullable();

            $table->primary(['SFT_CODE'], 'sft_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TIERS_SFAM');
    }
};
