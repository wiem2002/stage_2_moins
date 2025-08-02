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
        Schema::create('IMO_FAM', function (Blueprint $table) {
            $table->string('FAI_CODE', 10);
            $table->string('FAI_LIB', 40)->nullable();
            $table->text('FAI_MEMO')->nullable();
            $table->boolean('FAI_DORT')->nullable()->index('fai_kdort');
            $table->dateTime('FAI_DTCRE')->nullable();
            $table->string('FAI_USRCRE', 20)->nullable();
            $table->dateTime('FAI_DTMAJ')->nullable();
            $table->string('FAI_USRMAJ', 20)->nullable();
            $table->integer('FAI_NUMMAJ')->nullable();

            $table->primary(['FAI_CODE'], 'fai_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('IMO_FAM');
    }
};
