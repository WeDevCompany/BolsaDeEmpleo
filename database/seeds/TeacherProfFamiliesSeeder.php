<?php

use Illuminate\Database\Seeder;

class TeacherProfFamiliesSeeder extends Seeder
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
    				PROF FAMILIES
    	*******************************************/

    	\DB::table('teacherProfFamilies')->insert([
            'profFamilie_id' => 1,
            'teacher_id' => 7,
            'created_at' => date('YmdHms')
        ]);

        /******************************************
    				ENMANUEL TEACHER
    				PROF FAMILIES
    	*******************************************/

    	\DB::table('teacherProfFamilies')->insert([
            'profFamilie_id' => 1,
            'teacher_id' => 8,
            'created_at' => date('YmdHms')
        ]);

        /******************************************
    				PEDRO TEACHER
    				PROF FAMILIES
    	*******************************************/

    	\DB::table('teacherProfFamilies')->insert([
            'profFamilie_id' => 1,
            'teacher_id' => 9,
            'created_at' => date('YmdHms')
        ]);

        /******************************************
    				FERNANDO TEACHER
    				PROF FAMILIES
    	*******************************************/

    	\DB::table('teacherProfFamilies')->insert([
            'profFamilie_id' => 1,
            'teacher_id' => 10,
            'created_at' => date('YmdHms')
        ]);

        \DB::table('teacherProfFamilies')->insert([
            'profFamilie_id' => 2,
            'teacher_id' => 10,
            'created_at' => date('YmdHms')
        ]);

        /******************************************
    				ABEL TEACHER
    				PROF FAMILIES
    	*******************************************/

    	\DB::table('teacherProfFamilies')->insert([
            'profFamilie_id' => 1,
            'teacher_id' => 11,
            'created_at' => date('YmdHms')
        ]);

        /******************************************
    				CARLOS TEACHER
    				PROF FAMILIES
    	*******************************************/

    	\DB::table('teacherProfFamilies')->insert([
            'profFamilie_id' => 1,
            'teacher_id' => 12,
            'created_at' => date('YmdHms')
        ]);

        /******************************************
                    PRUEBAS TEACHER
                    PROF FAMILIES
        *******************************************/

        \DB::table('teacherProfFamilies')->insert([
            'profFamilie_id' => 1,
            'teacher_id' => 13,
            'created_at' => date('YmdHms')
        ]);

        \DB::table('teacherProfFamilies')->insert([
            'profFamilie_id' => 1,
            'teacher_id' => 14,
            'created_at' => date('YmdHms')
        ]);

        \DB::table('teacherProfFamilies')->insert([
            'profFamilie_id' => 1,
            'teacher_id' => 15,
            'created_at' => date('YmdHms')
        ]);

        \DB::table('teacherProfFamilies')->insert([
            'profFamilie_id' => 1,
            'teacher_id' => 16,
            'created_at' => date('YmdHms')
        ]);

        \DB::table('teacherProfFamilies')->insert([
            'profFamilie_id' => 2,
            'teacher_id' => 16,
            'created_at' => date('YmdHms')
        ]);

        \DB::table('teacherProfFamilies')->insert([
            'profFamilie_id' => 1,
            'teacher_id' => 17,
            'created_at' => date('YmdHms')
        ]);

        \DB::table('teacherProfFamilies')->insert([
            'profFamilie_id' => 1,
            'teacher_id' => 18,
            'created_at' => date('YmdHms')
        ]);

    }
}