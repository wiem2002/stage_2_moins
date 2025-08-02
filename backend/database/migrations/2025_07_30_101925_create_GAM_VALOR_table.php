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
        Schema::create('GAM_VALOR', function (Blueprint $table) {
            $table->string('GAE_CODE', 10);
            $table->string('GAV_ORDER', 5);
            $table->string('GAV_CODE', 10)->nullable();
            $table->string('GAV_LIB', 60)->nullable();

            $table->unique(['GAE_CODE', 'GAV_CODE'], 'gav_kcode');
            $table->primary(['GAE_CODE', 'GAV_ORDER'], 'gav_porder');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('GAM_VALOR');
    }
};
