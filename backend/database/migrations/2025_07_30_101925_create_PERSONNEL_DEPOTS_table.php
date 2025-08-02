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
        Schema::create('PERSONNEL_DEPOTS', function (Blueprint $table) {
            $table->string('SAL_CODE', 3);
            $table->string('DEP_CODE', 3);

            $table->primary(['SAL_CODE', 'DEP_CODE'], 'dsl_pcde');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PERSONNEL_DEPOTS');
    }
};
