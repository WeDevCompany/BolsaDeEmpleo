<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCycleSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cycleSubjects', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador de la asignatura de un ciclo');
            $table->integer('subject_id')->unsigned()->comment('Identificador de la asignatura');
            $table->integer('cycle_id')->unsigned()->comment('Identificador del ciclo');
            $table->foreign('subject_id')->references('id')->on('subjects')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cycle_id')->references('id')->on('cycles')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('cycleSubjects');
    }
}
