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
        Schema::create('RELANCES', function (Blueprint $table) {
            $table->string('REL_NUMERO', 10);
            $table->string('REL_PIECE', 30)->nullable();
            $table->dateTime('REL_DATE')->nullable();
            $table->string('REL_LEVEL', 3)->nullable();
            $table->text('REL_MEMO')->nullable();
            $table->string('REL_FILE', 260)->nullable();
            $table->dateTime('REL_DTMAJ')->nullable();
            $table->string('REL_USRMAJ', 20)->nullable();
            $table->integer('REL_NUMMAJ')->nullable();

            $table->index(['REL_DATE', 'REL_PIECE'], 'rel_kdate');
            $table->index(['REL_PIECE', 'REL_DATE'], 'rel_kpiece');
            $table->primary(['REL_NUMERO'], 'rel_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('RELANCES');
    }
};
