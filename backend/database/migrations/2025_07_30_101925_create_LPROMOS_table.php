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
        Schema::create('LPROMOS', function (Blueprint $table) {
            $table->string('PRM_CODE', 10);
            $table->string('FAR_CODE', 10);
            $table->string('SFA_CODE', 10);
            $table->string('ART_CODE', 30);
            $table->string('ART_GAMME', 35);
            $table->string('DEV_CODE', 3);
            $table->float('PRM_BORNE', 53, 0);
            $table->string('PRM_REMISE', 30)->nullable();
            $table->decimal('PRM_PRIX', 20, 4)->nullable();
            $table->string('ART_TGAMME', 10)->nullable();
            $table->boolean('PRM_EXCEPT')->nullable();
            $table->string('PRM_CMMNTR', 200)->nullable();
            $table->string('PRM_ARTRMP', 30)->nullable();
            $table->string('PRM_RMPTG', 10)->nullable();
            $table->string('PRM_RMPG', 98)->nullable();
            $table->string('PRM_ENPLUS', 30)->nullable();
            $table->string('PRM_PLUSTG', 10)->nullable();
            $table->string('PRM_PLUSG', 98)->nullable();
            $table->float('PRM_PLUSQT', 53, 0)->nullable();

            $table->primary(['PRM_CODE', 'FAR_CODE', 'SFA_CODE', 'ART_CODE', 'ART_GAMME', 'DEV_CODE', 'PRM_BORNE'], 'prm_plig');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('LPROMOS');
    }
};
