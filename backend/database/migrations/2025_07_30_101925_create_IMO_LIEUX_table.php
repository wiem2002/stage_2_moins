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
        Schema::create('IMO_LIEUX', function (Blueprint $table) {
            $table->string('LII_CODE', 3);
            $table->string('LII_LIB', 40)->nullable();
            $table->string('LII_RS', 60)->nullable();
            $table->string('LII_RS2', 60)->nullable();
            $table->string('LII_RUE', 60)->nullable();
            $table->string('LII_COMP', 60)->nullable();
            $table->string('LII_EMPL', 250)->nullable();
            $table->string('LII_ETAT', 100)->nullable();
            $table->string('LII_REG', 100)->nullable();
            $table->string('LII_CP', 10)->nullable();
            $table->string('LII_VILLE', 200)->nullable();
            $table->string('PAY_CODE', 3)->nullable();
            $table->string('LII_URL', 128)->nullable();
            $table->boolean('LII_DORT')->nullable()->index('lii_kdort');
            $table->dateTime('LII_DTCRE')->nullable();
            $table->string('LII_USRCRE', 20)->nullable();
            $table->dateTime('LII_DTMAJ')->nullable();
            $table->string('LII_USRMAJ', 20)->nullable();
            $table->integer('LII_NUMMAJ')->nullable();

            $table->primary(['LII_CODE'], 'lii_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('IMO_LIEUX');
    }
};
