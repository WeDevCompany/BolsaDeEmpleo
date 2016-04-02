<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnterprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprises', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador de la empresa');
            $table->string('name',255)->unique()->comment('Nombre de la empresa');
            $table->string('cif',9)->unique()->comment('CIF de la empresa');
            $table->string('web',255)->nullable()->comment('Url de la web de la empresa');
            $table->string('description',255)->comment('Descripcion de la empresa');
            $table->integer('user_id')->unsigned()->comment('Identificador de los datos de usuario de la empresa');
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
        Schema::drop('enterprises');
    }
}
