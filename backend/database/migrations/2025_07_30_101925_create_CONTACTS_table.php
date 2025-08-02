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
        Schema::create('CONTACTS', function (Blueprint $table) {
            $table->string('CCT_NUMERO', 10);
            $table->string('CCT_CODE', 15)->nullable()->unique('cct_kcode');
            $table->string('CCT_TABLE', 3)->nullable();
            $table->string('CCT_ORIGIN', 20)->nullable()->index('cct_korig');
            $table->string('CCT_CIVILE', 25)->nullable();
            $table->string('CCT_PRENOM', 20)->nullable();
            $table->string('CCT_NOM', 30)->nullable()->index('cct_knom');
            $table->string('CCT_TELB', 20)->nullable();
            $table->string('CCT_TELD', 20)->nullable();
            $table->string('CCT_TELM', 20)->nullable();
            $table->string('CCT_FAX', 20)->nullable();
            $table->string('CCT_EMAIL', 60)->nullable();
            $table->string('CCT_PASSWEB', 20)->nullable();
            $table->string('CCT_URL', 128)->nullable();
            $table->string('CCT_QUAL1', 15)->nullable();
            $table->string('CCT_QUAL2', 15)->nullable();
            $table->string('CCT_FONCT', 15)->nullable();
            $table->text('CCT_MEMO')->nullable();
            $table->string('FAT_CODE', 10)->nullable();
            $table->string('SFT_CODE', 10)->nullable();
            $table->string('REP_CODE', 3)->nullable();
            $table->boolean('CCT_SYNOUT')->nullable();
            $table->dateTime('CCT_DTSOUT')->nullable();
            $table->boolean('CCT_DORT')->nullable()->index('cct_kdort');
            $table->dateTime('CCT_DTCRE')->nullable();
            $table->string('CCT_USRCRE', 20)->nullable();
            $table->dateTime('CCT_DTMAJ')->nullable();
            $table->string('CCT_USRMAJ', 20)->nullable();
            $table->integer('CCT_NUMMAJ')->nullable();
            $table->string('XXX_ABONNE', 20)->nullable();
            $table->string('XXX_COMPLE', 20)->nullable();
            $table->string('XXX_CP', 5)->nullable();
            $table->string('XXX_RUE', 35)->nullable();

            $table->index(['CCT_TABLE', 'CCT_ORIGIN', 'CCT_CODE'], 'cct_klien');
            $table->primary(['CCT_NUMERO'], 'cct_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CONTACTS');
    }
};
