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
        Schema::create('TIERS_FAM', function (Blueprint $table) {
            $table->string('FAT_CODE', 10);
            $table->string('FAT_LIB', 40)->nullable()->index('fat_klib');
            $table->boolean('FAT_EN_TTC')->nullable();
            $table->decimal('FAT_REMVAL', 8, 3)->nullable();
            $table->decimal('FAT_REMMIN', 20, 4)->nullable();
            $table->decimal('FAT_TX_ESC', 8, 3)->nullable();
            $table->string('SRV_CODE', 3)->nullable();
            $table->string('DIV_CODE', 3)->nullable();
            $table->string('FAT_URGENT', 1)->nullable();
            $table->string('TAR_CODE', 30)->nullable();
            $table->string('FAT_NATVTE', 3)->nullable();
            $table->string('FAT_NATACH', 3)->nullable();
            $table->string('NAT_CODE', 3)->nullable();
            $table->string('REG_CODE', 8)->nullable();
            $table->string('FAT_EXCMDE', 1)->nullable();
            $table->string('FAT_EXBL', 1)->nullable();
            $table->string('FAT_EXFACT', 1)->nullable();
            $table->string('FAT_REGBL', 1)->nullable();
            $table->string('FAT_PERIOD', 15)->nullable();
            $table->boolean('FAT_DORT')->nullable()->index('fat_kdort');
            $table->dateTime('FAT_DTMAJ')->nullable();
            $table->string('FAT_USRMAJ', 20)->nullable();
            $table->integer('FAT_NUMMAJ')->nullable();
            $table->string('XXX_RESREG')->nullable();

            $table->primary(['FAT_CODE'], 'fat_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TIERS_FAM');
    }
};
