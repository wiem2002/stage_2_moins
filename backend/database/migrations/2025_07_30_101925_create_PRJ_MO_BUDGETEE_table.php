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
        Schema::create('PRJ_MO_BUDGETEE', function (Blueprint $table) {
            $table->string('PRJ_CODE', 40);
            $table->string('LPJ_NUMERO', 5);
            $table->string('LPJ_ID', 38)->nullable();
            $table->string('LPJ_TYPE', 15)->nullable();
            $table->string('LPJ_STYPE', 15)->nullable();
            $table->string('SAL_CRITE1', 15)->nullable();
            $table->string('SAL_CRITE2', 15)->nullable();
            $table->string('SAL_CRITE3', 15)->nullable();
            $table->string('SAL_CODE', 3)->nullable();
            $table->string('LPJ_LIB', 100)->nullable();
            $table->float('LPJ_QTE', 53, 0)->nullable();
            $table->decimal('LPJ_PRIXUN', 20, 4)->nullable();
            $table->decimal('LPJ_PRIXTO', 20, 4)->nullable();
            $table->float('LPJ_AVANCE', 53, 0)->nullable();
            $table->string('ART_CODE', 30)->nullable();
            $table->dateTime('LPJ_DTCRE')->nullable();
            $table->string('LPJ_USRCRE', 20)->nullable();
            $table->string('LPJ_TRTCRE', 3)->nullable();
            $table->dateTime('LPJ_DTMAJ')->nullable();
            $table->string('LPJ_USRMAJ', 20)->nullable();
            $table->string('LPJ_TRTMAJ', 3)->nullable();

            $table->primary(['PRJ_CODE', 'LPJ_NUMERO'], 'lpj_pmob');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PRJ_MO_BUDGETEE');
    }
};
