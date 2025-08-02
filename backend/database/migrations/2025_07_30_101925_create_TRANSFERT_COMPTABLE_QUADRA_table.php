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
        Schema::create('TRANSFERT_COMPTABLE_QUADRA', function (Blueprint $table) {
            $table->string('TCQ_TABLE', 11);
            $table->string('TCQ_CODE', 25);
            $table->dateTime('TCQ_TRALE');
            $table->string('TCQ_TRAPAR', 20)->nullable();
            $table->integer('TCQ_NBTRA')->nullable();

            $table->primary(['TCQ_TABLE', 'TCQ_CODE', 'TCQ_TRALE'], 'tcq_ptrale');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TRANSFERT_COMPTABLE_QUADRA');
    }
};
