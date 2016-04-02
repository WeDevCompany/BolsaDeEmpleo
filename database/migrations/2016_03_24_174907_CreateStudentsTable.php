<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador del estudiante');
            $table->string('firstName', 50)->comment('Nombre del estudiante');
            $table->string('lastName', 75)->comment('Apellidos del estudiante');
            $table->string('dni', 9)->comment('DNI/NIE del estudiante')->unique();
            $table->string('nre', 10)->comment('NRE del estudiante')->unique()->nullable();
            $table->string('phone', 12)->comment('Telefono del estudiante');
            $table->enum('road', ['Alameda','Alto','Avenida','Bulevar','Camino','Calle','Carrera','Callejon','Corredera','Costanilla','Cuesta','Carretera','Paseo','Pista','Pasaje','Rambla','Rinconada','Ronda','Senda','Travesia','Via','Glorieta','Plaza','Plazoleta','Plazuela','Rotonda'])->comment('Tipo de via de residencia del estudiante');
            $table->string('address', 255)->comment('Direccion del estudiante');
            $table->string('curriculum', 255)->comment('Ruta del curriculum del estudiante');
            $table->date('birthdate','Y-m-d')->comment('Fecha de nacimiento del estudiante');

            // Campo de los estudiantes que será el
            // que permita la actualización del perfil
            // de forma que cuando ellos hagan click en el enlace
            // nosotros actualizaremos este campo sumandoles 1 número más
            // lo cual modificará el registro y actualizara
            // la fecha de modificado, la cual tomaremos como referencia
            // para calcular el tope de 5 años de inactividad.
            // Este campo también nos permite saber cuantas veces el
            // alumno a querido actualizar el perfil por cuenta propia.
            $table->integer('updates')->comment('Numero de veces que el alumno ha actualizado un perfil')->unsigned()->default(0);

            $table->integer('user_id')->comment('Identificador de los datos de usuario del estudiante')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('students');
    }
}
