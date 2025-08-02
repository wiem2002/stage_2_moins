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
        Schema::create('LBAREMES', function (Blueprint $table) {
            $table->string('COM_CODE', 6);
            $table->string('COM_TOBJ', 1);
            $table->decimal('COM_OBJ', 20, 4);
            $table->string('COM_DOMAIN', 1)->nullable();
            $table->string('COM_FORMUL', 40)->nullable();

            $table->primary(['COM_CODE', 'COM_TOBJ', 'COM_OBJ'], 'com_pobj');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('LBAREMES');
    }
};
