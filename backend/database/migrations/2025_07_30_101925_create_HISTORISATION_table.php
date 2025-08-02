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
        Schema::create('HISTORISATION', function (Blueprint $table) {
            $table->string('HIS_NUMERO', 10);
            $table->dateTime('HIS_DATE')->nullable();
            $table->string('USR_NAME', 20)->nullable();
            $table->string('HIS_OPE', 3)->nullable();
            $table->string('HIS_FONCT', 25)->nullable();
            $table->string('HIS_DETAIL', 1000)->nullable();
            $table->string('HIS_ORIGIN', 6)->nullable();

            $table->primary(['HIS_NUMERO'], 'his_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('HISTORISATION');
    }
};
