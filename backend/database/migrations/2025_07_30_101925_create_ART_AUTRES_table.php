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
        Schema::create('ART_AUTRES', function (Blueprint $table) {
            $table->string('ART_CODE', 30);
            $table->string('ART_PAUTRE', 1);
            $table->string('ART_AUTRE', 30);

            $table->primary(['ART_CODE', 'ART_PAUTRE', 'ART_AUTRE'], 'art_partau');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ART_AUTRES');
    }
};
