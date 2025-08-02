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
        Schema::create('PROMOS', function (Blueprint $table) {
            $table->string('PRM_CODE', 10);
            $table->string('PRM_LIB', 40)->nullable()->index('prm_klib');
            $table->dateTime('PRM_DT_DEB')->nullable();
            $table->dateTime('PRM_DT_FIN')->nullable();
            $table->string('PRM_END', 1)->nullable();
            $table->text('PRM_DESC')->nullable();
            $table->boolean('PRM_TTC')->nullable();
            $table->boolean('PRM_CUMIMP')->nullable();
            $table->string('PRM_CMMNTR', 200)->nullable();
            $table->dateTime('PRM_DTMAJ')->nullable();
            $table->string('PRM_USRMAJ', 20)->nullable();
            $table->integer('PRM_NUMMAJ')->nullable();

            $table->unique(['PRM_END', 'PRM_DT_FIN', 'PRM_CODE'], 'prm_kpromo');
            $table->primary(['PRM_CODE'], 'prm_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PROMOS');
    }
};
