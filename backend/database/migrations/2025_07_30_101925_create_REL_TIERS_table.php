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
        Schema::create('REL_TIERS', function (Blueprint $table) {
            $table->string('REL_NUMERO', 10);
            $table->string('PCF_CODE', 20);
            $table->text('REL_REPONS')->nullable();
            $table->text('REL_MEMO')->nullable();

            $table->unique(['PCF_CODE', 'REL_NUMERO'], 'rel_kpcf');
            $table->primary(['REL_NUMERO', 'PCF_CODE'], 'rel_prelt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('REL_TIERS');
    }
};
