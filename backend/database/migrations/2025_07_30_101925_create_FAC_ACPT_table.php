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
        Schema::create('FAC_ACPT', function (Blueprint $table) {
            $table->string('FAA_NUMERO', 10);
            $table->string('FAA_TYPE', 1)->nullable();
            $table->string('FAA_STYPE', 1)->nullable();
            $table->string('FAA_PIECE', 30)->nullable();
            $table->string('FAA_ETAT', 1)->nullable();
            $table->dateTime('FAA_DATE')->nullable();
            $table->string('PCF_CODE', 20)->nullable();
            $table->string('FAA_PAYEUR', 20)->nullable();
            $table->string('CCT_NUMERO', 10)->nullable();
            $table->string('REP_CODE', 3)->nullable();
            $table->string('FAA_F_TITRE', 60)->nullable();
            $table->string('FAA_F_RS', 60)->nullable();
            $table->string('FAA_F_RS2', 60)->nullable();
            $table->string('FAA_F_RUE', 60)->nullable();
            $table->string('FAA_F_COMP', 60)->nullable();
            $table->string('FAA_F_ETAT', 100)->nullable();
            $table->string('FAA_F_REG', 100)->nullable();
            $table->string('FAA_F_CP', 10)->nullable();
            $table->string('FAA_F_VILLE', 200)->nullable();
            $table->string('PAY_CODE', 3)->nullable();
            $table->string('FAA_F_SIRET', 14)->nullable();
            $table->string('FAA_F_NII', 14)->nullable();
            $table->boolean('FAA_FPYEUR')->nullable();
            $table->text('FAA_OBJET')->nullable();
            $table->decimal('FAA_MTHT', 20, 4)->nullable();
            $table->decimal('FAA_MTTVA', 20, 4)->nullable();
            $table->decimal('FAA_TVATX', 8, 3)->nullable();
            $table->decimal('FAA_MTTTC', 20, 4)->nullable();
            $table->string('DEV_CODE', 3)->nullable();
            $table->float('FAA_DEVCOU', 53, 0)->nullable();
            $table->string('REG_CODE', 8)->nullable();
            $table->string('DOC_NUMERO', 10)->nullable();
            $table->text('FAA_MEMO')->nullable();
            $table->dateTime('FAA_DTCRE')->nullable();
            $table->string('FAA_USRCRE', 20)->nullable();
            $table->dateTime('FAA_DTMAJ')->nullable();
            $table->string('FAA_USRMAJ', 20)->nullable();
            $table->integer('FAA_NUMMAJ')->nullable();
            $table->string('FAA_CLEINA', 300)->nullable();

            $table->primary(['FAA_NUMERO'], 'faa_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('FAC_ACPT');
    }
};
