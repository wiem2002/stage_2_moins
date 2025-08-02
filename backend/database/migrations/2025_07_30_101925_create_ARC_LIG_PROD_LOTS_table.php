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
        Schema::create('ARC_LIG_PROD_LOTS', function (Blueprint $table) {
            $table->string('DOC_NUMERO', 10);
            $table->string('LIG_NUMERO', 5);
            $table->string('LIG_SUBNUM', 5);
            $table->string('LCL_NUMLOT', 25);
            $table->string('LCL_CBAR', 30)->nullable();
            $table->float('LCL_QTE', 53, 0)->nullable();
            $table->float('LCL_QTETOT', 53, 0)->nullable();
            $table->dateTime('LCL_DT_FAB')->nullable();
            $table->boolean('LCL_PERIMA')->nullable();
            $table->dateTime('LCL_DT_PER')->nullable();
            $table->integer('LCL_DELCOM')->nullable();
            $table->integer('LCL_DREVIE')->nullable();
            $table->boolean('LCL_ALMIVI')->nullable();

            $table->primary(['DOC_NUMERO', 'LIG_NUMERO', 'LIG_SUBNUM', 'LCL_NUMLOT'], 'lca_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ARC_LIG_PROD_LOTS');
    }
};
