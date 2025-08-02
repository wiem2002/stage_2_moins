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
        Schema::create('CONNEXIONS2', function (Blueprint $table) {
            $table->string('CNX_APPLI', 20);
            $table->string('CNX_BASE', 100);
            $table->string('CNX_USER', 20);

            $table->primary(['CNX_APPLI', 'CNX_BASE', 'CNX_USER'], 'cx2_pbase');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CONNEXIONS2');
    }
};
