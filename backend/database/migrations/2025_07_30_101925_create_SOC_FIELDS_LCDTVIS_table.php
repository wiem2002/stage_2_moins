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
        Schema::create('SOC_FIELDS_LCDTVIS', function (Blueprint $table) {
            $table->string('FCV_NUMERO', 15);
            $table->string('LVF_NUMERO', 5);
            $table->string('FLD_TABLE', 3)->nullable();
            $table->string('LVF_CHAMP', 15)->nullable();
            $table->string('LVF_VLEURS', 8000)->nullable();

            $table->primary(['FCV_NUMERO', 'LVF_NUMERO'], 'lvf_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SOC_FIELDS_LCDTVIS');
    }
};
