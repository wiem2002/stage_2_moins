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
        Schema::create('MOVEAN', function (Blueprint $table) {
            $table->string('MVN_CODE', 15);
            $table->string('MVN_LIB', 60)->nullable();
            $table->text('MVN_COMMEN')->nullable();
            $table->boolean('MVN_DORT')->nullable()->index('mvn_kdort');
            $table->dateTime('MVN_DTCRE')->nullable();
            $table->string('MVN_USRCRE', 20)->nullable();
            $table->dateTime('MVN_DTMAJ')->nullable();
            $table->string('MVN_USRMAJ', 20)->nullable();
            $table->integer('MVN_NUMMAJ')->nullable();

            $table->primary(['MVN_CODE'], 'mvn_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('MOVEAN');
    }
};
