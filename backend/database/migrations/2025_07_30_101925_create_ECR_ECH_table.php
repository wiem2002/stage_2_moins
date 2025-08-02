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
        Schema::create('ECR_ECH', function (Blueprint $table) {
            $table->string('ECR_NUMERO', 10);
            $table->string('ECH_ORDER', 5);
            $table->string('ECH_NUMERO', 10)->nullable()->index('ech_knum');
            $table->string('ECH_STYPE', 1)->nullable();
            $table->string('ECR_COMPTE', 25)->nullable();
            $table->dateTime('ECH_DATE')->nullable();
            $table->string('REG_CODE', 8)->nullable();
            $table->float('ECH_PCENT', 53, 0)->nullable();
            $table->decimal('ECR_D_DEV', 20, 4)->nullable();
            $table->decimal('ECR_C_DEV', 20, 4)->nullable();
            $table->string('DEV_CODE', 3)->nullable();
            $table->decimal('ECR_DEBIT', 20, 4)->nullable();
            $table->decimal('ECR_CREDIT', 20, 4)->nullable();
            $table->decimal('ECR_D_EURO', 20, 4)->nullable();
            $table->decimal('ECR_C_EURO', 20, 4)->nullable();
            $table->string('ECH_LIB', 60)->nullable();
            $table->string('DOC_PIECE', 30)->nullable();
            $table->string('ECR_PIECE', 30)->nullable();
            $table->string('ECH_CLEINA', 300)->nullable();

            $table->index(['ECR_COMPTE', 'ECH_DATE'], 'ech_kcptdt');
            $table->index(['ECH_DATE', 'ECR_COMPTE'], 'ech_kdtcpt');
            $table->primary(['ECR_NUMERO', 'ECH_ORDER'], 'ech_pecr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ECR_ECH');
    }
};
