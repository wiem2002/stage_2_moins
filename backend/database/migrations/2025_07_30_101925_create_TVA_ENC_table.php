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
        Schema::create('TVA_ENC', function (Blueprint $table) {
            $table->string('ECR_NUMERO', 10);
            $table->string('ECR_COMPTE', 25)->nullable();
            $table->string('ECR_PIECE', 30)->nullable();
            $table->string('TVA_COMPTE', 25)->nullable();
            $table->dateTime('TVA_DT_ECH')->nullable();
            $table->decimal('TVA_DEBIT', 20, 4)->nullable();
            $table->decimal('TVA_CREDIT', 20, 4)->nullable();
            $table->decimal('TVA_D_EURO', 20, 4)->nullable();
            $table->decimal('TVA_C_EURO', 20, 4)->nullable();
            $table->decimal('TVA_D_DEV', 20, 4)->nullable();
            $table->decimal('TVA_C_DEV', 20, 4)->nullable();
            $table->string('DEV_CODE', 3)->nullable();
            $table->string('TVA_ETAT', 1)->nullable();
            $table->string('TVA_NUMERO', 10)->nullable();
            $table->string('TVR_NUMERO', 4)->nullable();

            $table->index(['TVA_COMPTE', 'TVA_DT_ECH'], 'tva_kdate');
            $table->primary(['ECR_NUMERO'], 'tva_pecr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TVA_ENC');
    }
};
