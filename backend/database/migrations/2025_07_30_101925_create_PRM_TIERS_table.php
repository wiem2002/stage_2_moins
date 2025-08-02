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
        Schema::create('PRM_TIERS', function (Blueprint $table) {
            $table->string('PRM_CODE', 10);
            $table->string('PRM_INCEXC', 1);
            $table->string('PRM_TYPE', 1);
            $table->string('PRM_BORNE1', 20);
            $table->string('PRM_BORNE2', 20);

            $table->primary(['PRM_CODE', 'PRM_INCEXC', 'PRM_TYPE', 'PRM_BORNE1', 'PRM_BORNE2'], 'prm_ptiers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PRM_TIERS');
    }
};
