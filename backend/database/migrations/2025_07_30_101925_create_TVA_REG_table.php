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
        Schema::create('TVA_REG', function (Blueprint $table) {
            $table->string('TVA_NUMERO', 10);
            $table->string('TVR_NUMERO', 4);
            $table->string('TVR_LIB', 60)->nullable();
            $table->string('TVR_TYPE', 1)->nullable();
            $table->string('TVR_NATURE', 2)->nullable();
            $table->decimal('TVR_TAUX', 8, 3)->nullable();
            $table->string('TVR_RACBAS', 25)->nullable();
            $table->string('TVR_RACPRV', 25)->nullable();
            $table->string('TVR_OPERAT', 1)->nullable();
            $table->decimal('TVR_MTBAS', 20, 4)->nullable();
            $table->decimal('TVR_MTPRV', 20, 4)->nullable();

            $table->primary(['TVA_NUMERO', 'TVR_NUMERO'], 'tvr_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TVA_REG');
    }
};
