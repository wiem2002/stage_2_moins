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
        Schema::create('TVA_PARAM_LIG', function (Blueprint $table) {
            $table->string('TVL_NUMERO', 3);
            $table->string('TVL_LIB', 60)->nullable();
            $table->string('TVL_SECTIO', 1)->nullable();
            $table->string('TVL_REGBAS', 100)->nullable();
            $table->string('TVL_REGPRV', 100)->nullable();

            $table->primary(['TVL_NUMERO'], 'tvl_pnump');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TVA_PARAM_LIG');
    }
};
