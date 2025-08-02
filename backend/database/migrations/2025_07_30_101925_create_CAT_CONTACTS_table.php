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
        Schema::create('CAT_CONTACTS', function (Blueprint $table) {
            $table->string('CAT_ID', 38);
            $table->string('CAT_USER', 20);
            $table->string('CCT_NUMERO', 10);

            $table->primary(['CAT_ID', 'CAT_USER', 'CCT_NUMERO'], 'cac_pid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CAT_CONTACTS');
    }
};
