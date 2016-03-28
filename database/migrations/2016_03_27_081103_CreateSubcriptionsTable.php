<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcriptions', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador de la suscripcion');
            $table->boolean('sentEmail')->default(false)->comment('Booleano usado para verificar el envio de email que se realiza en una suscripcion a una oferta');
            $table->integer('jobOffer_id')->unsigned()->comment('Identificador de la oferta de trabajo');
            $table->integer('student_id')->unsigned()->comment('Identificador del estudiante');
            $table->foreign('jobOffer_id')->references('id')->on('jobOffers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('subcriptions');
    }
}
