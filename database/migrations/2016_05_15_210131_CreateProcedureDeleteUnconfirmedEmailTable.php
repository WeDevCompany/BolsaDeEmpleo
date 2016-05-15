<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedureDeleteUnconfirmedEmailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::unprepared('CREATE PROCEDURE deleteUnconfirmedEmail(IN fechaSistema date)
            BEGIN

            UPDATE students, users
            SET students.deleted_at = fechaSistema, users.deleted_at = fechaSistema
            WHERE students.user_id=users.id and ADDDATE(students.updated_at, 15) <= fechaSistema
                and users.verifiedEmail = 0;

            UPDATE teachers, users
            SET teachers.deleted_at = fechaSistema, users.deleted_at = fechaSistema
            WHERE teachers.user_id=users.id and ADDDATE(teachers.updated_at, 15) <= fechaSistema
                and users.verifiedEmail = 0;

            UPDATE enterprises, users
            SET enterprises.deleted_at = fechaSistema, users.deleted_at = fechaSistema
            WHERE enterprises.user_id=users.id and ADDDATE(enterprises.updated_at, 15) <= fechaSistema
                and users.verifiedEmail = 0;

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
        \DB::unprepared('DROP PROCEDURE IF EXISTS deleteUnconfirmedEmail');
    }
}
