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
        Schema::create('GAMMES', function (Blueprint $table) {
            $table->string('GAM_CODE', 10);
            $table->string('GAM_LIB', 60)->nullable()->index('gam_klib');
            $table->boolean('GAM_CARTES')->nullable();
            $table->string('GAM_COMPO', 35)->nullable();
            $table->integer('GAM_LIGNE1')->nullable();
            $table->integer('GAM_LIGNE2')->nullable();
            $table->integer('GAM_LIGNE3')->nullable();
            $table->text('GAM_MEMO')->nullable();
            $table->boolean('GAM_DORT')->nullable()->index('gam_kdort');
            $table->dateTime('GAM_DTMAJ')->nullable();
            $table->string('GAM_USRMAJ', 20)->nullable();
            $table->integer('GAM_NUMMAJ')->nullable();

            $table->primary(['GAM_CODE'], 'gam_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('GAMMES');
    }
};
