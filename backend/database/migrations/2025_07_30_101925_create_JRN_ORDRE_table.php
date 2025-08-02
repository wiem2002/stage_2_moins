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
        Schema::create('JRN_ORDRE', function (Blueprint $table) {
            $table->string('JRN_CODE', 10);
            $table->string('EXE_CODE', 3);
            $table->string('JRN_NORDRE', 6)->nullable();

            $table->primary(['JRN_CODE', 'EXE_CODE'], 'jrn_pordre');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('JRN_ORDRE');
    }
};
