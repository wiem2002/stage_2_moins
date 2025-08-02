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
        Schema::create('PERSONNEL_ABSENCES', function (Blueprint $table) {
            $table->string('SAL_CODE', 3);
            $table->string('LAS_NUMERO', 5);
            $table->dateTime('LAS_DEBUT')->nullable();
            $table->dateTime('LAS_FIN')->nullable();
            $table->string('LAS_TYPE', 15)->nullable();
            $table->string('LAS_LIB', 100)->nullable();

            $table->unique(['SAL_CODE', 'LAS_DEBUT', 'LAS_FIN'], 'las_kdate');
            $table->primary(['SAL_CODE', 'LAS_NUMERO'], 'las_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PERSONNEL_ABSENCES');
    }
};
