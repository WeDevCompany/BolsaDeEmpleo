<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profFamilies', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador de la familia profesional');
            $table->string('name', 100)->comment('Nombre de la familia profesional');
            $table->boolean('active')->default(false)->comment('Booleano para saber si esta activa una familia profesional');
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
        Schema::drop('profFamilies');
    }
}
