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
        Schema::create('TVA_PARAM_REG', function (Blueprint $table) {
            $table->string('TVR_NUMERO', 4);
            $table->string('TVR_LIB', 60)->nullable();
            $table->string('TVR_TYPE', 1)->nullable();
            $table->string('TVR_NATURE', 2)->nullable();
            $table->decimal('TVR_TAUX', 8, 3)->nullable();
            $table->string('TVR_RACBAS', 25)->nullable();
            $table->string('TVR_RACPRV', 25)->nullable();
            $table->string('TVR_OPERAT', 1)->nullable();

            $table->primary(['TVR_NUMERO'], 'tvr_pnump');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TVA_PARAM_REG');
    }
};
