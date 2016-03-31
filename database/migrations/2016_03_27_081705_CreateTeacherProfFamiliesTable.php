<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherProfFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacherProfFamilies', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador del profesor con su familia profesional');
            $table->integer('profFamilie_id')->unsigned()->comment('Identificador de la familia profesional');
            $table->integer('teacher_id')->unsigned()->comment('Identificador del profesor');
            $table->foreign('profFamilie_id')->references('id')->on('profFamilies')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('teacherProfFamilies');
    }
}
