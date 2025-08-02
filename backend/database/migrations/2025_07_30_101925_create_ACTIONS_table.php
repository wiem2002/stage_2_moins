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
        Schema::create('ACTIONS', function (Blueprint $table) {
            $table->string('ACT_NUMERO', 10);
            $table->dateTime('ACT_DATE')->nullable();
            $table->string('ACT_HEURE', 6)->nullable();
            $table->dateTime('ACT_DATECH')->nullable();
            $table->string('PCF_CODE', 20)->nullable();
            $table->string('CCT_NUMERO', 10)->nullable();
            $table->string('ACT_OBJET', 80)->nullable();
            $table->string('ACT_TYPE', 15)->nullable();
            $table->string('ACT_ETAT', 15)->nullable();
            $table->string('ACT_LEVEL', 1)->nullable();
            $table->boolean('ACT_RAPPEL')->nullable();
            $table->boolean('ACT_JRNENT')->nullable();
            $table->boolean('ACT_TERMINE')->nullable();
            $table->dateTime('ACT_DATRAP')->nullable();
            $table->dateTime('ACT_DATFIN')->nullable();
            $table->integer('ACT_POUREA')->nullable();
            $table->boolean('ACT_SYNOUT')->nullable();
            $table->dateTime('ACT_DTSOUT')->nullable();
            $table->string('ACT_DMNDPR', 3)->nullable();
            $table->string('SAL_CODE', 3)->nullable();
            $table->string('PRJ_CODE', 40)->nullable();
            $table->string('DOC_NUMERO', 10)->nullable();
            $table->text('ACT_DESC')->nullable();
            $table->string('ACT_FILE', 260)->nullable();
            $table->dateTime('ACT_DTCRE')->nullable();
            $table->string('ACT_USRCRE', 20)->nullable();
            $table->string('ACT_TRTCRE', 3)->nullable();
            $table->dateTime('ACT_DTMAJ')->nullable();
            $table->string('ACT_USRMAJ', 20)->nullable();
            $table->integer('ACT_NUMMAJ')->nullable();

            $table->index(['CCT_NUMERO', 'PCF_CODE', 'ACT_DATE', 'ACT_HEURE'], 'act_kcct');
            $table->index(['ACT_DATE', 'ACT_HEURE', 'CCT_NUMERO', 'PCF_CODE'], 'act_kdtcct');
            $table->index(['ACT_DATE', 'ACT_HEURE', 'PCF_CODE', 'CCT_NUMERO'], 'act_kdtpcf');
            $table->index(['ACT_DATE', 'SAL_CODE', 'ACT_ETAT'], 'act_kdtsal');
            $table->index(['PCF_CODE', 'CCT_NUMERO', 'ACT_DATE', 'ACT_HEURE'], 'act_kpcf');
            $table->index(['ACT_RAPPEL', 'SAL_CODE', 'ACT_ETAT', 'ACT_DATRAP'], 'act_krsed');
            $table->primary(['ACT_NUMERO'], 'act_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ACTIONS');
    }
};
