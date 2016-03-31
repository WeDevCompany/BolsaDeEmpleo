<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedureFechaExpiracionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::unprepared('CREATE PROCEDURE fechaExpiracion(IN fechaSistema date)
            BEGIN
            DELETE FROM jobOffers
            WHERE dueDate <= fechaSistema;
            END'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::unprepared('DROP PROCEDURE IF EXISTS fechaExpiracion');
    }
}
