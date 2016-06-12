<?php

use Illuminate\Database\Seeder;

class SubjectTeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /******************************************
    				EDUARDO TEACHER
    				SUBJECTS
    	*******************************************/

    	\DB::table('subjectTeachers')->insert([
            'dateFrom' => 2016,
            'dateTo' => 2017,
            'subject_id' => 1,
            'teacher_id' => 7,
            'created_at' => date('YmdHms')
        ]);

        \DB::table('subjectTeachers')->insert([
            'dateFrom' => 2016,
            'dateTo' => 2017,
            'subject_id' => 7,
            'teacher_id' => 7,
            'created_at' => date('YmdHms')
        ]);

        \DB::table('subjectTeachers')->insert([
            'dateFrom' => 2015,
            'dateTo' => 2016,
            'subject_id' => 8,
            'teacher_id' => 7,
            'created_at' => date('YmdHms')
        ]);

        /******************************************
    				ENMANUEL TEACHER
    				SUBJECTS
    	*******************************************/

    	\DB::table('subjectTeachers')->insert([
            'dateFrom' => date('YmdHms'),
            'subject_id' => 2,
            'teacher_id' => 8,
            'created_at' => date('YmdHms')
        ]);

        \DB::table('subjectTeachers')->insert([
            'dateFrom' => date('YmdHms'),
            'subject_id' => 11,
            'teacher_id' => 8,
            'created_at' => date('YmdHms')
        ]);

        /******************************************
    				PEDRO TEACHER
    				SUBJECTS
    	*******************************************/

        \DB::table('subjectTeachers')->insert([
            'dateFrom' => date('YmdHms'),
            'subject_id' => 13,
            'teacher_id' => 9,
            'created_at' => date('YmdHms')
        ]);

        \DB::table('subjectTeachers')->insert([
            'dateFrom' => date('YmdHms'),
            'subject_id' => 14,
            'teacher_id' => 9,
            'created_at' => date('YmdHms')
        ]);

        /******************************************
    				TESTEO1 TEACHER
    				SUBJECTS
    	*******************************************/

    	\DB::table('subjectTeachers')->insert([
            'dateFrom' => date('YmdHms'),
            'subject_id' => 3,
            'teacher_id' => 10,
            'created_at' => date('YmdHms')
        ]);

        \DB::table('subjectTeachers')->insert([
            'dateFrom' => date('YmdHms'),
            'subject_id' => 4,
            'teacher_id' => 10,
            'created_at' => date('YmdHms')
        ]);

        /******************************************
    				TESTEO2 TEACHER
    				SUBJECTS
    	**********************0*********************/

    	\DB::table('subjectTeachers')->insert([
            'dateFrom' => date('YmdHms'),
            'subject_id' => 5,
            'teacher_id' => 11,
            'created_at' => date('YmdHms')
        ]);

    	\DB::table('subjectTeachers')->insert([
            'dateFrom' => date('YmdHms'),
            'subject_id' => 6,
            'teacher_id' => 11,
            'created_at' => date('YmdHms')
        ]);

        /******************************************
                    EDUARDO ADMIN
                    SUBJECTS
        *******************************************/

        \DB::table('subjectTeachers')->insert([
            'dateFrom' => 2015,
            'dateTo' => 2016,
            'subject_id' => 1,
            'teacher_id' => 1,
            'created_at' => date('YmdHms')
        ]);

        \DB::table('subjectTeachers')->insert([
            'dateFrom' => 2015,
            'dateTo' => 2016,
            'subject_id' => 2,
            'teacher_id' => 1,
            'created_at' => date('YmdHms')
        ]);

    }
}