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
        Schema::create('PERSONNEL', function (Blueprint $table) {
            $table->string('SAL_CODE', 3);
            $table->string('SAL_CIVILE', 25)->nullable();
            $table->string('SAL_PRENOM', 20)->nullable();
            $table->string('SAL_NOM', 30)->nullable()->index('sal_knom');
            $table->string('SAL_FONCT', 15)->nullable();
            $table->string('SAL_CRITE1', 15)->nullable();
            $table->string('SAL_CRITE2', 15)->nullable();
            $table->string('SAL_CRITE3', 15)->nullable();
            $table->string('SAL_RUE', 60)->nullable();
            $table->string('SAL_COMP', 60)->nullable();
            $table->string('SAL_ETAT', 100)->nullable();
            $table->string('SAL_REG', 100)->nullable();
            $table->string('SAL_CP', 10)->nullable();
            $table->string('SAL_VILLE', 200)->nullable();
            $table->string('PAY_CODE', 3)->nullable();
            $table->string('SAL_TELB', 20)->nullable();
            $table->string('SAL_TELD', 20)->nullable();
            $table->string('SAL_TELM', 20)->nullable();
            $table->string('SAL_EMAIL', 60)->nullable();
            $table->decimal('SAL_HCOUT', 20, 4)->nullable();
            $table->string('REP_CODE', 3)->nullable();
            $table->string('SAL_DDEF', 3)->nullable();
            $table->boolean('SAL_TDA')->nullable();
            $table->integer('SAL_SCANACTION')->nullable();
            $table->integer('SAL_CJTPA')->nullable();
            $table->boolean('SAL_DORT')->nullable()->index('sal_kdort');
            $table->dateTime('SAL_DTMAJ')->nullable();
            $table->string('SAL_USRMAJ', 20)->nullable();
            $table->integer('SAL_NUMMAJ')->nullable();
            $table->float('XXX_FRAIS', 53, 0)->nullable();
            $table->string('XXX_ID', 20)->nullable();
            $table->string('XXX_MDP', 20)->nullable();

            $table->primary(['SAL_CODE'], 'sal_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PERSONNEL');
    }
};
