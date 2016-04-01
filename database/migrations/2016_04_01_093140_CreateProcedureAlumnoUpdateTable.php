<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedureAlumnoUpdateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::unprepared('CREATE PROCEDURE updateAlumno(IN fechaSistema date)
            BEGIN

            DELETE students, users FROM students, users
            WHERE students.user_id=users.id and  ADDDATE(students.updated_at, 1825) <= fechaSistema;

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
        \DB::unprepared('DROP PROCEDURE IF EXISTS updateAlumno');
    }
}
