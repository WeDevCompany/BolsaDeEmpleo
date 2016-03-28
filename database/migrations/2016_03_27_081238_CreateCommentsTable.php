<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador del comentario');
            $table->string('title', 50)->comment('Titulo del comentario');
            $table->text('body')->comment('Contenido del comentario');
            $table->integer('jobOffer_id')->unsigned()->comment('Identificador de la oferta de trabajo');
            $table->integer('teacher_id')->unsigned()->comment('Identificador del profesor');
            $table->foreign('jobOffer_id')->references('id')->on('jobOffers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('comments');
    }
}
