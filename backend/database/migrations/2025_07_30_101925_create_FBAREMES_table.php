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
        Schema::create('FBAREMES', function (Blueprint $table) {
            $table->string('COM_CODE', 6);
            $table->string('COM_INCLUS', 1);
            $table->string('COM_QUOI', 3);
            $table->string('COM_BORNEA', 30);
            $table->string('COM_BORNEB', 30)->nullable();

            $table->primary(['COM_CODE', 'COM_INCLUS', 'COM_QUOI', 'COM_BORNEA'], 'com_pquoi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('FBAREMES');
    }
};
