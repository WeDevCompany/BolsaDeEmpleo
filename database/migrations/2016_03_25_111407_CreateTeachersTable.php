<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador del profesor');
            $table->string('firstName', 50)->comment('Nombre del profesor');
            $table->string('lastName', 75)->comment('Apellidos del profesor');
            $table->string('dni', 9)->comment('DNI/NIE del profesor')->unique();
            $table->string('phone', 12)->comment('Telefono del profesor');
            $table->integer('user_id')->comment('Identificador de los datos de usuario del profesor')->unsigned();
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
        Schema::drop('teachers');
    }
}
