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
        Schema::create('RECALCUL', function (Blueprint $table) {
            $table->dateTime('DOC_DATE');
            $table->integer('REC_QUOI')->nullable();

            $table->primary(['DOC_DATE'], 'rec_pdate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('RECALCUL');
    }
};
