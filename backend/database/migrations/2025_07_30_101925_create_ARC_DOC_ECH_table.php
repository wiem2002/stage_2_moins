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
        Schema::create('ARC_DOC_ECH', function (Blueprint $table) {
            $table->string('DOC_NUMERO', 10);
            $table->string('DOC_NUMORI', 10)->nullable();
            $table->string('ECH_ORDER', 5);
            $table->string('ECH_NUMERO', 10)->nullable()->index('adc_knum');
            $table->string('DOC_STYPE', 1)->nullable();
            $table->string('DOC_PIECE', 30)->nullable();
            $table->string('ECH_LIB', 60)->nullable();
            $table->string('REG_CODE', 8)->nullable();
            $table->float('ECH_PCENT', 53, 0)->nullable();
            $table->boolean('ECH_SUR_HT')->nullable();
            $table->decimal('ECH_MT', 20, 4)->nullable();
            $table->decimal('ECH_LIVRE', 20, 4)->nullable();
            $table->dateTime('ECH_DATE')->nullable();
            $table->boolean('ECH_ACOMPT')->nullable();
            $table->boolean('ECH_RETENU')->nullable();
            $table->string('ECH_CLEINA', 300)->nullable();

            $table->primary(['DOC_NUMERO', 'ECH_ORDER'], 'adc_pech');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ARC_DOC_ECH');
    }
};
