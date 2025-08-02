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
        Schema::create('RLV_BANQUE', function (Blueprint $table) {
            $table->string('CPT_NUMERO', 25);
            $table->dateTime('RBQ_DATE');
            $table->string('DEV_CODE', 3);
            $table->decimal('RBQ_SOLDE', 20, 4)->nullable();
            $table->dateTime('RBQ_DTLAST')->nullable();
            $table->decimal('RBQ_SOLDEP', 20, 4)->nullable();
            $table->string('RBQ_IDENT', 15)->nullable();
            $table->string('RBQ_ETAT', 1)->nullable();
            $table->text('RBQ_MEMO')->nullable();
            $table->dateTime('RBQ_DTCRE')->nullable();
            $table->string('RBQ_USRCRE', 20)->nullable();
            $table->dateTime('RBQ_DTMAJ')->nullable();
            $table->string('RBQ_USRMAJ', 20)->nullable();
            $table->integer('RBQ_NUMMAJ')->nullable();

            $table->index(['RBQ_DATE', 'CPT_NUMERO'], 'rbq_kdate');
            $table->primary(['CPT_NUMERO', 'RBQ_DATE', 'DEV_CODE'], 'rbq_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('RLV_BANQUE');
    }
};
