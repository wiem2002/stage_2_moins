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
        Schema::create('SERVICES', function (Blueprint $table) {
            $table->string('SRV_CODE', 3);
            $table->string('SRV_NOM', 40)->nullable()->unique('srv_knom');
            $table->string('SRV_RS', 60)->nullable();
            $table->string('SRV_RUE', 60)->nullable();
            $table->string('SRV_COMP', 60)->nullable();
            $table->string('SRV_ETAT', 100)->nullable();
            $table->string('SRV_REG', 100)->nullable();
            $table->string('SRV_CP', 10)->nullable();
            $table->string('SRV_VILLE', 200)->nullable();
            $table->string('PAY_CODE', 3)->nullable();
            $table->string('SRV_TEL1', 20)->nullable();
            $table->string('SRV_TEL2', 20)->nullable();
            $table->string('SRV_FAX', 20)->nullable();
            $table->string('SRV_TELEX', 10)->nullable();
            $table->string('SRV_EMAIL', 60)->nullable();
            $table->string('SRV_URL', 128)->nullable();
            $table->string('DEP_CODE', 3)->nullable();
            $table->boolean('SRV_DORT')->nullable()->index('srv_kdort');
            $table->dateTime('SRV_DTMAJ')->nullable();
            $table->string('SRV_USRMAJ', 20)->nullable();
            $table->integer('SRV_NUMMAJ')->nullable();

            $table->primary(['SRV_CODE'], 'srv_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SERVICES');
    }
};
