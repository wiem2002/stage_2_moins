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
        Schema::create('LIG_INV', function (Blueprint $table) {
            $table->string('DOC_NUMERO', 10);
            $table->string('LIG_NUMERO', 5);
            $table->string('LIG_SUBNUM', 5);
            $table->string('DOC_PIECE', 30)->nullable();
            $table->dateTime('DOC_DATE')->nullable();
            $table->string('DEP_CODE', 3)->nullable();
            $table->string('ART_CODE', 30)->nullable();
            $table->string('ART_GAMME', 35)->nullable();
            $table->string('ART_TGAMME', 10)->nullable();
            $table->boolean('INV_NLOT')->nullable();
            $table->string('INV_NUMLOT', 25)->nullable();
            $table->dateTime('INV_DT_LOT')->nullable();
            $table->dateTime('INV_DT_FAB')->nullable();
            $table->boolean('INV_PERIMA')->nullable();
            $table->dateTime('INV_DT_PER')->nullable();
            $table->integer('INV_DELCOM')->nullable();
            $table->integer('INV_DREVIE')->nullable();
            $table->boolean('INV_ALMIVI')->nullable();
            $table->boolean('INV_NSERIE')->nullable();
            $table->string('INV_UC', 15)->nullable();
            $table->float('INV_COND', 53, 0)->nullable();
            $table->string('INV_UB', 15)->nullable();
            $table->float('INV_UCUV', 53, 0)->nullable();
            $table->string('INV_LIB', 40)->nullable();
            $table->float('INV_QTE', 53, 0)->nullable();
            $table->float('INV_QTEBEF', 53, 0)->nullable();
            $table->string('INV_ZONE', 100)->nullable();
            $table->string('INV_TSTOCK', 1)->nullable();
            $table->float('INV_PRIXAU', 53, 0)->nullable();
            $table->decimal('INV_PACH', 20, 4)->nullable();
            $table->string('PRJ_CODE', 40)->nullable();

            $table->primary(['DOC_NUMERO', 'LIG_NUMERO', 'LIG_SUBNUM'], 'inv_pdoc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('LIG_INV');
    }
};
