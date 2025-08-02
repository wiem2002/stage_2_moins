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
        Schema::create('TABLES', function (Blueprint $table) {
            $table->string('TBL_ID', 3);
            $table->string('TBL_CODE', 15);
            $table->string('TBL_LIB', 200)->nullable();
            $table->boolean('TBL_BOOL')->nullable();
            $table->boolean('TBL_BOOL2')->nullable();
            $table->boolean('TBL_BOOL3')->nullable();
            $table->dateTime('TBL_DATE')->nullable();
            $table->float('TBL_VALUE', 53, 0)->nullable();
            $table->integer('TBL_INT')->nullable();
            $table->string('TBL_TYPE', 1)->nullable();
            $table->string('TBL_DIVERS', 60)->nullable();
            $table->string('TBL_DIVER2', 60)->nullable();
            $table->integer('TBL_COLOR')->nullable();

            $table->index(['TBL_ID', 'TBL_LIB'], 'tbl_klib');
            $table->primary(['TBL_ID', 'TBL_CODE'], 'tbl_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TABLES');
    }
};
