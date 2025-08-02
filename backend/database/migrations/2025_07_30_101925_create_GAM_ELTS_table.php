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
        Schema::create('GAM_ELTS', function (Blueprint $table) {
            $table->string('GAE_CODE', 10);
            $table->string('GAE_LIB', 60)->nullable()->index('gae_klib');
            $table->text('GAE_MEMO')->nullable();
            $table->boolean('GAE_DORT')->nullable()->index('gae_kdort');
            $table->dateTime('GAE_DTMAJ')->nullable();
            $table->string('GAE_USRMAJ', 20)->nullable();
            $table->integer('GAE_NUMMAJ')->nullable();

            $table->primary(['GAE_CODE'], 'gae_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('GAM_ELTS');
    }
};
