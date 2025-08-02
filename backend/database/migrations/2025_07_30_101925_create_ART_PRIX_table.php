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
        Schema::create('ART_PRIX', function (Blueprint $table) {
            $table->string('ART_CODE', 30);
            $table->string('DEV_CODE', 3);
            $table->string('ART_GAMME', 35);
            $table->decimal('ART_P_ACH', 20, 4)->nullable();
            $table->float('ART_P_COEF', 53, 0)->nullable();
            $table->decimal('ART_P_VTE', 20, 4)->nullable();
            $table->dateTime('ART_DT_NEW')->nullable();
            $table->decimal('ART_N_ACH', 20, 4)->nullable();
            $table->float('ART_N_COEF', 53, 0)->nullable();
            $table->decimal('ART_N_VTE', 20, 4)->nullable();

            $table->primary(['ART_CODE', 'DEV_CODE', 'ART_GAMME'], 'art_pprix');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ART_PRIX');
    }
};
