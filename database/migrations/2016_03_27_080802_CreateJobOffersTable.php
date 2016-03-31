<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobOffers', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador de la oferta');
            $table->string('title', 50)->comment('Titulo de la oferta');
            $table->enum('duration',['Indefinido','Duracion determinada','Por proyectos','Desconocida'])->comment('Duracion de la oferta');
            $table->enum('kind',['Fct','Job'])->comment('Tipo de la oferta');
            $table->text('description')->comment('Descripcion de la oferta');
            $table->enum('level', ['Grado superior', 'Grado medio', 'Grado básico', 'Bachillerato'])->comment('Nivel de cualificación requerido');
            $table->enum('experience', ['Un año', 'Dos años', 'Tres años', 'Cuadro años', 'Cinco años', 'No requerida'])->comment('Experiencia requerida');
            $table->text('others')->comment('Campo para almacenar los tags que no estén en la base de datos');
            $table->date('dueDate', 'Ymd')->comment('Fecha de expiracion de la oferta');
            $table->integer('wanted')->comment('Numero de empleados requeridos');
            $table->integer('hired')->comment('Numero de empleados finalmente contratados');
            $table->integer('profFamilie_id')->unsigned()->comment('Identidicador de la familia profesional de la oferta');
            $table->integer('enterpriseResponsable_id')->unsigned()->comment('Identidicador del responsable que se hara cargo del estudiante');
            $table->integer('workCenter_id')->unsigned()->comment('Identificador del centro de trabajo que ha puesto la oferta');
            $table->foreign('workCenter_id')->references('id')->on('workCenters')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('jobOffers');
    }
}
