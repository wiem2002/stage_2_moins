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
        Schema::create('LIB_LANG', function (Blueprint $table) {
            $table->string('LIB_TABLE', 3);
            $table->string('LIB_ORIGIN', 30);
            $table->string('LIB_LANGUE', 15);
            $table->string('LIB_TEXT', 250)->nullable();

            $table->unique(['LIB_TABLE', 'LIB_LANGUE', 'LIB_ORIGIN'], 'lib_klang');
            $table->primary(['LIB_TABLE', 'LIB_ORIGIN', 'LIB_LANGUE'], 'lib_porig');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('LIB_LANG');
    }
};
