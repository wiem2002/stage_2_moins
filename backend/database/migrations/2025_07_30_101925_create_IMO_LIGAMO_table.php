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
        Schema::create('IMO_LIGAMO', function (Blueprint $table) {
            $table->string('IMO_CODE', 15);
            $table->decimal('LIG_NUMERO', 8, 3);
            $table->boolean('LIG_SLDEE')->nullable();
            $table->decimal('LIG_MTBSE', 20, 4)->nullable();
            $table->dateTime('LIG_DTDEB')->nullable();
            $table->dateTime('LIG_DTFIN')->nullable();
            $table->decimal('LIG_MTDOT', 20, 4)->nullable();
            $table->decimal('LIG_MTCDOT', 20, 4)->nullable();
            $table->decimal('LIG_MTVNC', 20, 4)->nullable();
            $table->float('LIG_TXGAMO', 53, 0)->nullable();
            $table->dateTime('LIG_CPTLE')->nullable();
            $table->string('LIG_CPTPAR', 20)->nullable();

            $table->primary(['IMO_CODE', 'LIG_NUMERO'], 'imo_lnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('IMO_LIGAMO');
    }
};
