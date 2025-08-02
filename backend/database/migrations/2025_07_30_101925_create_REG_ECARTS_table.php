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
        Schema::create('REG_ECARTS', function (Blueprint $table) {
            $table->string('REG_NUMERO', 10);
            $table->string('ERG_CODE', 15);
            $table->decimal('ERG_MT', 20, 4)->nullable();
            $table->decimal('ERG_MTD', 20, 4)->nullable();
            $table->decimal('ERG_MTE', 20, 4)->nullable();
            $table->string('CPT_NUMERO', 25)->nullable();
            $table->string('ECR_NUMERO', 10)->nullable();

            $table->primary(['REG_NUMERO', 'ERG_CODE'], 'erg_preg');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('REG_ECARTS');
    }
};
