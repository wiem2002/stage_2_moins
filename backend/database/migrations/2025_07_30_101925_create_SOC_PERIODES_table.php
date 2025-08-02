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
        Schema::create('SOC_PERIODES', function (Blueprint $table) {
            $table->string('EXE_CODE', 3);
            $table->string('PER_CODE', 3);
            $table->string('PER_LIB', 20)->nullable();
            $table->dateTime('PER_DT_DEB')->nullable();
            $table->dateTime('PER_DT_FIN')->nullable();

            $table->primary(['EXE_CODE', 'PER_CODE'], 'per_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SOC_PERIODES');
    }
};
