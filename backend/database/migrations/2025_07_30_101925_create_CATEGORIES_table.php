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
        Schema::create('CATEGORIES', function (Blueprint $table) {
            $table->string('CAT_ID', 38);
            $table->string('CAT_USER', 20)->index('cat_kuser');
            $table->string('CAT_NOM', 128)->nullable();
            $table->integer('CAT_COULEUR')->nullable();

            $table->primary(['CAT_ID', 'CAT_USER'], 'cat_pid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CATEGORIES');
    }
};
