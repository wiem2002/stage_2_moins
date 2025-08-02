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
        Schema::create('REMISE_FOURN', function (Blueprint $table) {
            $table->string('PCF_CODE', 20);
            $table->string('ART_CODREM', 10);
            $table->string('ART_REMISE', 30)->nullable();

            $table->primary(['PCF_CODE', 'ART_CODREM'], 'art_prem');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('REMISE_FOURN');
    }
};
