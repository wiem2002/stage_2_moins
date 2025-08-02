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
        Schema::create('IMMOBILISATIONS', function (Blueprint $table) {
            $table->string('IMO_CODE', 15);
            $table->string('IMO_LIB', 60)->nullable();
            $table->string('IMO_LIBLON', 200)->nullable();
            $table->string('FAI_CODE', 10)->nullable();
            $table->string('IMO_ETAT', 1)->nullable();
            $table->string('IMO_TYPE', 1)->nullable();
            $table->string('IMO_CAT', 1)->nullable();
            $table->string('LII_CODE', 3)->nullable();
            $table->string('IMO_CBAR', 30)->nullable();
            $table->string('IMO_SERIE', 30)->nullable();
            $table->string('IM1_CODE', 15)->nullable();
            $table->string('IM2_CODE', 15)->nullable();
            $table->string('IM3_CODE', 15)->nullable();
            $table->string('IM4_CODE', 15)->nullable();
            $table->string('IM5_CODE', 15)->nullable();
            $table->dateTime('IMO_DTCRE')->nullable();
            $table->string('IMO_USRCRE', 20)->nullable();
            $table->dateTime('IMO_DTMAJ')->nullable();
            $table->string('IMO_USRMAJ', 20)->nullable();
            $table->integer('IMO_NUMMAJ')->nullable();
            $table->dateTime('IMO_DTACQ')->nullable();
            $table->dateTime('IMO_DTSERV')->nullable();
            $table->boolean('IMO_REPRISE')->nullable();
            $table->string('IMO_PIEFRN', 30)->nullable();
            $table->decimal('IMO_PRXACH', 20, 4)->nullable();
            $table->decimal('IMO_FRAISA', 20, 4)->nullable();
            $table->decimal('IMO_TVAPXA', 20, 4)->nullable();
            $table->decimal('IMO_PRATTC', 20, 4)->nullable();
            $table->string('IMO_JRNACQ', 10)->nullable();
            $table->string('IMO_CPT', 25)->nullable();
            $table->string('IMO_CPTVAA', 25)->nullable();
            $table->string('IMO_CPTFRN', 25)->nullable();
            $table->dateTime('IMO_ACCOLE')->nullable();
            $table->string('IMO_ACCOPR', 20)->nullable();
            $table->string('IMO_MDAMO', 1)->nullable();
            $table->decimal('IMO_BSEAMO', 20, 4)->nullable();
            $table->decimal('IMO_VALVTE', 20, 4)->nullable();
            $table->integer('IMO_DREAMO')->nullable();
            $table->string('IMO_NBJAMO', 3)->nullable();
            $table->dateTime('IMO_DTFINA')->nullable();
            $table->float('IMO_COAMDE', 53, 0)->nullable();
            $table->string('IMO_JRNDOT', 10)->nullable();
            $table->string('IMO_CPTDAM', 25)->nullable();
            $table->string('IMO_CPTAM', 25)->nullable();
            $table->string('IMO_CPTDEP', 25)->nullable();
            $table->string('IMO_CPTDDE', 25)->nullable();
            $table->string('IMO_TYPSOR', 1)->nullable();
            $table->dateTime('IMO_DTSOR')->nullable();
            $table->string('IMO_PIESOR', 30)->nullable();
            $table->decimal('IMO_PRXVTE', 20, 4)->nullable();
            $table->decimal('IMO_TVARVT', 20, 4)->nullable();
            $table->decimal('IMO_PVCCT', 20, 4)->nullable();
            $table->decimal('IMO_PVCLT', 20, 4)->nullable();
            $table->decimal('IMO_MVCCT', 20, 4)->nullable();
            $table->decimal('IMO_MVCLT', 20, 4)->nullable();
            $table->string('IMO_JRNCES', 10)->nullable();
            $table->string('IMO_CPTCES', 25)->nullable();
            $table->string('IMO_CPTCRE', 25)->nullable();
            $table->string('IMO_CPTVAV', 25)->nullable();
            $table->string('IMO_CPTVNC', 25)->nullable();
            $table->dateTime('IMO_CSCOLE')->nullable();
            $table->string('IMO_CSCOPR', 20)->nullable();
            $table->string('MVN_CODE', 15)->nullable();
            $table->string('IMO_FRACT', 15)->nullable();
            $table->float('IMO_NFRACT', 53, 0)->nullable();
            $table->text('IMO_MEMO')->nullable();
            $table->binary('IMO_IMAGE')->nullable();
            $table->string('IMO_FMTIMG')->nullable();
            $table->boolean('IMO_DORT')->nullable()->index('imo_kdort');

            $table->primary(['IMO_CODE'], 'imo_kcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('IMMOBILISATIONS');
    }
};
