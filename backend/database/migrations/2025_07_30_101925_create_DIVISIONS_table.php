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
        Schema::create('DIVISIONS', function (Blueprint $table) {
            $table->string('DIV_CODE', 3);
            $table->string('SRV_CODE', 3)->nullable();
            $table->string('DIV_LIB', 40)->nullable();
            $table->decimal('DIV_BUDGET', 20, 4)->nullable();
            $table->boolean('DIV_DORT')->nullable()->index('div_kdort');
            $table->dateTime('DIV_DTMAJ')->nullable();
            $table->string('DIV_USRMAJ', 20)->nullable();
            $table->integer('DIV_NUMMAJ')->nullable();

            $table->unique(['SRV_CODE', 'DIV_CODE'], 'div_ksrv');
            $table->primary(['DIV_CODE'], 'div_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DIVISIONS');
    }
};
