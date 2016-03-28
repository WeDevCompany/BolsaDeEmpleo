<?php

use Illuminate\Database\Seeder;

class WorkCentersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/************************************************
    						WORK CENTER
    					EMPRESA EDUARDO
    	*************************************************/

        $workCenter_id = \DB::table('workCenters')->insertGetId([
        	'road' => 'Alameda',
        	'address' => strtoupper('Alameda de los Pinos'),
        	'name' => strtoupper('La taberna de Eduardo'),
        	'email' => strtoupper('eduardo@workcenter.es'),
        	'phone1' => '987345216',
        	'phone2' => '678953241',
        	'fax' => '34947650057',
        	'enterprise_id' => 1,
        	'citie_id' => 7603,
        	'principalCenter' => true,
        	'created_at' => date('YmdHms'),

        ]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => strtoupper('Jaime'),
        		'lastName' => strtoupper('Molto Zapata'),
        		'dni' => strtoupper('53261921Q'),
        		'created_at' => date('YmdHms'),
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms'),
        		]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => strtoupper('Eugenio'),
        		'lastName' => strtoupper('Lage Vivas'),
        		'dni' => strtoupper('49824109Z'),
        		'created_at' => date('YmdHms'),
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms'),
        		]);

        /************************************************
    						WORK CENTER
    					EMPRESA EMMANUEL
    	*************************************************/

        $workCenter_id = \DB::table('workCenters')->insertGetId([
        	'road' => 'Avenida',
        	'address' => strtoupper('Av Alcaldes de Murcia'),
        	'name' => strtoupper('El mesón de Emmanuel'),
        	'email' => strtoupper('emmanuel@workcenter.es'),
        	'phone1' => '673290739',
        	'enterprise_id' => 2,
        	'citie_id' => 500,
        	'principalCenter' => true,
        	'created_at' => date('YmdHms'),

        ]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => strtoupper('Francisco Javier'),
        		'lastName' => strtoupper('Romeu Campillo'),
        		'dni' => strtoupper('68976371S'),
        		'created_at' => date('YmdHms'),
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms'),
        		]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => strtoupper('Aitor'),
        		'lastName' => strtoupper('Gimenez Peinado'),
        		'dni' => strtoupper('22844831N'),
        		'created_at' => date('YmdHms'),
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms'),
        		]);

        $workCenter_id = \DB::table('workCenters')->insertGetId([
        	'road' => 'Avenida',
        	'address' => strtoupper('Av Antonete Gálvez'),
        	'name' => strtoupper('El mesoncito'),
        	'email' => strtoupper('evamaria@workcenter.es'),
        	'phone1' => '789549021',
        	'phone2' => '654340976',
        	'enterprise_id' => 2,
        	'citie_id' => 6089,
        	'created_at' => date('YmdHms'),

        ]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => strtoupper('Eva Maria'),
        		'lastName' => strtoupper('Vacas Anguita'),
        		'dni' => strtoupper('07225965D'),
        		'created_at' => date('YmdHms'),
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms'),
        		]);

        /************************************************
    						WORK CENTER
    					EMPRESA PEDRO
    	*************************************************/

    	$workCenter_id = \DB::table('workCenters')->insertGetId([
        	'road' => 'Calle',
        	'address' => strtoupper('Calle Artes Y Oficios'),
        	'name' => strtoupper('Multivision'),
        	'email' => strtoupper('olga@workcenter.es'),
        	'phone1' => '749907856',
        	'phone2' => '098453212',
        	'fax' => '34947650064',
        	'enterprise_id' => 3,
        	'citie_id' => 5480,
        	'principalCenter' => true,
        	'created_at' => date('YmdHms'),

        ]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => strtoupper('Olga'),
        		'lastName' => strtoupper('Selles Roman'),
        		'dni' => strtoupper('55613110F'),
        		'created_at' => date('YmdHms'),
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms'),
        		]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => strtoupper('Mercedes'),
        		'lastName' => strtoupper('Bnedicto Pachon'),
        		'dni' => strtoupper('14729696J'),
        		'created_at' => date('YmdHms'),
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms'),
        		]);

        $workCenter_id = \DB::table('workCenters')->insertGetId([
        	'road' => 'Calle',
        	'address' => strtoupper('Calle Azacaya'),
        	'name' => strtoupper('Provision'),
        	'email' => strtoupper('Aurora@workcenter.es'),
        	'phone1' => '987679809',
        	'enterprise_id' => 3,
        	'citie_id' => 4536,
        	'created_at' => date('YmdHms'),

        ]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => strtoupper('Aurora'),
        		'lastName' => strtoupper('Palomo Pariente'),
        		'dni' => strtoupper('23848911G'),
        		'created_at' => date('YmdHms'),
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms'),
        		]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => strtoupper('Maria Elena'),
        		'lastName' => strtoupper('Santos Cerda'),
        		'dni' => strtoupper('55627050D'),
        		'created_at' => date('YmdHms'),
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms'),
        		]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => strtoupper('Concepcion'),
        		'lastName' => strtoupper('Ovejero Cuello'),
        		'dni' => strtoupper('19591310W'),
        		'created_at' => date('YmdHms'),
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms'),
        		]);

        $workCenter_id = \DB::table('workCenters')->insertGetId([
        	'road' => 'Calle',
        	'address' => strtoupper('Calle Asensios'),
        	'name' => strtoupper('SinVision'),
        	'email' => strtoupper('Victoria@workcenter.es'),
        	'phone1' => '456391209',
        	'fax' => '34947650059',
        	'enterprise_id' => 3,
        	'citie_id' => 6134,
        	'created_at' => date('YmdHms'),

        ]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => strtoupper('Victoria'),
        		'lastName' => strtoupper('Borja Albert'),
        		'dni' => strtoupper('60613245B'),
        		'created_at' => date('YmdHms'),
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms'),
        		]);

        /************************************************
    						WORK CENTER
    					EMPRESA FERNANDO
    	*************************************************/

    	$workCenter_id = \DB::table('workCenters')->insertGetId([
        	'road' => 'Plaza',
        	'address' => strtoupper('Plaza Triangular'),
        	'name' => strtoupper('La ferretería de Fernando'),
        	'email' => strtoupper('fernando@workcenter.es'),
        	'phone1' => '876409823',
        	'enterprise_id' => 4,
        	'citie_id' => 670,
        	'principalCenter' => true,
        	'created_at' => date('YmdHms'),

        ]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => strtoupper('Paula'),
        		'lastName' => strtoupper('Palomino Medrano'),
        		'dni' => strtoupper('94643853A'),
        		'created_at' => date('YmdHms'),
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms'),
        		]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => strtoupper('Natalia'),
        		'lastName' => strtoupper('Roda de Juan'),
        		'dni' => strtoupper('41997739S'),
        		'created_at' => date('YmdHms'),
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms'),
        		]);

        /************************************************
    						WORK CENTER
    					EMPRESA ABEL
    	*************************************************/

    	$workCenter_id = \DB::table('workCenters')->insertGetId([
        	'road' => 'Camino',
        	'address' => strtoupper('Camino Corbalanes'),
        	'name' => strtoupper('El hotel de Abel'),
        	'email' => strtoupper('abel@workcenter.es'),
        	'phone1' => '123456789',
        	'enterprise_id' => 5,
        	'citie_id' => 7301,
        	'principalCenter' => true,
        	'created_at' => date('YmdHms'),

        ]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => strtoupper('Jose'),
        		'lastName' => strtoupper('Mengual Vizcano'),
        		'dni' => strtoupper('68274521X'),
        		'created_at' => date('YmdHms'),
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms'),
        		]);

        /************************************************
    						WORK CENTER
    					EMPRESA CARLOS
    	*************************************************/

    	$workCenter_id = \DB::table('workCenters')->insertGetId([
        	'road' => 'Carril',
        	'address' => strtoupper('Carril de los Bernabeles'),
        	'name' => strtoupper('La floristería de Carlos'),
        	'email' => strtoupper('carlos@workcenter.es'),
        	'phone1' => '786439132',
        	'enterprise_id' => 6,
        	'citie_id' => 3529,
        	'principalCenter' => true,
        	'created_at' => date('YmdHms'),

        ]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => strtoupper('Jose Manuel'),
        		'lastName' => strtoupper('Pillina Aragones'),
        		'dni' => strtoupper('69831534S'),
        		'created_at' => date('YmdHms'),
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms'),
        		]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => strtoupper('Esteban'),
        		'lastName' => strtoupper('Picon Villarejo'),
        		'dni' => strtoupper('87575857E'),
        		'created_at' => date('YmdHms'),
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms'),
        		]);

    }
}
