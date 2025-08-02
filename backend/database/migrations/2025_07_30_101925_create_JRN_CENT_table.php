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
        Schema::create('JRN_CENT', function (Blueprint $table) {
            $table->string('JRN_CODE', 10);
            $table->string('EXE_CODE', 3);
            $table->string('PER_CODE', 3);
            $table->integer('JRN_NBESIM')->nullable();
            $table->integer('JRN_NBLSIM')->nullable();
            $table->integer('JRN_NBENVD')->nullable();
            $table->integer('JRN_NBLNVD')->nullable();
            $table->decimal('JRN_DBNVDJ', 20, 4)->nullable();
            $table->decimal('JRN_CDNVDJ', 20, 4)->nullable();
            $table->decimal('JRN_DBNVDS', 20, 4)->nullable();
            $table->decimal('JRN_CDNVDS', 20, 4)->nullable();
            $table->decimal('JRN_DBNVDE', 20, 4)->nullable();
            $table->decimal('JRN_CDNVDE', 20, 4)->nullable();
            $table->integer('JRN_NBEVLD')->nullable();
            $table->integer('JRN_NBLVLD')->nullable();
            $table->decimal('JRN_DBVDDJ', 20, 4)->nullable();
            $table->decimal('JRN_CDVDDJ', 20, 4)->nullable();
            $table->decimal('JRN_DBVDDS', 20, 4)->nullable();
            $table->decimal('JRN_CDVDDS', 20, 4)->nullable();
            $table->decimal('JRN_DBVDDE', 20, 4)->nullable();
            $table->decimal('JRN_CDVDDE', 20, 4)->nullable();
            $table->boolean('JRN_VLDEE')->nullable();
            $table->dateTime('JRN_VLDLE')->nullable();
            $table->string('JRN_VLDPAR', 20)->nullable();
            $table->integer('JRN_NBE')->nullable();
            $table->integer('JRN_NBL')->nullable();
            $table->decimal('JRN_D_DEV', 20, 4)->nullable();
            $table->decimal('JRN_C_DEV', 20, 4)->nullable();
            $table->string('DEV_CODE', 3)->nullable();
            $table->decimal('JRN_DEBIT', 20, 4)->nullable();
            $table->decimal('JRN_CREDIT', 20, 4)->nullable();
            $table->decimal('JRN_D_EURO', 20, 4)->nullable();
            $table->decimal('JRN_C_EURO', 20, 4)->nullable();
            $table->dateTime('JRN_DTLAST')->nullable();
            $table->dateTime('JRN_DT_MAJ')->nullable();
            $table->string('JRN_NPIECE', 30)->nullable();
            $table->string('JRN_NORDRE', 6)->nullable();

            $table->primary(['JRN_CODE', 'EXE_CODE', 'PER_CODE'], 'jrn_pcent');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('JRN_CENT');
    }
};
