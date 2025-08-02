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
        Schema::create('CPT_CUMUL', function (Blueprint $table) {
            $table->string('CPT_NUMERO', 25);
            $table->string('EXE_CODE', 3)->index('cpt_kexe');
            $table->float('CPT_QTE', 53, 0)->nullable();
            $table->decimal('CPT_D_DEV', 20, 4)->nullable();
            $table->decimal('CPT_C_DEV', 20, 4)->nullable();
            $table->string('DEV_CODE', 3)->nullable();
            $table->decimal('CPT_D_EURO', 20, 4)->nullable();
            $table->decimal('CPT_C_EURO', 20, 4)->nullable();
            $table->decimal('CPT_DEBIT', 20, 4)->nullable();
            $table->decimal('CPT_CREDIT', 20, 4)->nullable();
            $table->decimal('CPT_D_ANVV', 20, 4)->nullable();
            $table->decimal('CPT_C_ANVV', 20, 4)->nullable();
            $table->decimal('CPT_D_ANVE', 20, 4)->nullable();
            $table->decimal('CPT_C_ANVE', 20, 4)->nullable();
            $table->decimal('CPT_DANOUV', 20, 4)->nullable();
            $table->decimal('CPT_CANOUV', 20, 4)->nullable();

            $table->primary(['CPT_NUMERO', 'EXE_CODE'], 'cpt_pcumul');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CPT_CUMUL');
    }
};
