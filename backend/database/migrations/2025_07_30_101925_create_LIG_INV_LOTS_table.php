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
        Schema::create('LIG_INV_LOTS', function (Blueprint $table) {
            $table->string('DOC_NUMERO', 10);
            $table->string('LIG_NUMERO', 5);
            $table->string('LIG_SUBNUM', 5);
            $table->string('LLI_NUMLOT', 25);
            $table->string('LLI_CBAR', 30)->nullable();
            $table->float('LLI_QTE', 53, 0)->nullable();
            $table->dateTime('LLI_DT_FAB')->nullable();
            $table->boolean('LLI_PERIMA')->nullable();
            $table->dateTime('LLI_DT_PER')->nullable();
            $table->integer('LLI_DELCOM')->nullable();
            $table->integer('LLI_DREVIE')->nullable();
            $table->boolean('LLI_ALMIVI')->nullable();

            $table->primary(['DOC_NUMERO', 'LIG_NUMERO', 'LIG_SUBNUM', 'LLI_NUMLOT'], 'lli_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('LIG_INV_LOTS');
    }
};
