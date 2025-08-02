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
        Schema::create('TRP_TARIF', function (Blueprint $table) {
            $table->string('TRP_CODE', 3);
            $table->string('TRP_REGION', 20);
            $table->float('TRP_POIDS1', 53, 0)->nullable();
            $table->float('TRP_POIDS2', 53, 0)->nullable();
            $table->float('TRP_POIDS3', 53, 0)->nullable();
            $table->float('TRP_POIDS4', 53, 0)->nullable();
            $table->float('TRP_POIDS5', 53, 0)->nullable();
            $table->float('TRP_POIDS6', 53, 0)->nullable();
            $table->float('TRP_POIDS7', 53, 0)->nullable();
            $table->decimal('TRP_TARIF1', 20, 4)->nullable();
            $table->decimal('TRP_TARIF2', 20, 4)->nullable();
            $table->decimal('TRP_TARIF3', 20, 4)->nullable();
            $table->decimal('TRP_TARIF4', 20, 4)->nullable();
            $table->decimal('TRP_TARIF5', 20, 4)->nullable();
            $table->decimal('TRP_TARIF6', 20, 4)->nullable();
            $table->decimal('TRP_TARIF7', 20, 4)->nullable();
            $table->string('TRP_LISTE', 250)->nullable();
            $table->boolean('TRT_DORT')->nullable()->index('trt_kdort');
            $table->dateTime('TRT_DTMAJ')->nullable();
            $table->string('TRT_USRMAJ', 20)->nullable();
            $table->integer('TRT_NUMMAJ')->nullable();

            $table->primary(['TRP_CODE', 'TRP_REGION'], 'trp_ptarif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TRP_TARIF');
    }
};
