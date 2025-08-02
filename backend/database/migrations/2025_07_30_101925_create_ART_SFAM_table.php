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
        Schema::create('ART_SFAM', function (Blueprint $table) {
            $table->string('SFA_CODE', 10);
            $table->string('SFA_LIB', 40)->nullable()->index('sfa_klib');
            $table->string('FAR_CODE', 10)->nullable();
            $table->boolean('SFA_DORT')->nullable()->index('sfa_kdort');
            $table->string('SFA_TYPE', 1)->nullable();
            $table->string('SFA_CATEG', 1)->nullable();
            $table->float('SFA_QTEDFT', 53, 0)->nullable();
            $table->float('SFA_PRIXAU', 53, 0)->nullable();
            $table->string('SFA_T_APP', 15)->nullable();
            $table->string('SFA_T_APP2', 15)->nullable();
            $table->string('SFA_T_APP3', 15)->nullable();
            $table->decimal('SFA_F_APP', 20, 4)->nullable();
            $table->float('SFA_P_COEF', 53, 0)->nullable();
            $table->float('SFA_V_ARR', 53, 0)->nullable();
            $table->string('SFA_T_ARR', 1)->nullable();
            $table->string('SFA_M_PRV', 1)->nullable();
            $table->string('SFA_I_PRV', 1)->nullable();
            $table->string('SFA_MFACT', 1)->nullable();
            $table->string('SFA_NII', 14)->nullable();
            $table->boolean('SFA_NIMP')->nullable();
            $table->boolean('SFA_NSTAT')->nullable();
            $table->boolean('SFA_NCOM')->nullable();
            $table->boolean('SFA_CONTRM')->nullable();
            $table->boolean('SFA_INTV')->nullable();
            $table->boolean('SFA_INTA')->nullable();
            $table->string('SFA_STOCK', 1)->nullable();
            $table->string('SFA_TLOT', 1)->nullable();
            $table->boolean('SFA_LCSNSH')->nullable();
            $table->boolean('SFA_PERIMA')->nullable();
            $table->integer('SFA_DELCOM')->nullable();
            $table->string('SFA_S_PRV', 1)->nullable();
            $table->string('SFA_D_PRV', 1)->nullable();
            $table->string('SFA_GROUPE', 10)->nullable();
            $table->boolean('SFA_AUCFS')->nullable();
            $table->string('SFA_TGAMME', 10)->nullable();
            $table->dateTime('SFA_DTMAJ')->nullable();
            $table->string('SFA_USRMAJ', 20)->nullable();
            $table->integer('SFA_NUMMAJ')->nullable();
            $table->string('XXX_CMT', 20)->nullable();

            $table->primary(['SFA_CODE'], 'sfa_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ART_SFAM');
    }
};
