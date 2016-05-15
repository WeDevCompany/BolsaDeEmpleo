<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedureDeleteInvalidStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::unprepared('CREATE PROCEDURE deleteInvalidStudent(IN fechaSistema date)
            BEGIN

            UPDATE students, users
            SET students.deleted_at = fechaSistema, users.deleted_at = fechaSistema
            WHERE students.user_id=users.id and ADDDATE(students.updated_at, 90) <= fechaSistema
                and students.id not in (select student_id from verifiedStudents);

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
        \DB::unprepared('DROP PROCEDURE IF EXISTS deleteInvalidStudent');
    }
}
