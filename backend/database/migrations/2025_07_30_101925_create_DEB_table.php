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
        Schema::create('DEB', function (Blueprint $table) {
            $table->dateTime('DEB_DATE');
            $table->string('DEB_FLUX', 1);
            $table->string('NUM_LIG', 5);
            $table->string('ART_NII', 14)->nullable();
            $table->string('ART_CODE', 30)->nullable();
            $table->string('DEB_PAYS', 3)->nullable();
            $table->decimal('DEB_FISC', 20, 4)->nullable();
            $table->string('DEB_REG', 3)->nullable();
            $table->decimal('DEB_STAT', 20, 4)->nullable();
            $table->decimal('DEB_NET', 20, 4)->nullable();
            $table->string('DEB_UNIT', 20)->nullable();
            $table->string('DEB_NATURE', 2)->nullable();
            $table->string('DEB_CNDLIV', 3)->nullable();
            $table->string('DEB_NCNDLV', 1)->nullable();
            $table->string('DEB_MODTRP', 1)->nullable();
            $table->decimal('DEB_COEFST', 8, 3)->nullable();
            $table->string('DEB_DEP', 2)->nullable();
            $table->string('DEB_PORI', 3)->nullable();
            $table->string('PCF_NII', 14)->nullable();
            $table->string('PCF_CODE', 20)->nullable();
            $table->boolean('DEB_MANUEL')->nullable();
            $table->string('DEB_NIVEAU', 1)->nullable();
            $table->string('DOC_NUMERO', 10)->nullable();
            $table->dateTime('DEB_DTMAJ')->nullable();
            $table->string('DEB_USRMAJ', 20)->nullable();
            $table->integer('DEB_NUMMAJ')->nullable();

            $table->primary(['DEB_DATE', 'DEB_FLUX', 'NUM_LIG'], 'deb_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DEB');
    }
};
