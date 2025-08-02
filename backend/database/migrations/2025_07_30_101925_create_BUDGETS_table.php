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
        Schema::create('BUDGETS', function (Blueprint $table) {
            $table->string('BUD_CODE', 20);
            $table->string('BUD_LIB', 100)->nullable();
            $table->string('BUD_TYPE', 1)->nullable();
            $table->string('BUD_PLAN', 15)->nullable();
            $table->string('BUD_SENS', 1)->nullable();
            $table->boolean('BUD_DORT')->nullable()->index('bud_kdort');
            $table->dateTime('BUD_DTCRE')->nullable();
            $table->string('BUD_USRCRE', 20)->nullable();
            $table->dateTime('BUD_DTMAJ')->nullable();
            $table->string('BUD_USRMAJ', 20)->nullable();
            $table->integer('BUD_NUMMAJ')->nullable();

            $table->primary(['BUD_CODE'], 'bud_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('BUDGETS');
    }
};
