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
        Schema::create('FAC_ECH', function (Blueprint $table) {
            $table->string('FAA_NUMERO', 10);
            $table->string('ECH_ORDER', 5);
            $table->string('ECH_NUMERO', 10)->nullable()->index('fac_knum');
            $table->string('DOC_STYPE', 1)->nullable();
            $table->string('ECH_LIB', 60)->nullable();
            $table->string('REG_CODE', 8)->nullable();
            $table->float('ECH_PCENT', 53, 0)->nullable();
            $table->decimal('ECH_MT', 20, 4)->nullable();
            $table->dateTime('ECH_DATE')->nullable();
            $table->string('ECH_CLEINA', 300)->nullable();

            $table->primary(['FAA_NUMERO', 'ECH_ORDER'], 'fac_pech');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('FAC_ECH');
    }
};
