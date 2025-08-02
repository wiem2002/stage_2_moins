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
        Schema::create('HDEVISES', function (Blueprint $table) {
            $table->string('DEV_CODE', 3);
            $table->dateTime('DEV_DATE');
            $table->float('DEV_COURSC', 53, 0)->nullable();
            $table->float('DEV_COURSI', 53, 0)->nullable();

            $table->primary(['DEV_CODE', 'DEV_DATE'], 'dev_phist');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('HDEVISES');
    }
};
