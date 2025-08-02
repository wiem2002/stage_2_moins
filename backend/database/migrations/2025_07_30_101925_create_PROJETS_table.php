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
        Schema::create('PROJETS', function (Blueprint $table) {
            $table->string('PRJ_CODE', 40);
            $table->string('PRJ_LIB', 100)->nullable()->index('prj_klib');
            $table->string('PRJ_ETAT', 15)->nullable();
            $table->string('PRJ_GROUP1', 15)->nullable();
            $table->string('PRJ_GROUP2', 15)->nullable();
            $table->dateTime('PRJ_DT_DEB')->nullable();
            $table->dateTime('PRJ_DT_FIN')->nullable();
            $table->string('PCF_CODE', 20)->nullable();
            $table->text('PRJ_DESC')->nullable();
            $table->decimal('PRJ_BUGLAC', 20, 4)->nullable();
            $table->boolean('PRJ_TO_REC')->nullable();
            $table->boolean('PRJ_DORT')->nullable()->index('prj_kdort');
            $table->string('ANA_CODE', 15)->nullable();
            $table->dateTime('PRJ_DTCRE')->nullable();
            $table->string('PRJ_USRCRE', 20)->nullable();
            $table->dateTime('PRJ_DTMAJ')->nullable();
            $table->string('PRJ_USRMAJ', 20)->nullable();
            $table->integer('PRJ_NUMMAJ')->nullable();
            $table->boolean('XXX_AA0')->nullable();
            $table->string('XXX_AA1', 50)->nullable();
            $table->dateTime('XXX_AA2')->nullable();
            $table->dateTime('XXX_AA3')->nullable();
            $table->dateTime('XXX_AA4')->nullable();
            $table->dateTime('XXX_AA5')->nullable();
            $table->string('XXX_AA6', 20)->nullable();
            $table->string('XXX_AA61', 20)->nullable();
            $table->string('XXX_AA62', 20)->nullable();
            $table->text('XXX_AA7')->nullable();
            $table->boolean('XXX_AA8')->nullable();
            $table->dateTime('XXX_AA9')->nullable();
            $table->dateTime('XXX_AA91')->nullable();
            $table->dateTime('XXX_AA92')->nullable();
            $table->string('XXX_AA93', 20)->nullable();
            $table->text('XXX_AA94')->nullable();
            $table->boolean('XXX_AA95')->nullable();
            $table->string('XXX_AA96', 20)->nullable();
            $table->string('XXX_AA97', 20)->nullable();
            $table->string('XXX_AA98')->nullable();
            $table->text('XXX_AA99')->nullable();
            $table->boolean('XXX_IP01')->nullable();
            $table->string('XXX_IP02', 20)->nullable();
            $table->string('XXX_IP03', 20)->nullable();
            $table->boolean('XXX_IPC01')->nullable();
            $table->float('XXX_IPC02', 53, 0)->nullable();
            $table->float('XXX_IPC03', 53, 0)->nullable();
            $table->float('XXX_IPC04', 53, 0)->nullable();
            $table->float('XXX_IPC05', 53, 0)->nullable();

            $table->primary(['PRJ_CODE'], 'prj_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PROJETS');
    }
};
