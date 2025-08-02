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
        Schema::create('DOC_EDI', function (Blueprint $table) {
            $table->string('DOC_NUMERO', 10);
            $table->integer('EDI_LIGNE');
            $table->string('EDI_BALISE', 500)->nullable();
            $table->string('EDI_VALEUR', 250)->nullable();

            $table->primary(['DOC_NUMERO', 'EDI_LIGNE'], 'edi_pligne');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DOC_EDI');
    }
};
