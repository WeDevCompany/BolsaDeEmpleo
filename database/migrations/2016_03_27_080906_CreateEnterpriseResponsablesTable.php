<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnterpriseResponsablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterpriseResponsables', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador del responsable de la empresa');
            $table->string('firstName', 50)->comment('Nombre del responsable de la empresa');
            $table->string('lastName', 75)->comment('Apellidos del responsable de la empresa');
            $table->string('dni', 9)->comment('DNI del responsable de la empresa');
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
        Schema::drop('enterpriseResponsables');
    }
}
