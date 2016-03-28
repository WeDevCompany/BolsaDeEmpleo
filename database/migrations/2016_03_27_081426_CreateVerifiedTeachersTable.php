<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerifiedTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifiedTeachers', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador del profesor verificado');
            $table->integer('teacher_id')->unsigned()->comment('Identificador del profesor que ha sido aceptado');
            $table->integer('admin_id')->unsigned()->comment('Identificador del profesor administrador que lo ha aceptado');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('teachers')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('verifiedTeachers');
    }
}
