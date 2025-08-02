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
        Schema::create('REG_ECH', function (Blueprint $table) {
            $table->string('REG_NUMERO', 10);
            $table->string('ECH_NUMERO', 10);
            $table->decimal('REG_MT', 20, 4)->nullable();
            $table->decimal('REG_ECART', 20, 4)->nullable();

            $table->unique(['ECH_NUMERO', 'REG_NUMERO'], 'reg_kech');
            $table->primary(['REG_NUMERO', 'ECH_NUMERO'], 'reg_preg');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('REG_ECH');
    }
};
