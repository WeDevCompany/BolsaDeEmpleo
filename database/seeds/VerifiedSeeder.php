<?php

use Illuminate\Database\Seeder;

class VerifiedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

/*
 * <<<<<<------------------------------------------------>>>>>>
 * <<<<<<----INSERCION DE ADMINISTRADORES VERIFICADOS---->>>>>>
 * <<<<<<------------------------------------------------>>>>>>
 */
        \DB::table('verifiedTeachers')->insert([
            'teacher_id' => 1,
            'admin_id' => 1,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedTeachers')->insert([
            'teacher_id' => 2,
            'admin_id' => 1,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedTeachers')->insert([
            'teacher_id' => 3,
            'admin_id' => 1,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedTeachers')->insert([
            'teacher_id' => 4,
            'admin_id' => 3,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedTeachers')->insert([
            'teacher_id' => 5,
            'admin_id' => 2,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedTeachers')->insert([
            'teacher_id' => 6,
            'admin_id' => 4,
            'created_at' => date('YmdHms')
        ]);

/*
 * <<<<<<------------------------------------------------>>>>>>
 * <<<<<<-------INSERCION DE PROFESORES VERIFICADOS------>>>>>>
 * <<<<<<------------------------------------------------>>>>>>
 */
        \DB::table('verifiedTeachers')->insert([
            'teacher_id' => 7,
            'admin_id' => 5,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedTeachers')->insert([
            'teacher_id' => 8,
            'admin_id' => 6,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedTeachers')->insert([
            'teacher_id' => 9,
            'admin_id' => 1,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedTeachers')->insert([
            'teacher_id' => 10,
            'admin_id' => 2,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedTeachers')->insert([
            'teacher_id' => 11,
            'admin_id' => 4,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedTeachers')->insert([
            'teacher_id' => 12,
            'admin_id' => 3,
            'created_at' => date('YmdHms')
        ]);

/*
 * <<<<<<------------------------------------------------>>>>>>
 * <<<<<<------INSERCION DE ESTUDIANTES VERIFICADOS------>>>>>>
 * <<<<<<------------------------------------------------>>>>>>
 */
        \DB::table('verifiedStudents')->insert([
            'student_id' => 1,
            'teacher_id' => 10,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedStudents')->insert([
            'student_id' => 2,
            'teacher_id' => 12,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedStudents')->insert([
            'student_id' => 3,
            'teacher_id' => 11,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedStudents')->insert([
            'student_id' => 4,
            'teacher_id' => 8,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedStudents')->insert([
            'student_id' => 5,
            'teacher_id' => 9,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedStudents')->insert([
            'student_id' => 6,
            'teacher_id' => 11,
            'created_at' => date('YmdHms')
        ]);

/*
 * <<<<<<------------------------------------------------>>>>>>
 * <<<<<<--------INSERCION DE OFERTAS VERIFICADAS-------->>>>>>
 * <<<<<<------------------------------------------------>>>>>>
 */
        \DB::table('verifiedOffers')->insert([
            'jobOffer_id' => 1,
            'teacher_id' => 2,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedOffers')->insert([
            'jobOffer_id' => 3,
            'teacher_id' => 6,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedOffers')->insert([
            'jobOffer_id' => 4,
            'teacher_id' => 8,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedOffers')->insert([
            'jobOffer_id' => 5,
            'teacher_id' => 10,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedOffers')->insert([
            'jobOffer_id' => 6,
            'teacher_id' => 1,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedOffers')->insert([
            'jobOffer_id' => 7,
            'teacher_id' => 12,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedOffers')->insert([
            'jobOffer_id' => 8,
            'teacher_id' => 5,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedOffers')->insert([
            'jobOffer_id' => 9,
            'teacher_id' => 6,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedOffers')->insert([
            'jobOffer_id' => 10,
            'teacher_id' => 7,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedOffers')->insert([
            'jobOffer_id' => 11,
            'teacher_id' => 9,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedOffers')->insert([
            'jobOffer_id' => 13,
            'teacher_id' => 11,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedOffers')->insert([
            'jobOffer_id' => 14,
            'teacher_id' => 3,
            'created_at' => date('YmdHms')
        ]);
        \DB::table('verifiedOffers')->insert([
            'jobOffer_id' => 15,
            'teacher_id' => 7,
            'created_at' => date('YmdHms')
        ]);
    }
}
