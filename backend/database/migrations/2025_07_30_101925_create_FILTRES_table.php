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
        Schema::create('FILTRES', function (Blueprint $table) {
            $table->string('FIL_NUMERO', 10);
            $table->string('FIL_TABLE', 26)->nullable();
            $table->string('FIL_LIB', 40)->nullable();
            $table->string('FIL_TYPE', 1)->nullable();
            $table->string('FIL_USER', 20)->nullable();
            $table->string('FIL_GROUPE', 20)->nullable();
            $table->text('FIL_MEMO')->nullable();

            $table->index(['FIL_TABLE', 'FIL_LIB', 'FIL_TYPE', 'FIL_NUMERO'], 'fil_kcode');
            $table->primary(['FIL_NUMERO'], 'fil_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('FILTRES');
    }
};
