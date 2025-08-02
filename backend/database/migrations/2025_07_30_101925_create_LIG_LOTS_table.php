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
        Schema::create('LIG_LOTS', function (Blueprint $table) {
            $table->string('DOC_NUMERO', 10);
            $table->string('LIG_NUMERO', 5);
            $table->string('LIG_SUBNUM', 5);
            $table->string('LLD_NUMLOT', 25);
            $table->string('LLD_CBAR', 30)->nullable();
            $table->float('LLD_QTE', 53, 0)->nullable();
            $table->dateTime('LLD_DT_FAB')->nullable();
            $table->boolean('LLD_PERIMA')->nullable();
            $table->dateTime('LLD_DT_PER')->nullable();
            $table->integer('LLD_DELCOM')->nullable();
            $table->integer('LLD_DREVIE')->nullable();
            $table->boolean('LLD_ALMIVI')->nullable();

            $table->primary(['DOC_NUMERO', 'LIG_NUMERO', 'LIG_SUBNUM', 'LLD_NUMLOT'], 'lld_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('LIG_LOTS');
    }
};
