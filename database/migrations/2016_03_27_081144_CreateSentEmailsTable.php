<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentEmails', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador del envio de email al profesor sobre la oferta de trabajo');
            $table->boolean('sent')->default(false)->comment('Booleano que verifica el envio de email de la oferta de trabajo al profesor');
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
        Schema::drop('sentEmails');
    }
}
