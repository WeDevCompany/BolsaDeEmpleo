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
        	'address' => mb_strtolower('Alameda de los Pinos'),
        	'name' => mb_strtolower('La taberna de Eduardo'),
        	'email' => mb_strtolower('eduardo@workcenter.es'),
        	'phone1' => '987345216',
        	'phone2' => '678953241',
        	'fax' => '34947650057',
        	'enterprise_id' => 1,
        	'citie_id' => 7603,
        	'principalCenter' => true,
        	'created_at' => date('YmdHms')
        ]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => mb_strtolower('Jaime'),
        		'lastName' => mb_strtolower('Molto Zapata'),
        		'dni' => strtoupper('53261921Q'),
        		'created_at' => date('YmdHms')
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms')
        		]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => mb_strtolower('Eugenio'),
        		'lastName' => mb_strtolower('Lage Vivas'),
        		'dni' => strtoupper('49824109Z'),
        		'created_at' => date('YmdHms')
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms')
        		]);

        /************************************************
    						WORK CENTER
    					EMPRESA EMMANUEL
    	*************************************************/

        $workCenter_id = \DB::table('workCenters')->insertGetId([
        	'road' => 'Avenida',
        	'address' => mb_strtolower('Av Alcaldes de Murcia'),
        	'name' => mb_strtolower('El mesón de Emmanuel'),
        	'email' => mb_strtolower('emmanuel@workcenter.es'),
        	'phone1' => '673290739',
        	'enterprise_id' => 2,
        	'citie_id' => 500,
        	'principalCenter' => true,
        	'created_at' => date('YmdHms')

        ]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => mb_strtolower('Francisco Javier'),
        		'lastName' => mb_strtolower('Romeu Campillo'),
        		'dni' => strtoupper('68976371S'),
        		'created_at' => date('YmdHms')
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms')
        		]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => mb_strtolower('Aitor'),
        		'lastName' => mb_strtolower('Gimenez Peinado'),
        		'dni' => strtoupper('22844831N'),
        		'created_at' => date('YmdHms')
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms')
        		]);

        $workCenter_id = \DB::table('workCenters')->insertGetId([
        	'road' => 'Avenida',
        	'address' => mb_strtolower('Av Antonete Gálvez'),
        	'name' => mb_strtolower('El mesoncito'),
        	'email' => mb_strtolower('evamaria@workcenter.es'),
        	'phone1' => '789549021',
        	'phone2' => '654340976',
        	'enterprise_id' => 2,
        	'citie_id' => 6089,
        	'created_at' => date('YmdHms')

        ]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => mb_strtolower('Eva Maria'),
        		'lastName' => mb_strtolower('Vacas Anguita'),
        		'dni' => strtoupper('07225965D'),
        		'created_at' => date('YmdHms')
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms')
        		]);

        /************************************************
    						WORK CENTER
    					EMPRESA PEDRO
    	*************************************************/

    	$workCenter_id = \DB::table('workCenters')->insertGetId([
        	'road' => 'Calle',
        	'address' => mb_strtolower('Calle Artes Y Oficios'),
        	'name' => mb_strtolower('Multivision'),
        	'email' => mb_strtolower('olga@workcenter.es'),
        	'phone1' => '749907856',
        	'phone2' => '098453212',
        	'fax' => '34947650064',
        	'enterprise_id' => 3,
        	'citie_id' => 5480,
        	'principalCenter' => true,
        	'created_at' => date('YmdHms')

        ]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => mb_strtolower('Olga'),
        		'lastName' => mb_strtolower('Selles Roman'),
        		'dni' => strtoupper('55613110F'),
        		'created_at' => date('YmdHms')
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms')
        		]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => mb_strtolower('Mercedes'),
        		'lastName' => mb_strtolower('Bnedicto Pachon'),
        		'dni' => strtoupper('14729696J'),
        		'created_at' => date('YmdHms')
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms')
        		]);

        $workCenter_id = \DB::table('workCenters')->insertGetId([
        	'road' => 'Calle',
        	'address' => mb_strtolower('Calle Azacaya'),
        	'name' => mb_strtolower('Provision'),
        	'email' => mb_strtolower('Aurora@workcenter.es'),
        	'phone1' => '987679809',
        	'enterprise_id' => 3,
        	'citie_id' => 4536,
        	'created_at' => date('YmdHms')

        ]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => mb_strtolower('Aurora'),
        		'lastName' => mb_strtolower('Palomo Pariente'),
        		'dni' => strtoupper('23848911G'),
        		'created_at' => date('YmdHms')
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms')
        		]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => mb_strtolower('Maria Elena'),
        		'lastName' => mb_strtolower('Santos Cerda'),
        		'dni' => strtoupper('55627050D'),
        		'created_at' => date('YmdHms')
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms')
        		]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => mb_strtolower('Concepcion'),
        		'lastName' => mb_strtolower('Ovejero Cuello'),
        		'dni' => strtoupper('19591310W'),
        		'created_at' => date('YmdHms')
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms')
        		]);

        $workCenter_id = \DB::table('workCenters')->insertGetId([
        	'road' => 'Calle',
        	'address' => mb_strtolower('Calle Asensios'),
        	'name' => mb_strtolower('SinVision'),
        	'email' => mb_strtolower('Victoria@workcenter.es'),
        	'phone1' => '456391209',
        	'fax' => '34947650059',
        	'enterprise_id' => 3,
        	'citie_id' => 6134,
        	'created_at' => date('YmdHms')

        ]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => mb_strtolower('Victoria'),
        		'lastName' => mb_strtolower('Borja Albert'),
        		'dni' => strtoupper('60613245B'),
        		'created_at' => date('YmdHms')
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms')
        		]);

        /************************************************
    						WORK CENTER
    					EMPRESA FERNANDO
    	*************************************************/

    	$workCenter_id = \DB::table('workCenters')->insertGetId([
        	'road' => 'Plaza',
        	'address' => mb_strtolower('Plaza Triangular'),
        	'name' => mb_strtolower('La ferretería de Fernando'),
        	'email' => mb_strtolower('fernando@workcenter.es'),
        	'phone1' => '876409823',
        	'enterprise_id' => 4,
        	'citie_id' => 670,
        	'principalCenter' => true,
        	'created_at' => date('YmdHms')

        ]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => mb_strtolower('Paula'),
        		'lastName' => mb_strtolower('Palomino Medrano'),
        		'dni' => strtoupper('94643853A'),
        		'created_at' => date('YmdHms')
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms')
        		]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => mb_strtolower('Natalia'),
        		'lastName' => mb_strtolower('Roda de Juan'),
        		'dni' => strtoupper('41997739S'),
        		'created_at' => date('YmdHms')
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms')
        		]);

        /************************************************
    						WORK CENTER
    					EMPRESA ABEL
    	*************************************************/

    	$workCenter_id = \DB::table('workCenters')->insertGetId([
        	'road' => 'Camino',
        	'address' => mb_strtolower('Camino Corbalanes'),
        	'name' => mb_strtolower('El hotel de Abel'),
        	'email' => mb_strtolower('abel@workcenter.es'),
        	'phone1' => '123456789',
        	'enterprise_id' => 5,
        	'citie_id' => 7301,
        	'principalCenter' => true,
        	'created_at' => date('YmdHms')

        ]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => mb_strtolower('Jose'),
        		'lastName' => mb_strtolower('Mengual Vizcano'),
        		'dni' => strtoupper('68274521X'),
        		'created_at' => date('YmdHms')
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms')
        		]);

        /************************************************
    						WORK CENTER
    					EMPRESA CARLOS
    	*************************************************/

    	$workCenter_id = \DB::table('workCenters')->insertGetId([
        	'road' => 'Carril',
        	'address' => mb_strtolower('Carril de los Bernabeles'),
        	'name' => mb_strtolower('La floristería de Carlos'),
        	'email' => mb_strtolower('carlos@workcenter.es'),
        	'phone1' => '786439132',
        	'enterprise_id' => 6,
        	'citie_id' => 3529,
        	'principalCenter' => true,
        	'created_at' => date('YmdHms')

        ]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => mb_strtolower('Jose Manuel'),
        		'lastName' => mb_strtolower('Pillina Aragones'),
        		'dni' => strtoupper('69831534S'),
        		'created_at' => date('YmdHms')
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms')
        		]);

        	$enterpriseResponsable_id = \DB::table('enterpriseResponsables')->insertGetId([
        		'firstName' => mb_strtolower('Esteban'),
        		'lastName' => mb_strtolower('Picon Villarejo'),
        		'dni' => strtoupper('87575857E'),
        		'created_at' => date('YmdHms')
        	]);

        		\DB::table('enterpriseCenterResponsables')->insert([
        			'workCenter_id' => $workCenter_id,
        			'enterpriseResponsable_id' => $enterpriseResponsable_id,
        			'created_at' => date('YmdHms')
        		]);

    }
}
