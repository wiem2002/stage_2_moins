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
        Schema::create('ARC_EXERCICES', function (Blueprint $table) {
            $table->string('EXE_CODE', 3);
            $table->dateTime('EXE_DT_DEB')->nullable();
            $table->dateTime('EXE_DT_FIN')->nullable();
            $table->integer('EXE_NB_PER')->nullable();
            $table->boolean('EXE_PURGE')->nullable();

            $table->primary(['EXE_CODE'], 'exe_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ARC_EXERCICES');
    }
};
