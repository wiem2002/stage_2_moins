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
        Schema::create('TGRILLES', function (Blueprint $table) {
            $table->string('TAR_CODE', 30);
            $table->string('FAR_CODE', 10);
            $table->string('SFA_CODE', 10);
            $table->string('ART_CODE', 30);
            $table->string('ART_TGAMME', 10)->nullable();
            $table->string('ART_GAMME', 35);
            $table->string('DEV_CODE', 3);
            $table->float('TAR_BORNE', 53, 0);
            $table->string('TAR_REMISE', 30)->nullable();
            $table->decimal('TAR_PRIX', 20, 4)->nullable();
            $table->string('TAR_CMMNTR', 200)->nullable();
            $table->string('TAR_CMNTR2', 200)->nullable();

            $table->primary(['TAR_CODE', 'FAR_CODE', 'SFA_CODE', 'ART_CODE', 'ART_GAMME', 'DEV_CODE', 'TAR_BORNE'], 'tar_plig');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TGRILLES');
    }
};
