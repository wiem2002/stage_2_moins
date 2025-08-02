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
        Schema::create('ECR_AUTO', function (Blueprint $table) {
            $table->string('JRN_CODE', 10);
            $table->string('CPT_NUMERO', 25);
            $table->string('ECA_GDEDEB', 8)->nullable();
            $table->string('ECA_GDECRE', 8)->nullable();
            $table->boolean('ECA_DORT')->nullable()->index('eca_kdort');

            $table->primary(['JRN_CODE', 'CPT_NUMERO'], 'eca_pnum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ECR_AUTO');
    }
};
