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
        Schema::create('TEXTES', function (Blueprint $table) {
            $table->string('TXT_CODE', 40);
            $table->string('TXT_LIB', 250)->nullable();
            $table->text('TXT_MEMO')->nullable();
            $table->boolean('TXT_DORT')->nullable()->index('txt_kdort');
            $table->dateTime('TXT_DTMAJ')->nullable();
            $table->string('TXT_USRMAJ', 20)->nullable();
            $table->integer('TXT_NUMMAJ')->nullable();

            $table->primary(['TXT_CODE'], 'txt_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TEXTES');
    }
};
