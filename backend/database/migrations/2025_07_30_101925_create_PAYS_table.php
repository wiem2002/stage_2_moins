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
        Schema::create('PAYS', function (Blueprint $table) {
            $table->string('PAY_CODE', 3);
            $table->string('PAY_NOM', 60)->nullable()->unique('pay_knom');
            $table->string('PAY_NOMLG', 60)->nullable();
            $table->string('PAY_NUMERO', 3)->nullable();
            $table->string('PAY_DEB', 3)->nullable();
            $table->string('PAY_FAM', 15)->nullable();
            $table->string('PAY_SDIV', 15)->nullable();
            $table->string('PAY_CONT', 15)->nullable();
            $table->string('PAY_LANGUE', 15)->nullable();
            $table->string('DEV_CODE', 3)->nullable();
            $table->string('PAY_LOCAL', 15)->nullable();
            $table->string('PAY_NATACH', 3)->nullable();
            $table->string('PAY_NATVTE', 3)->nullable();
            $table->string('PAY_EXCMDE', 1)->nullable();
            $table->string('PAY_EXBL', 1)->nullable();
            $table->string('PAY_EXFACT', 1)->nullable();
            $table->string('PAY_L_DPX', 30)->nullable();
            $table->string('PAY_L_ACH', 30)->nullable();
            $table->string('PAY_L_DEV', 30)->nullable();
            $table->string('PAY_L_CMDE', 30)->nullable();
            $table->string('PAY_L_FPRO', 30)->nullable();
            $table->string('PAY_L_BL', 30)->nullable();
            $table->string('PAY_L_FACT', 30)->nullable();
            $table->string('PAY_L_AVR', 30)->nullable();
            $table->string('PAY_L_RLV', 30)->nullable();
            $table->string('PAY_L_BR', 30)->nullable();
            $table->string('PAY_M_VP', 100)->nullable();
            $table->string('PAY_M_VD', 100)->nullable();
            $table->string('PAY_M_VC', 100)->nullable();
            $table->string('PAY_M_VB', 100)->nullable();
            $table->string('PAY_M_VR', 100)->nullable();
            $table->string('PAY_M_VF', 100)->nullable();
            $table->string('PAY_M_VA', 100)->nullable();
            $table->string('PAY_M_V0', 100)->nullable();
            $table->string('PAY_M_V1', 100)->nullable();
            $table->string('PAY_M_VL', 100)->nullable();
            $table->string('PAY_M_AD', 100)->nullable();
            $table->string('PAY_M_AC', 100)->nullable();
            $table->string('PAY_M_AB', 100)->nullable();
            $table->string('PAY_M_AR', 100)->nullable();
            $table->string('PAY_M_AF', 100)->nullable();
            $table->string('PAY_M_AA', 100)->nullable();
            $table->string('PAY_M_A0', 100)->nullable();
            $table->string('PAY_M_A1', 100)->nullable();
            $table->string('PAY_M_AL', 100)->nullable();
            $table->boolean('PAY_DORT')->nullable()->index('pay_kdort');
            $table->dateTime('PAY_DTMAJ')->nullable();
            $table->string('PAY_USRMAJ', 20)->nullable();
            $table->integer('PAY_NUMMAJ')->nullable();

            $table->primary(['PAY_CODE'], 'pay_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PAYS');
    }
};
