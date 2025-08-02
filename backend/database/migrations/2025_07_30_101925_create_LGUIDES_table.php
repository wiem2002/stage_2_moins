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
        Schema::create('LGUIDES', function (Blueprint $table) {
            $table->string('GDE_CODE', 8);
            $table->string('GDL_NUMERO', 4);
            $table->string('CPT_NUMERO', 25)->nullable();
            $table->string('GDL_LIB', 60)->nullable();
            $table->string('GDL_SENS', 1)->nullable();
            $table->string('GDL_FORMUL', 40)->nullable();
            $table->float('GDL_QTE', 53, 0)->nullable();
            $table->boolean('GDL_LIBSS')->nullable();
            $table->boolean('GDL_FORMSS')->nullable();
            $table->boolean('GDL_QTESS')->nullable();
            $table->string('GDL_TVAXPR', 15)->nullable();
            $table->string('XXX_CHEQUE', 20)->nullable();

            $table->primary(['GDE_CODE', 'GDL_NUMERO'], 'gdl_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('LGUIDES');
    }
};
