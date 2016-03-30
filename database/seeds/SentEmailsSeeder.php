<?php

use Illuminate\Database\Seeder;

class SentEmailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// EMAIL PROFESOR OFERTA DE TRABAJO 1
    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 1,
    		'teacher_id' => 1,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 1,
    		'teacher_id' => 6,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 1,
    		'teacher_id' => 7,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 1,
    		'teacher_id' => 8,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 1,
    		'teacher_id' => 9,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 1,
    		'teacher_id' => 10,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 1,
    		'teacher_id' => 11,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 1,
    		'teacher_id' => 12,
    		'created_at' => date('YmdHms')

    	]);

    	// EMAIL PROFESOR OFERTA DE TRABAJO 2
    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 2,
    		'teacher_id' => 1,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 2,
    		'teacher_id' => 6,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 2,
    		'teacher_id' => 7,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 2,
    		'teacher_id' => 8,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 2,
    		'teacher_id' => 9,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 2,
    		'teacher_id' => 10,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 2,
    		'teacher_id' => 11,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 2,
    		'teacher_id' => 12,
    		'created_at' => date('YmdHms')

    	]);

    	// EMAIL PROFESOR OFERTA DE TRABAJO 3
    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 3,
    		'teacher_id' => 1,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 3,
    		'teacher_id' => 6,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 3,
    		'teacher_id' => 7,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 3,
    		'teacher_id' => 8,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 3,
    		'teacher_id' => 9,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 3,
    		'teacher_id' => 10,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 3,
    		'teacher_id' => 11,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'sent' => true,
    		'jobOffer_id' => 3,
    		'teacher_id' => 12,
    		'created_at' => date('YmdHms')

    	]);

    	// EMAIL PROFESOR OFERTA DE TRABAJO 4 NO RECIBIDA
    	\DB::table('sentEmails')->insert([
    		'jobOffer_id' => 4,
    		'teacher_id' => 1,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'jobOffer_id' => 4,
    		'teacher_id' => 6,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'jobOffer_id' => 4,
    		'teacher_id' => 7,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'jobOffer_id' => 4,
    		'teacher_id' => 8,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'jobOffer_id' => 4,
    		'teacher_id' => 9,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'jobOffer_id' => 4,
    		'teacher_id' => 10,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'jobOffer_id' => 4,
    		'teacher_id' => 11,
    		'created_at' => date('YmdHms')

    	]);

    	\DB::table('sentEmails')->insert([
    		'jobOffer_id' => 4,
    		'teacher_id' => 12,
    		'created_at' => date('YmdHms')

    	]);
    }
}
