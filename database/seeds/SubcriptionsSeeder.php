<?php

use Illuminate\Database\Seeder;

class SubcriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// SUSCRIPCIONES OFERTA DE TRABAJO 1
    	\DB::table('subcriptions')->insert([
    		'sentEmail' => true,
    		'jobOffer_id' => 1,
    		'student_id' => 1,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('subcriptions')->insert([
    		'sentEmail' => true,
    		'jobOffer_id' => 1,
    		'student_id' => 2,
    		'created_at' => date('YmdHms')

    	]);

    	// SUSCRIPCIONES OFERTA DE TRABAJO 2
    	\DB::table('subcriptions')->insert([
    		'sentEmail' => true,
    		'jobOffer_id' => 2,
    		'student_id' => 1,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('subcriptions')->insert([
    		'sentEmail' => true,
    		'jobOffer_id' => 2,
    		'student_id' => 2,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('subcriptions')->insert([
    		'sentEmail' => true,
    		'jobOffer_id' => 2,
    		'student_id' => 3,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('subcriptions')->insert([
    		'sentEmail' => true,
    		'jobOffer_id' => 2,
    		'student_id' => 4,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('subcriptions')->insert([
    		'sentEmail' => true,
    		'jobOffer_id' => 2,
    		'student_id' => 5,
    		'created_at' => date('YmdHms')

    	]);

    	// SUSCRIPCIONES OFERTA DE TRABAJO 3
    	\DB::table('subcriptions')->insert([
    		'sentEmail' => true,
    		'jobOffer_id' => 3,
    		'student_id' => 1,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('subcriptions')->insert([
    		'sentEmail' => true,
    		'jobOffer_id' => 3,
    		'student_id' => 2,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('subcriptions')->insert([
    		'sentEmail' => true,
    		'jobOffer_id' => 3,
    		'student_id' => 3,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('subcriptions')->insert([
    		'sentEmail' => true,
    		'jobOffer_id' => 3,
    		'student_id' => 4,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('subcriptions')->insert([
    		'sentEmail' => true,
    		'jobOffer_id' => 3,
    		'student_id' => 5,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('subcriptions')->insert([
    		'sentEmail' => true,
    		'jobOffer_id' => 3,
    		'student_id' => 6,
    		'created_at' => date('YmdHms')

    	]);

    	// SUSCRIPCIONES OFERTA DE TRABAJO 4
    	\DB::table('subcriptions')->insert([
    		'sentEmail' => true,
    		'jobOffer_id' => 4,
    		'student_id' => 1,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('subcriptions')->insert([
    		'sentEmail' => true,
    		'jobOffer_id' => 4,
    		'student_id' => 2,
    		'created_at' => date('YmdHms')

    	]);
    }
}
