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
        Schema::create('PRJ_VENTES_BUDGETEES', function (Blueprint $table) {
            $table->string('PRJ_CODE', 40);
            $table->string('LPJ_NUMERO', 5);
            $table->string('FAR_CODE', 10)->nullable();
            $table->string('SFA_CODE', 10)->nullable();
            $table->string('ART_CODE', 30)->nullable();
            $table->string('DOC_NUMERO', 10)->nullable();
            $table->string('LPJ_LIB', 100)->nullable();
            $table->float('LPJ_QTE', 53, 0)->nullable();
            $table->decimal('LPJ_PRIXUN', 20, 4)->nullable();
            $table->decimal('LPJ_PRIXTO', 20, 4)->nullable();
            $table->float('LPJ_AVANCE', 53, 0)->nullable();

            $table->primary(['PRJ_CODE', 'LPJ_NUMERO'], 'lpj_pvteb');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PRJ_VENTES_BUDGETEES');
    }
};
