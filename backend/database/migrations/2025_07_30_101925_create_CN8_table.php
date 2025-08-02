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
        Schema::create('CN8', function (Blueprint $table) {
            $table->string('CN8_CODE', 8);
            $table->string('CN8_NOM', 128)->nullable()->unique('cn8_knom');
            $table->boolean('CN8_TITRE')->nullable();
            $table->boolean('CN8_DORT')->nullable()->index('cn8_kdort');
            $table->dateTime('CN8_DTMAJ')->nullable();
            $table->string('CN8_USRMAJ', 20)->nullable();
            $table->integer('CN8_NUMMAJ')->nullable();

            $table->primary(['CN8_CODE'], 'cn8_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CN8');
    }
};
