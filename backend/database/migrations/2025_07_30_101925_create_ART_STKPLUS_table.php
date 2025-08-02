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
        Schema::create('ART_STKPLUS', function (Blueprint $table) {
            $table->string('DEP_CODE', 3);
            $table->string('STK_ZONE', 100);
            $table->string('ART_CODE', 30);
            $table->string('ART_GAMME', 35);
            $table->string('STK_NUMLOT', 25);
            $table->string('STK_CBRLOT', 30)->nullable();
            $table->dateTime('STK_DT_PER');
            $table->string('STK_CONDT', 12);
            $table->string('STK_UC', 15)->nullable();
            $table->float('STK_COND', 53, 0)->nullable();
            $table->string('STK_UB', 15)->nullable();
            $table->float('STK_UCUV', 53, 0)->nullable();
            $table->float('STK_REEL', 53, 0)->nullable();
            $table->float('STK_PREC', 53, 0)->nullable();

            $table->index(['DEP_CODE', 'ART_CODE', 'ART_GAMME', 'STK_NUMLOT', 'STK_ZONE'], 'stk_kartz');
            $table->primary(['DEP_CODE', 'STK_ZONE', 'ART_CODE', 'ART_GAMME', 'STK_NUMLOT', 'STK_CONDT', 'STK_DT_PER'], 'stk_pzone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ART_STKPLUS');
    }
};
