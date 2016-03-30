<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjectTeachers', function (Blueprint $table) {    
            $table->increments('id',10)->comment('Identificador de las asignaturas que imparte un profesor');
            $table->string('dateTo',4)->nullable()->comment('Fecha de finalizacion de la asignatura');
            $table->string('dateFrom',4)->comment('Fecha de inicio de la asignatura');
            $table->integer('teacher_id')->unsigned()->comment('Identificador del profesor');
            $table->integer('subject_id')->unsigned()->comment('Identificador del estudiante');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('subjectTeachers');
    }
}
