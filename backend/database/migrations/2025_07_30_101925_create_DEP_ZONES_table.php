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
        Schema::create('DEP_ZONES', function (Blueprint $table) {
            $table->string('DEP_CODE', 3);
            $table->string('DEP_ZONE', 100);
            $table->string('DEP_FZONE', 1)->nullable();
            $table->boolean('DEZ_DORT')->nullable()->index('dez_kdort');

            $table->primary(['DEP_CODE', 'DEP_ZONE'], 'dep_pzone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DEP_ZONES');
    }
};
