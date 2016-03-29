<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cycles', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador del ciclo');
            $table->string('name', 100)->comment('Nombre del ciclo');
            $table->string('codCycle', 50)->nullable()->comment('Codigo del ciclo');
            $table->enum('level', ['Superior', 'Medio', 'Básico'])->comment('Tipo de grado');
            $table->boolean('active')->default(false)->comment('Booleano para saber si esta activo un ciclo');
            $table->integer('profFamilie_id')->unsigned()->comment('Identificador de la familia profesional');
            $table->foreign('profFamilie_id')->references('id')->on('profFamilies')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('cycles');
    }
}
