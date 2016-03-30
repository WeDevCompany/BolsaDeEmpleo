<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterJobOffers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobOffers', function (Blueprint $table) {
            $table->foreign('enterpriseResponsable_id')->references('id')->on('enterpriseResponsables')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('profFamilie_id')->references('id')->on('profFamilies')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobOffers', function (Blueprint $table) {
            $table->dropForeign('joboffers_enterpriseresponsable_id_foreign');
            $table->dropForeign('joboffers_proffamilie_id_foreign');
        });
    }
}
