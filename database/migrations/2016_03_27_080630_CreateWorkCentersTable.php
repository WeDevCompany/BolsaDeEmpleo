<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workCenters', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador del centro de trabajo');
            $table->enum('road',['Alameda','Alto','Avenida','Bulevar','Camino','Calle','Carrera','Callejon','Corredera','Costanilla','Cuesta','Carretera','Paseo','Pista','Pasaje','Rambla','Rinconada','Ronda','Senda','Travesia','Via','Glorieta','Plaza','Plazoleta','Plazuela','Rotonda'])->comment('Tipo de vía del centro de trabajo');
            $table->string('address', 255)->comment('Direccion del centro de trabajo');
            $table->string('name', 255)->unique()->comment('Nombre del centro de trabajo');
            $table->string('email', 100)->comment('Email de contacto del centro de trabajo');
            $table->string('phone1', 12)->comment('Numero de teléfono principal del centro de trabajo');
            $table->string('phone2', 12)->nullable()->comment('Numero de telefono secundario del centro de trabajo');
            $table->string('fax', 12)->nullable()->comment('Numero de fax del centro de trabajo');
            $table->boolean('principalCenter')->default(false)->comment('Booleano que sirve para saber si el centro de trabajo es la sede principal de la empresa');
            $table->integer('enterprise_id')->unsigned()->comment('Identificador de la empresa a la que pertenece el centro de trabajo');
            $table->integer('citie_id')->unsigned()->comment('Identificador de la ciudad en la cual esta ubicada el centro de trabajo');
            $table->foreign('enterprise_id')->references('id')->on('enterprises')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('citie_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('workCenters');
    }
}
