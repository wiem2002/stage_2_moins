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
        Schema::create('USERS', function (Blueprint $table) {
            $table->string('USR_NAME', 20);
            $table->string('USR_PASSWD', 10)->nullable();
            $table->string('USR_GROUPE', 20)->nullable();
            $table->text('USR_RIGHTS')->nullable();
            $table->string('SAL_CODE', 3)->nullable();
            $table->boolean('USR_WSTLCU')->nullable();
            $table->dateTime('USR_DTLAST')->nullable();
            $table->boolean('USR_DORT')->nullable()->index('usr_kdort');
            $table->dateTime('USR_DTMAJ')->nullable();
            $table->string('USR_USRMAJ', 20)->nullable();
            $table->integer('USR_NUMMAJ')->nullable();

            $table->primary(['USR_NAME'], 'usr_pname');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('USERS');
    }
};
