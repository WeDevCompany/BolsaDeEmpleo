<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurriculumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creamos la tabla curriculums
        // Para que en un futuro se pueda hacer la implementación de que un alumno
        // pueda tener muchos curriculums
        Schema::create('curriculums', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador del curriculum');
            $table->string('name', 50)->comment('Nombre del curriculum');
            $table->integer('updates')->comment('Numero de veces que el alumno ha actualizado un perfil')->unsigned()->default(0);

            $table->integer('student_id')->comment('Identificador del estudiante al que hace referencia este curriculum')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }// up

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('curriculums');
    }
}
