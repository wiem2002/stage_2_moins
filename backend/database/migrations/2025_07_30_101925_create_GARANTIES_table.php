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
        Schema::create('GARANTIES', function (Blueprint $table) {
            $table->string('ART_CODE', 30);
            $table->string('GAR_CODE', 3);
            $table->string('PCF_CODE', 20);
            $table->string('DOC_NUMERO', 10);
            $table->string('GAR_NUMERO', 25)->nullable();
            $table->dateTime('GAR_DT_DEB')->nullable();
            $table->dateTime('GAR_DT_FIN')->nullable();

            $table->primary(['ART_CODE', 'GAR_CODE', 'PCF_CODE', 'DOC_NUMERO'], 'gar_part');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('GARANTIES');
    }
};
