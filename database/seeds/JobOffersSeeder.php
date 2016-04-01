<?php
/**
 * Seeder que realiza las ofertas de trabajo para un centro de trabajo
 * este seeder utiliza la librería Faker para generar algunos datos fake
 */
use Illuminate\Database\Seeder;
// Incluimos la librería faker
use Faker\Factory as Faker;

class JobOffersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Variables
        // Creamos una instancia de Faker
        $faker = Faker::create('es_ES');
        $profFamilie_id = 1;    // realizamos pruebas sobre informática
        // Creamos la fecha en la que la oferta caduca
        // --------------------------------------------
        $fecha = date('Ymd'); // fecha actual
        // Fecha dentro de 4 meses donde se deberá borrar
        // de la base de datos
        $nuevafecha = strtotime ( '+4 month' , strtotime($fecha)) ;
        // Generamos una fecha nueva con 4 meses más
        $nuevafecha = date ( 'Ymj' , $nuevafecha );


    	// Ofertas para la empresa de Eduardo
        // OFERTA 1 - Primera oferta de la empresa de Eduardo
        \DB::table('jobOffers')->insert(
            ['title' => mb_strtolower('Desarrollador Web'),
             'duration' =>  $faker->randomElement(['Indefinido','Duracion determinada','Por proyectos','Desconocida']),
             'kind' => $faker->randomElement(['Fct','Job']),
             'description' => $faker->text,
             'level' => $faker->randomElement(['Grado superior', 'Grado medio', 'Grado básico', 'Bachillerato']),
             'experience' => $faker->randomElement(['Un año', 'Dos años', 'Tres años', 'Cuadro años', 'Cinco años', 'No requerida']),
             'others' => 'base de datos NoSQL, Node.js, docker',
             'profFamilie_id' => $profFamilie_id,
             'dueDate' => $nuevafecha,
             'wanted' => 3,
             'enterpriseResponsable_id' => 1,   // Primer responsable
             'workCenter_id' => 1,              // Única empresa de edu
             'created_at' => date('YmdHms')
            ]
        );

        // OFERTA 2 - 2º Oferta de la empresa de Edu
        \DB::table('jobOffers')->insert(
            ['title' => mb_strtolower('Especialista en redes'),
             'duration' =>  $faker->randomElement(['Indefinido','Duracion determinada','Por proyectos','Desconocida']),
             'kind' => $faker->randomElement(['Fct','Job']),
             'description' => $faker->text,
             'level' => $faker->randomElement(['Grado superior', 'Grado medio', 'Grado básico', 'Bachillerato']),
             'experience' => $faker->randomElement(['Un año', 'Dos años', 'Tres años', 'Cuadro años', 'Cinco años', 'No requerida']),
             'others' => 'Redes punto a punto, fibra optica',
             'profFamilie_id' => $profFamilie_id,
             'dueDate' => $nuevafecha,
             'wanted' => 3,
             'enterpriseResponsable_id' => 2,   // Segundo responsable
             'workCenter_id' => 1,              // Única empresa de edu
             'created_at' => date('YmdHms')
            ]
        );

        // Ofertas para la empresa de Emmanuel
        // Oferta 3 - Primera oferta de la empresa 2
        \DB::table('jobOffers')->insert(
            ['title' => mb_strtolower('Desarrollador Web'),
             'duration' =>  $faker->randomElement(['Indefinido','Duracion determinada','Por proyectos','Desconocida']),
             'kind' => $faker->randomElement(['Fct','Job']),
             'description' => $faker->text,
             'level' => $faker->randomElement(['Grado superior', 'Grado medio', 'Grado básico', 'Bachillerato']),
             'experience' => $faker->randomElement(['Un año', 'Dos años', 'Tres años', 'Cuadro años', 'Cinco años', 'No requerida']),
             'others' => 'base de datos NoSQL, Node.js, docker',
             'profFamilie_id' => $profFamilie_id,
             'dueDate' => $nuevafecha,
             'wanted' => 3,
             'enterpriseResponsable_id' => 3,   // Primer responsable de la empresa
             'workCenter_id' => 2,              // Empresa 1 de emmanuel
             'created_at' => date('YmdHms')
            ]
        );

        // Oferta 4 - Primera oferta de la empresa 3
        \DB::table('jobOffers')->insert(
            ['title' => mb_strtolower('Desarrollador Web'),
             'duration' =>  $faker->randomElement(['Indefinido','Duracion determinada','Por proyectos','Desconocida']),
             'kind' => $faker->randomElement(['Fct','Job']),
             'description' => $faker->text,
             'level' => $faker->randomElement(['Grado superior', 'Grado medio', 'Grado básico', 'Bachillerato']),
             'experience' => $faker->randomElement(['Un año', 'Dos años', 'Tres años', 'Cuadro años', 'Cinco años', 'No requerida']),
             'others' => 'base de datos NoSQL, Node.js, docker',
             'profFamilie_id' => $profFamilie_id,
             'dueDate' => $nuevafecha,
             'wanted' => 3,
             'enterpriseResponsable_id' => 4,   // Segundo responsable
             'workCenter_id' => 2,              // Primera empresa de emmanuel
             'created_at' => date('YmdHms')
            ]
        );

        // Oferta 5 - Segunda oferta de la empresa 3
        \DB::table('jobOffers')->insert(
            ['title' => mb_strtolower('Especialista en redes'),
             'duration' =>  $faker->randomElement(['Indefinido','Duracion determinada','Por proyectos','Desconocida']),
             'kind' => $faker->randomElement(['Fct','Job']),
             'description' => $faker->text,
             'level' => $faker->randomElement(['Grado superior', 'Grado medio', 'Grado básico', 'Bachillerato']),
             'experience' => $faker->randomElement(['Un año', 'Dos años', 'Tres años', 'Cuadro años', 'Cinco años', 'No requerida']),
             'others' => 'Redes punto a punto, fibra optica',
             'profFamilie_id' => $profFamilie_id,
             'dueDate' => $nuevafecha,
             'wanted' => 3,
             'enterpriseResponsable_id' => 5,   // Primer responsable
             'workCenter_id' => 3,              // Segunda empresa de emmanuel
             'created_at' => date('YmdHms')
            ]
        );

        // Oferta 6 - Primera oferta de la empresa 4
        \DB::table('jobOffers')->insert(
            ['title' => mb_strtolower('Especialista en redes'),
             'duration' =>  $faker->randomElement(['Indefinido','Duracion determinada','Por proyectos','Desconocida']),
             'kind' => $faker->randomElement(['Fct','Job']),
             'description' => $faker->text,
             'level' => $faker->randomElement(['Grado superior', 'Grado medio', 'Grado básico', 'Bachillerato']),
             'experience' => $faker->randomElement(['Un año', 'Dos años', 'Tres años', 'Cuadro años', 'Cinco años', 'No requerida']),
             'others' => 'Redes punto a punto, fibra optica',
             'profFamilie_id' => $profFamilie_id,
             'dueDate' => $nuevafecha,
             'wanted' => 3,
             'enterpriseResponsable_id' => 6,   // Primer responsable
             'workCenter_id' => 4,              // Primera empresa de pedro
             'created_at' => date('YmdHms')
            ]
        );

        // Oferta 7 - Segunda oferta de la empresa 4
        \DB::table('jobOffers')->insert(
            ['title' => mb_strtolower('Especialista en redes'),
             'duration' =>  $faker->randomElement(['Indefinido','Duracion determinada','Por proyectos','Desconocida']),
             'kind' => $faker->randomElement(['Fct','Job']),
             'description' => $faker->text,
             'level' => $faker->randomElement(['Grado superior', 'Grado medio', 'Grado básico', 'Bachillerato']),
             'experience' => $faker->randomElement(['Un año', 'Dos años', 'Tres años', 'Cuadro años', 'Cinco años', 'No requerida']),
             'others' => 'Redes punto a punto, fibra optica',
             'profFamilie_id' => $profFamilie_id,
             'dueDate' => $nuevafecha,
             'wanted' => 3,
             'enterpriseResponsable_id' => 7,   // Primer responsable
             'workCenter_id' => 4,              // Primera empresa de pedro
             'created_at' => date('YmdHms')
            ]
        );

        // Oferta 8 - Tercera oferta de la empresa 4
        \DB::table('jobOffers')->insert(
            ['title' => mb_strtolower('Desarrollador Web'),
             'duration' =>  $faker->randomElement(['Indefinido','Duracion determinada','Por proyectos','Desconocida']),
             'kind' => $faker->randomElement(['Fct','Job']),
             'description' => $faker->text,
             'level' => $faker->randomElement(['Grado superior', 'Grado medio', 'Grado básico', 'Bachillerato']),
             'experience' => $faker->randomElement(['Un año', 'Dos años', 'Tres años', 'Cuadro años', 'Cinco años', 'No requerida']),
             'others' => 'base de datos NoSQL, Node.js, docker',
             'profFamilie_id' => $profFamilie_id,
             'dueDate' => $nuevafecha,
             'wanted' => 3,
             'enterpriseResponsable_id' => 8,
             'workCenter_id' => 5,
             'created_at' => date('YmdHms')
            ]
        );

        // Oferta 9
        \DB::table('jobOffers')->insert(
            ['title' => mb_strtolower('Desarrollador Web'),
             'duration' =>  $faker->randomElement(['Indefinido','Duracion determinada','Por proyectos','Desconocida']),
             'kind' => $faker->randomElement(['Fct','Job']),
             'description' => $faker->text,
             'level' => $faker->randomElement(['Grado superior', 'Grado medio', 'Grado básico', 'Bachillerato']),
             'experience' => $faker->randomElement(['Un año', 'Dos años', 'Tres años', 'Cuadro años', 'Cinco años', 'No requerida']),
             'others' => 'base de datos NoSQL, Node.js, docker',
             'profFamilie_id' => $profFamilie_id,
             'dueDate' => $nuevafecha,
             'wanted' => 3,
             'enterpriseResponsable_id' => 9,
             'workCenter_id' => 5,
             'created_at' => date('YmdHms')
            ]
        );

        // Oferta 10
        \DB::table('jobOffers')->insert(
            ['title' => mb_strtolower('Desarrollador Web'),
             'duration' =>  $faker->randomElement(['Indefinido','Duracion determinada','Por proyectos','Desconocida']),
             'kind' => $faker->randomElement(['Fct','Job']),
             'description' => $faker->text,
             'level' => $faker->randomElement(['Grado superior', 'Grado medio', 'Grado básico', 'Bachillerato']),
             'experience' => $faker->randomElement(['Un año', 'Dos años', 'Tres años', 'Cuadro años', 'Cinco años', 'No requerida']),
             'others' => 'base de datos NoSQL, Node.js, docker',
             'profFamilie_id' => $profFamilie_id,
             'dueDate' => $nuevafecha,
             'wanted' => 3,
             'enterpriseResponsable_id' => 10,
             'workCenter_id' => 5,
             'created_at' => date('YmdHms')
            ]
        );

        // Oferta 11
        \DB::table('jobOffers')->insert(
            ['title' => mb_strtolower('Desarrollador Web'),
             'duration' =>  $faker->randomElement(['Indefinido','Duracion determinada','Por proyectos','Desconocida']),
             'kind' => $faker->randomElement(['Fct','Job']),
             'description' => $faker->text,
             'level' => $faker->randomElement(['Grado superior', 'Grado medio', 'Grado básico', 'Bachillerato']),
             'experience' => $faker->randomElement(['Un año', 'Dos años', 'Tres años', 'Cuadro años', 'Cinco años', 'No requerida']),
             'others' => 'base de datos NoSQL, Node.js, docker',
             'profFamilie_id' => $profFamilie_id,
             'dueDate' => $nuevafecha,
             'wanted' => 3,
             'enterpriseResponsable_id' => 11,
             'workCenter_id' => 6,
             'created_at' => date('YmdHms')
            ]
        );

        // Oferta 12
        \DB::table('jobOffers')->insert(
            ['title' => mb_strtolower('Desarrollador Web'),
             'duration' =>  $faker->randomElement(['Indefinido','Duracion determinada','Por proyectos','Desconocida']),
             'kind' => $faker->randomElement(['Fct','Job']),
             'description' => $faker->text,
             'level' => $faker->randomElement(['Grado superior', 'Grado medio', 'Grado básico', 'Bachillerato']),
             'experience' => $faker->randomElement(['Un año', 'Dos años', 'Tres años', 'Cuadro años', 'Cinco años', 'No requerida']),
             'others' => 'base de datos NoSQL, Node.js, docker',
             'profFamilie_id' => $profFamilie_id,
             'dueDate' => $nuevafecha,
             'wanted' => 3,
             'enterpriseResponsable_id' => 12,
             'workCenter_id' => 7,
             'created_at' => date('YmdHms')
            ]
        );

        // Oferta 13
        \DB::table('jobOffers')->insert(
            ['title' => mb_strtolower('Desarrollador Web'),
             'duration' =>  $faker->randomElement(['Indefinido','Duracion determinada','Por proyectos','Desconocida']),
             'kind' => $faker->randomElement(['Fct','Job']),
             'description' => $faker->text,
             'level' => $faker->randomElement(['Grado superior', 'Grado medio', 'Grado básico', 'Bachillerato']),
             'experience' => $faker->randomElement(['Un año', 'Dos años', 'Tres años', 'Cuadro años', 'Cinco años', 'No requerida']),
             'others' => 'base de datos NoSQL, Node.js, docker',
             'profFamilie_id' => $profFamilie_id,
             'dueDate' => $nuevafecha,
             'wanted' => 3,
             'enterpriseResponsable_id' => 13,
             'workCenter_id' => 7,
             'created_at' => date('YmdHms')
            ]
        );

        // Oferta 14
        \DB::table('jobOffers')->insert(
            ['title' => mb_strtolower('Desarrollador Web'),
             'duration' =>  $faker->randomElement(['Indefinido','Duracion determinada','Por proyectos','Desconocida']),
             'kind' => $faker->randomElement(['Fct','Job']),
             'description' => $faker->text,
             'level' => $faker->randomElement(['Grado superior', 'Grado medio', 'Grado básico', 'Bachillerato']),
             'experience' => $faker->randomElement(['Un año', 'Dos años', 'Tres años', 'Cuadro años', 'Cinco años', 'No requerida']),
             'others' => 'base de datos NoSQL, Node.js, docker',
             'profFamilie_id' => $profFamilie_id,
             'dueDate' => $nuevafecha,
             'wanted' => 3,
             'enterpriseResponsable_id' => 14,
             'workCenter_id' => 8,
             'created_at' => date('YmdHms')
            ]
        );

        // Oferta 15
        \DB::table('jobOffers')->insert(
            ['title' => mb_strtolower('Desarrollador Web'),
             'duration' =>  $faker->randomElement(['Indefinido','Duracion determinada','Por proyectos','Desconocida']),
             'kind' => $faker->randomElement(['Fct','Job']),
             'description' => $faker->text,
             'level' => $faker->randomElement(['Grado superior', 'Grado medio', 'Grado básico', 'Bachillerato']),
             'experience' => $faker->randomElement(['Un año', 'Dos años', 'Tres años', 'Cuadro años', 'Cinco años', 'No requerida']),
             'others' => 'base de datos NoSQL, Node.js, docker',
             'profFamilie_id' => $profFamilie_id,
             'dueDate' => $nuevafecha,
             'wanted' => 3,
             'enterpriseResponsable_id' => 15,
             'workCenter_id' => 9,
             'created_at' => date('YmdHms')
            ]
        );

    }
}
