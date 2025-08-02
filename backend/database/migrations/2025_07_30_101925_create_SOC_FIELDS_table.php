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
        Schema::create('SOC_FIELDS', function (Blueprint $table) {
            $table->string('FLD_TABLE', 3);
            $table->string('FLD_NAME', 10);
            $table->string('FLD_HEADER', 60)->nullable();
            $table->string('FLD_TYPE', 3)->nullable();
            $table->integer('FLD_SIZE')->nullable();
            $table->string('FLD_CALCUL', 1)->nullable();
            $table->string('FLD_VALUES', 8000)->nullable();
            $table->string('FLD_FORMUL', 8000)->nullable();
            $table->string('FLD_FKTBL', 128)->nullable();
            $table->string('FLD_FKFLD', 128)->nullable();
            $table->string('FLD_FKFLT', 500)->nullable();
            $table->string('FLD_DFFLDR', 8000)->nullable();
            $table->string('FLD_ONGLET', 60)->nullable();
            $table->integer('FLD_COLUMN')->nullable();
            $table->integer('FLD_LIGNE')->nullable();
            $table->string('FLD_VISBLT', 15)->nullable();
            $table->string('FLD_OBLIGA', 1)->nullable();
            $table->string('FLD_MSGBI', 1000)->nullable();
            $table->boolean('FLD_SEPRTR')->nullable();
            $table->boolean('FLD_ESPCMT')->nullable();

            $table->primary(['FLD_TABLE', 'FLD_NAME'], 'fld_ptable');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SOC_FIELDS');
    }
};
