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
        Schema::create('SYNOUTPARAMS', function (Blueprint $table) {
            $table->string('SAL_CODE', 3);
            $table->string('SOP_CODE', 3);
            $table->string('SOP_ITEMCOD', 15);
            $table->string('SOP_ITEMLIB', 200)->nullable();
            $table->boolean('SOP_SEND')->nullable();
            $table->boolean('SOP_SENDLNK')->nullable();

            $table->primary(['SAL_CODE', 'SOP_CODE', 'SOP_ITEMCOD'], 'sop_pcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SYNOUTPARAMS');
    }
};
