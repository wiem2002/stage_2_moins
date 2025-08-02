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
        Schema::create('ART_MVTIO', function (Blueprint $table) {
            $table->string('DOC_NUMERO', 10);
            $table->string('LIG_NUMERO', 5);
            $table->string('LIG_SUBNUM', 5);
            $table->string('MVT_NUMLOT', 25);
            $table->string('MIO_ORDER', 5);
            $table->float('MIO_IOSTK', 53, 0)->nullable();
            $table->decimal('MIO_IOPRX', 20, 4)->nullable();
            $table->float('MIO_IOQS', 53, 0)->nullable();
            $table->float('MIO_IOCS', 53, 0)->nullable();

            $table->primary(['DOC_NUMERO', 'LIG_NUMERO', 'LIG_SUBNUM', 'MVT_NUMLOT', 'MIO_ORDER'], 'mio_pdoc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ART_MVTIO');
    }
};
