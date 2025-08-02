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
        Schema::create('REL_ECH', function (Blueprint $table) {
            $table->string('REL_NUMERO', 10);
            $table->string('ECH_NUMERO', 10);
            $table->decimal('REL_MT', 20, 4)->nullable();
            $table->decimal('REL_MTD', 20, 4)->nullable();
            $table->decimal('REL_MTE', 20, 4)->nullable();

            $table->unique(['ECH_NUMERO', 'REL_NUMERO'], 'rel_kech');
            $table->primary(['REL_NUMERO', 'ECH_NUMERO'], 'rel_prel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('REL_ECH');
    }
};
