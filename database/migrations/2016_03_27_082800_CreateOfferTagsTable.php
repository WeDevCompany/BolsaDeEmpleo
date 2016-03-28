<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offerTags', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador de los tags en las ofertas de trabajo');
            $table->integer('jobOffer_id')->unsigned()->comment('Identificador de la oferta de trabajo');
            $table->integer('tag_id')->unsigned()->comment('Identificador del tag');
            $table->foreign('jobOffer_id')->references('id')->on('jobOffers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('offerTags');
    }
}
