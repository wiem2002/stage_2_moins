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
        Schema::create('ART_CLIENT', function (Blueprint $table) {
            $table->string('PCF_CODE', 20);
            $table->string('ART_CODE', 30);
            $table->string('ART_GAMME', 35);
            $table->string('ART_PCLIENT', 1);
            $table->string('ART_REFCLI', 30)->nullable();
            $table->boolean('ART_PAYEUR')->nullable();

            $table->unique(['ART_CODE', 'ART_GAMME', 'PCF_CODE', 'ART_PCLIENT'], 'art_kclt2');
            $table->primary(['PCF_CODE', 'ART_CODE', 'ART_GAMME', 'ART_PCLIENT'], 'art_pclt1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ART_CLIENT');
    }
};
