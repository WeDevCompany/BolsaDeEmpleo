<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnterpriseCenterResponsablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterpriseCenterResponsables', function (Blueprint $table) {
            $table->increments('id', 10)->comment('Identificador de la union entre centro de trabajo y responsable');
            $table->integer('workCenter_id')->unsigned()->comment('Identidicador del centro de trabajo al que pertenece un responsable');
            $table->integer('enterpriseResponsable_id')->unsigned()->comment('Identificador del responsable');
            $table->foreign('workCenter_id')->references('id')->on('workCenters')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('enterpriseResponsable_id')->references('id')->on('enterpriseResponsables')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('enterpriseCenterResponsables');
    }
}
