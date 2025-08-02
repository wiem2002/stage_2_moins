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
        Schema::create('ART_FAM', function (Blueprint $table) {
            $table->string('FAR_CODE', 10);
            $table->string('FAR_LIB', 40)->nullable()->index('far_klib');
            $table->boolean('FAR_DORT')->nullable()->index('far_kdort');
            $table->string('FAR_TYPE', 1)->nullable();
            $table->string('FAR_CATEG', 1)->nullable();
            $table->float('FAR_QTEDFT', 53, 0)->nullable();
            $table->float('FAR_PRIXAU', 53, 0)->nullable();
            $table->string('FAR_T_APP', 15)->nullable();
            $table->string('FAR_T_APP2', 15)->nullable();
            $table->string('FAR_T_APP3', 15)->nullable();
            $table->decimal('FAR_F_APP', 20, 4)->nullable();
            $table->float('FAR_P_COEF', 53, 0)->nullable();
            $table->float('FAR_V_ARR', 53, 0)->nullable();
            $table->string('FAR_T_ARR', 1)->nullable();
            $table->string('FAR_M_PRV', 1)->nullable();
            $table->string('FAR_I_PRV', 1)->nullable();
            $table->string('FAR_MFACT', 1)->nullable();
            $table->string('FAR_NII', 14)->nullable();
            $table->boolean('FAR_NIMP')->nullable();
            $table->boolean('FAR_NSTAT')->nullable();
            $table->boolean('FAR_NCOM')->nullable();
            $table->boolean('FAR_CONTRM')->nullable();
            $table->boolean('FAR_INTV')->nullable();
            $table->boolean('FAR_INTA')->nullable();
            $table->string('FAR_STOCK', 1)->nullable();
            $table->string('FAR_TLOT', 1)->nullable();
            $table->boolean('FAR_LCSNSH')->nullable();
            $table->boolean('FAR_PERIMA')->nullable();
            $table->integer('FAR_DELCOM')->nullable();
            $table->string('FAR_S_PRV', 1)->nullable();
            $table->string('FAR_D_PRV', 1)->nullable();
            $table->string('FAR_GROUPE', 10)->nullable();
            $table->boolean('FAR_AUCFS')->nullable();
            $table->string('FAR_TGAMME', 10)->nullable();
            $table->dateTime('FAR_DTMAJ')->nullable();
            $table->string('FAR_USRMAJ', 20)->nullable();
            $table->integer('FAR_NUMMAJ')->nullable();
            $table->string('XXX_CMT', 20)->nullable();

            $table->primary(['FAR_CODE'], 'far_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ART_FAM');
    }
};
