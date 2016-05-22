<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentEmailStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentEmailStudents', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador del envio de email al profesor sobre el alumno a validar');
            $table->boolean('sent')->default(false)->comment('Booleano que verifica el envio de email del estudiante al profesor');
            $table->integer('student_id')->unsigned()->comment('Identificador del estudiante');
            $table->integer('teacher_id')->unsigned()->comment('Identificador del profesor');
            $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('sentEmailStudents');
    }
}

