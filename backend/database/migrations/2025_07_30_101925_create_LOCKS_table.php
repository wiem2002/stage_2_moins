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
        Schema::create('LOCKS', function (Blueprint $table) {
            $table->string('LCK_ID', 80);
            $table->string('LCK_USER', 20)->nullable();
            $table->string('LCK_APPLI', 20)->nullable();
            $table->integer('LCK_VALUE')->nullable();
            $table->integer('LCK_VALUE2')->nullable();
            $table->dateTime('LCK_DTLAST')->nullable();

            $table->primary(['LCK_ID'], 'lck_pid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('LOCKS');
    }
};
