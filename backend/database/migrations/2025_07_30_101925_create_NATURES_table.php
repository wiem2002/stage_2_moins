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
        Schema::create('NATURES', function (Blueprint $table) {
            $table->string('NAT_TABLE', 3);
            $table->string('NAT_TYPE', 1);
            $table->string('NAT_ORIGIN', 30);
            $table->string('NAT_CODE', 3);
            $table->string('NAT_LIB', 40)->nullable();
            $table->string('CPT_NUMERO', 25)->nullable();
            $table->string('NAT_CPTREM', 25)->nullable();
            $table->string('NAT_CPTRRR', 25)->nullable();
            $table->string('NAT_CPT_RG', 25)->nullable();
            $table->string('ANA_CODE', 15)->nullable();
            $table->string('JRN_CODE', 10)->nullable();
            $table->string('NAT_TVACPT', 25)->nullable();
            $table->decimal('NAT_TVATX', 8, 3)->nullable();
            $table->string('NAT_TVATYP', 1)->nullable();
            $table->dateTime('NAT_DTTVA')->nullable();
            $table->decimal('NAT_TXTVA', 8, 3)->nullable();
            $table->decimal('NAT_TPF1TX', 8, 3)->nullable();
            $table->string('NAT_TPF1SQ', 1)->nullable();
            $table->string('NAT_TPF1CT', 25)->nullable();
            $table->string('NAT_TPF1ED', 15)->nullable();
            $table->decimal('NAT_TPF1XT', 8, 3)->nullable();
            $table->string('NAT_TPF1XC', 25)->nullable();
            $table->decimal('NAT_TPF2TX', 8, 3)->nullable();
            $table->string('NAT_TPF2SQ', 1)->nullable();
            $table->string('NAT_TPF2CT', 25)->nullable();
            $table->string('NAT_TPF2ED', 15)->nullable();
            $table->decimal('NAT_TPF2XT', 8, 3)->nullable();
            $table->string('NAT_TPF2XC', 25)->nullable();
            $table->dateTime('NAT_DTTPF1')->nullable();
            $table->decimal('NAT_TXTPF1', 8, 3)->nullable();
            $table->dateTime('NAT_DTTPF2')->nullable();
            $table->decimal('NAT_TXTPF2', 8, 3)->nullable();
            $table->boolean('NAT_DORT')->nullable()->index('nat_kdort');
            $table->dateTime('NAT_DTMAJ')->nullable();
            $table->string('NAT_USRMAJ', 20)->nullable();
            $table->integer('NAT_NUMMAJ')->nullable();

            $table->index(['NAT_TABLE', 'NAT_TYPE', 'NAT_ORIGIN', 'NAT_LIB'], 'nat_klib');
            $table->primary(['NAT_TABLE', 'NAT_TYPE', 'NAT_ORIGIN', 'NAT_CODE'], 'nat_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NATURES');
    }
};
