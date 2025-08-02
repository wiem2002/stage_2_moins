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
        Schema::create('TVA_CPT', function (Blueprint $table) {
            $table->string('TVA_NUMERO', 10);
            $table->string('CPT_NUMERO', 25);
            $table->string('ECR_NUMERO', 10)->nullable();
            $table->decimal('CPT_D_DEV', 20, 4)->nullable();
            $table->decimal('CPT_C_DEV', 20, 4)->nullable();

            $table->primary(['TVA_NUMERO', 'CPT_NUMERO'], 'tva_pcpt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TVA_CPT');
    }
};
