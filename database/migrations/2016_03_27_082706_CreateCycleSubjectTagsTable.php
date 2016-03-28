<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCycleSubjectTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cycleSubjectTags', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador de la etiqueta de una asignatura de un ciclo');
            $table->integer('cycleSubject_id')->unsigned()->comment('Identificador de la asignatura del ciclo');
            $table->integer('tag_id')->unsigned()->comment('Identificador del tag');
            $table->foreign('cycleSubject_id')->references('id')->on('cycleSubjects')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('cycleSubjectTags');
    }
}
