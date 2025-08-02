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
        Schema::create('TVA_LIG', function (Blueprint $table) {
            $table->string('TVA_NUMERO', 10);
            $table->string('TVL_NUMERO', 3);
            $table->string('TVL_LIB', 60)->nullable();
            $table->string('TVL_SECTIO', 1)->nullable();
            $table->string('TVL_REGBAS', 100)->nullable();
            $table->string('TVL_REGPRV', 100)->nullable();
            $table->decimal('TVL_MTBAS', 20, 4)->nullable();
            $table->decimal('TVL_MTPRV', 20, 4)->nullable();

            $table->primary(['TVA_NUMERO', 'TVL_NUMERO'], 'tvl_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TVA_LIG');
    }
};
