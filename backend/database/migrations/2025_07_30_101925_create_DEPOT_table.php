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
        Schema::create('DEPOT', function (Blueprint $table) {
            $table->string('DEP_CODE', 3);
            $table->string('DEP_NOM', 30)->nullable()->index('dep_knom');
            $table->string('DEP_RS', 60)->nullable();
            $table->string('DEP_RS2', 60)->nullable();
            $table->boolean('DEP_NPAI')->nullable();
            $table->string('DEP_RUE', 60)->nullable();
            $table->string('DEP_COMP', 60)->nullable();
            $table->string('DEP_ETAT', 100)->nullable();
            $table->string('DEP_REG', 100)->nullable();
            $table->string('DEP_CP', 10)->nullable();
            $table->string('DEP_VILLE', 200)->nullable();
            $table->string('PAY_CODE', 3)->nullable();
            $table->string('DEP_TEL1', 20)->nullable();
            $table->string('DEP_TEL2', 20)->nullable();
            $table->string('DEP_FAX', 20)->nullable();
            $table->string('DEP_TELEX', 10)->nullable();
            $table->string('DEP_EMAIL', 60)->nullable();
            $table->string('DEP_URL', 128)->nullable();
            $table->string('DEP_CBAR', 30)->nullable()->index('dep_kcbar');
            $table->text('DEP_MEMO')->nullable();
            $table->string('DEP_RESP', 30)->nullable();
            $table->string('DEP_OBS', 250)->nullable();
            $table->integer('DEP_N_ALLE')->nullable();
            $table->string('DEP_C_ALLE', 4)->nullable();
            $table->integer('DEP_N_NIV')->nullable();
            $table->string('DEP_C_NIV', 4)->nullable();
            $table->integer('DEP_N_RANG')->nullable();
            $table->string('DEP_C_RANG', 4)->nullable();
            $table->integer('DEP_N_CASE')->nullable();
            $table->string('DEP_C_CASE', 4)->nullable();
            $table->dateTime('DEP_DTINV')->nullable();
            $table->dateTime('DEP_ODTINC')->nullable();
            $table->dateTime('DEP_ODTINT')->nullable();
            $table->dateTime('DEP_ODTPRG')->nullable();
            $table->string('DEP_TPINV', 1)->nullable();
            $table->string('DEP_ETINV', 1)->nullable();
            $table->float('DEP_PRCINV', 53, 0)->nullable();
            $table->string('DEP_SELINV', 1)->nullable();
            $table->string('DEP_ETPINV', 10)->nullable();
            $table->boolean('DEP_DORT')->nullable()->index('dep_kdort');
            $table->dateTime('DEP_DTMAJ')->nullable();
            $table->string('DEP_USRMAJ', 20)->nullable();
            $table->integer('DEP_NUMMAJ')->nullable();

            $table->primary(['DEP_CODE'], 'dep_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DEPOT');
    }
};
