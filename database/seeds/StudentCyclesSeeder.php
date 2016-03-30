<?php

use Illuminate\Database\Seeder;

class StudentCyclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/******************************************
    				EDUARDO STUDENT
    				    TUTOR
    	*******************************************/

    	\DB::table('studentCycles')->insert([
            'dateFrom' => '2014',
            'cycle_id' => 1,
            'student_id' => 1,
            'created_at' => date('YmdHms')
        ]);

        \DB::table('studentCycles')->insert([
            'dateFrom' => '2012',
            'dateTo' => '2014',
            'cycle_id' => 2,
            'student_id' => 1,
            'created_at' => date('YmdHms')
        ]);

        /******************************************
    				ENMANUEL STUDENT
    				    TUTOR
    	*******************************************/

    	\DB::table('studentCycles')->insert([
            'dateFrom' => '2015',
            'cycle_id' => 3,
            'student_id' => 2,
            'created_at' => date('YmdHms')
        ]);

        \DB::table('studentCycles')->insert([
            'dateFrom' => '2012',
            'dateTo' => '2015',
            'cycle_id' => 4,
            'student_id' => 2,
            'created_at' => date('YmdHms')
        ]);

        \DB::table('studentCycles')->insert([
            'dateFrom' => '2010',
            'dateTo' => '2012',
            'cycle_id' => 5,
            'student_id' => 2,
            'created_at' => date('YmdHms')
        ]);

        /******************************************
    				PEDRO STUDENT
    				    TUTOR
    	*******************************************/

    	\DB::table('studentCycles')->insert([
            'dateFrom' => '2012',
            'dateTo' => '2014',
            'cycle_id' => 6,
            'student_id' => 3,
            'created_at' => date('YmdHms')
        ]);

        /******************************************
    				FERNANDO STUDENT
    				    TUTOR
    	*******************************************/

    	\DB::table('studentCycles')->insert([
            'dateFrom' => '2014',
            'dateTo' => '2012',
            'cycle_id' => 7,
            'student_id' => 4,
            'created_at' => date('YmdHms')
        ]);


        /******************************************
    				ABEL STUDENT
    				    TUTOR
    	*******************************************/

    	\DB::table('studentCycles')->insert([
            'dateFrom' => '2013',
            'cycle_id' => 8,
            'student_id' => 5,
            'created_at' => date('YmdHms')
        ]);

        /******************************************
    				CARLOS STUDENT
    				    TUTOR
    	*******************************************/

    	\DB::table('studentCycles')->insert([
            'dateFrom' => '2013',
            'cycle_id' => 9,
            'student_id' => 6,
            'created_at' => date('YmdHms')
        ]);
    }
}
