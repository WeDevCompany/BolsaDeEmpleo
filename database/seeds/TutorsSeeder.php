<?php

use Illuminate\Database\Seeder;

class TutorsSeeder extends Seeder
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
    				    TUTOR
    	*******************************************/

    	\DB::table('tutors')->insert([
            'dateFrom' => '2007',
            'cycle_id' => 4,
            'teacher_id' => 7,
            'created_at' => date('YmdHms')
        ]);

        /******************************************
    				ENMANUEL TEACHER
    				    TUTOR
    	*******************************************/

    	\DB::table('tutors')->insert([
            'dateFrom' => '2002',
            'cycle_id' => 2,
            'teacher_id' => 8,
            'created_at' => date('YmdHms')
        ]);

        /******************************************
    				PEDRO TEACHER
    				    TUTOR
    	*******************************************/

    	\DB::table('tutors')->insert([
            'dateFrom' => '2012',
            'dateTo' => '2014',
            'cycle_id' => 1,
            'teacher_id' => 9,
            'created_at' => date('YmdHms')
        ]);

        /******************************************
    				FERNANDO TEACHER
    				    TUTOR
    	*******************************************/

    	\DB::table('tutors')->insert([
            'dateFrom' => '2006',
            'dateTo' => '2012',
            'cycle_id' => 3,
            'teacher_id' => 10,
            'created_at' => date('YmdHms')
        ]);


        /******************************************
    				CARLOS TEACHER
    				    TUTOR
    	*******************************************/

    	\DB::table('tutors')->insert([
            'dateFrom' => '2014',
            'cycle_id' => 1,
            'teacher_id' => 12,
            'created_at' => date('YmdHms')
        ]);

        /******************************************
                    EDUARDO ADMIN
                        TUTOR
        *******************************************/

        \DB::table('tutors')->insert([
            'dateFrom' => '2008',
            'cycle_id' => 8,
            'teacher_id' => 1,
            'created_at' => date('YmdHms')
        ]);

        /******************************************
                    CARLOS ADMIN
                        TUTOR
        *******************************************/

        \DB::table('tutors')->insert([
            'dateFrom' => '2014',
            'cycle_id' => 9,
            'teacher_id' => 6,
            'created_at' => date('YmdHms')
        ]);
    }
}
