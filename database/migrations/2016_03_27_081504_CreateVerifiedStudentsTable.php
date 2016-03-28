<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerifiedStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifiedStudents', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador del estudiante verificada');
            $table->integer('student_id')->unsigned()->comment('Identificador del estudiante que ha sido validado');
            $table->integer('teacher_id')->unsigned()->comment('Identificador del profesor que ha validado al estudiante');
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
        Schema::drop('verifiedStudents');
    }
}
