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
        Schema::create('BUDGETS_LIGNES', function (Blueprint $table) {
            $table->string('BUD_CODE', 20);
            $table->string('LBD_NUMERO', 5);
            $table->string('LBD_CPTSEC', 200)->nullable();
            $table->string('LBD_COMMNT', 100)->nullable();

            $table->primary(['BUD_CODE', 'LBD_NUMERO'], 'bud_pligne');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('BUDGETS_LIGNES');
    }
};
