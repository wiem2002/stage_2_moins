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
        Schema::create('IMO_ANAREP', function (Blueprint $table) {
            $table->string('IMO_CODE', 15);
            $table->string('ANA_PLAN', 15);
            $table->string('ANA_CODE', 15);
            $table->decimal('ANR_TAUX', 8, 3)->nullable();

            $table->primary(['IMO_CODE', 'ANA_PLAN', 'ANA_CODE'], 'iva_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('IMO_ANAREP');
    }
};
