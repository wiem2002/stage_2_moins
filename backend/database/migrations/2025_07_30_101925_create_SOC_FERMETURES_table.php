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
        Schema::create('SOC_FERMETURES', function (Blueprint $table) {
            $table->string('LFS_NUMERO', 5);
            $table->dateTime('LFS_DEBUT')->nullable();
            $table->dateTime('LFS_FIN')->nullable();
            $table->string('LFS_LIB', 100)->nullable();

            $table->unique(['LFS_DEBUT', 'LFS_FIN'], 'lfs_kdate');
            $table->primary(['LFS_NUMERO'], 'lfs_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SOC_FERMETURES');
    }
};
