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
        Schema::create('TIERS_RFA', function (Blueprint $table) {
            $table->string('PCF_CODE', 20);
            $table->dateTime('PCF_DT_RFA');
            $table->decimal('PCF_RFA', 20, 4)->nullable();

            $table->primary(['PCF_CODE', 'PCF_DT_RFA'], 'pcf_pdtrfa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TIERS_RFA');
    }
};
