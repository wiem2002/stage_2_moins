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
        Schema::create('COMPTES', function (Blueprint $table) {
            $table->string('CPT_NUMERO', 25);
            $table->string('PCF_CODE', 20)->nullable()->unique('cpt_kcode');
            $table->string('CPT_LIB', 60)->nullable()->index('cpt_klib');
            $table->string('CPT_TYPE', 1)->nullable()->index('cpt_ktype');
            $table->boolean('CPT_DORT')->nullable()->index('cpt_kdort');
            $table->boolean('CPT_IS_COL')->nullable();
            $table->string('CPT_COLLEC', 25)->nullable()->index('cpt_kcoll');
            $table->string('RPT_COMPTE', 15)->nullable();
            $table->string('DEV_CODE', 3)->nullable();
            $table->boolean('CPT_DEVOBG')->nullable();
            $table->boolean('CPT_ECH')->nullable();
            $table->boolean('CPT_GROUPE')->nullable();
            $table->boolean('CPT_LET')->nullable();
            $table->string('CPT_NLET', 3)->nullable();
            $table->dateTime('CPT_LETLE')->nullable();
            $table->string('CPT_LETPAR', 20)->nullable();
            $table->boolean('CPT_RAPPR')->nullable();
            $table->string('CPT_RAPPER', 3)->nullable();
            $table->boolean('CPT_CLODET')->nullable();
            $table->string('CPT_SENS', 1)->nullable();
            $table->string('CPT_ANA', 1)->nullable();
            $table->string('CPT_QTE', 1)->nullable();
            $table->string('CPT_SAL', 1)->nullable();
            $table->string('REG_CODE', 8)->nullable();
            $table->decimal('CPT_MT_REL', 20, 4)->nullable();
            $table->string('MVN_CODE', 15)->nullable();
            $table->string('CPT_LIADEB', 3)->nullable();
            $table->string('CPT_LIACRE', 3)->nullable();
            $table->decimal('CPT_TVA_TX', 8, 3)->nullable();
            $table->string('CPT_TVA_SQ', 1)->nullable();
            $table->string('CPT_TVA_L1', 15)->nullable();
            $table->string('CPT_TVA_L2', 15)->nullable();
            $table->string('CPT_TVA_NC', 25)->nullable();
            $table->string('CPT_TVA_OP', 1)->nullable();
            $table->string('CPT_TVAXPR', 15)->nullable();
            $table->text('CPT_MEMO')->nullable();
            $table->string('CPT_OLDNUM', 25)->nullable();
            $table->string('CPT_RENPAR', 20)->nullable();
            $table->dateTime('CPT_RENLE')->nullable();
            $table->dateTime('CPT_DTMAJ')->nullable();
            $table->string('CPT_USRMAJ', 20)->nullable();
            $table->integer('CPT_NUMMAJ')->nullable();
            $table->string('XXX_1', 3000)->nullable();
            $table->integer('XXX_2')->nullable();
            $table->boolean('XXX_3')->nullable();

            $table->primary(['CPT_NUMERO'], 'cpt_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('COMPTES');
    }
};
