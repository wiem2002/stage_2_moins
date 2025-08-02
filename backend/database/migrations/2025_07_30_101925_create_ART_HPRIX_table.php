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
        Schema::create('ART_HPRIX', function (Blueprint $table) {
            $table->string('ART_CODE', 30);
            $table->string('DEV_CODE', 3);
            $table->string('ART_GAMME', 35);
            $table->dateTime('ART_DTMAJ');
            $table->decimal('ART_P_ACH', 20, 4)->nullable();
            $table->decimal('ART_P_VTE', 20, 4)->nullable();

            $table->primary(['ART_CODE', 'DEV_CODE', 'ART_GAMME', 'ART_DTMAJ'], 'art_phprix');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ART_HPRIX');
    }
};
