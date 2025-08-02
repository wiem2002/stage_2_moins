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
        Schema::create('BUDGETS_PERIODES', function (Blueprint $table) {
            $table->string('BUD_CODE', 20);
            $table->string('LBD_NUMERO', 5);
            $table->string('EXE_CODE', 5);
            $table->string('PER_CODE', 3);
            $table->decimal('PBD_BUDGET', 20, 4)->nullable();
            $table->decimal('PBD_REALIS', 20, 4)->nullable();
            $table->decimal('PBD_ECART', 20, 4)->nullable();
            $table->float('PBD_PCTECA', 53, 0)->nullable();
            $table->float('PBD_PCTAVA', 53, 0)->nullable();

            $table->primary(['BUD_CODE', 'LBD_NUMERO', 'EXE_CODE', 'PER_CODE'], 'bud_pperio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('BUDGETS_PERIODES');
    }
};
