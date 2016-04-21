<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutors', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador del tutor');
            $table->integer('dateTo')->nullable()->comment('Anyo en la que un profesor deja de ser tutor de un ciclo');
            $table->integer('dateFrom')->comment('Anyo en la que un profesor empieza como tutor');
            $table->integer('teacher_id')->unsigned()->comment('Identificador del profesor');
            $table->integer('cycle_id')->unsigned()->comment('Identificador del ciclo del que es tutor');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('tutors');
    }
}
