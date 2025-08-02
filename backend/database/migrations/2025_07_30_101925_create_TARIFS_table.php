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
        Schema::create('TARIFS', function (Blueprint $table) {
            $table->string('TAR_CODE', 30);
            $table->string('TAR_LIB', 40)->nullable()->index('tar_klib');
            $table->string('TAR_E_CODE', 30)->nullable();
            $table->boolean('TAR_TTC')->nullable();
            $table->boolean('TAR_IMPOSE')->nullable();
            $table->text('TAR_CMMNTR')->nullable();
            $table->boolean('TAR_DORT')->nullable()->index('tar_kdort');
            $table->dateTime('TAR_DTMAJ')->nullable();
            $table->string('TAR_USRMAJ', 20)->nullable();
            $table->integer('TAR_NUMMAJ')->nullable();

            $table->primary(['TAR_CODE'], 'tar_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TARIFS');
    }
};
