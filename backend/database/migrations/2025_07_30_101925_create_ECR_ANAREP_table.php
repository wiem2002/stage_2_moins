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
        Schema::create('ECR_ANAREP', function (Blueprint $table) {
            $table->string('ECR_NUMERO', 10);
            $table->string('ANA_PLAN', 15);
            $table->string('ANA_CODE', 15);
            $table->float('EAN_QTE', 53, 0)->nullable();
            $table->decimal('EAN_D_DEV', 20, 4)->nullable();
            $table->decimal('EAN_C_DEV', 20, 4)->nullable();
            $table->decimal('EAN_DEBIT', 20, 4)->nullable();
            $table->decimal('EAN_CREDIT', 20, 4)->nullable();
            $table->decimal('EAN_D_EURO', 20, 4)->nullable();
            $table->decimal('EAN_C_EURO', 20, 4)->nullable();

            $table->primary(['ECR_NUMERO', 'ANA_PLAN', 'ANA_CODE'], 'ean_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ECR_ANAREP');
    }
};
