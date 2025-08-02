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
        Schema::create('CPT_REPORT', function (Blueprint $table) {
            $table->string('RPT_COMPTE', 15);
            $table->string('RPT_LIB', 40)->nullable()->index('rpt_klib');
            $table->string('RPT_TYPE', 1)->nullable();
            $table->boolean('RPT_DORT')->nullable()->index('rpt_kdort');
            $table->dateTime('RPT_DTMAJ')->nullable();
            $table->string('RPT_USRMAJ', 20)->nullable();
            $table->integer('RPT_NUMMAJ')->nullable();

            $table->primary(['RPT_COMPTE'], 'rpt_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CPT_REPORT');
    }
};
