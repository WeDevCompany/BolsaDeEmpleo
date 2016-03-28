<?php

use Illuminate\Database\Seeder;

class InformaticaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /***************************************************
                           PROF. FAMILY
                      Informática y Comunicaciones
       ****************************************************/
       $profFamilie_id = \DB::table('profFamilies')->insertGetId([
           'name' => 'Informática y Comunicaciones',
       ]);

           /***************************************************
                                CYCLE
            Explotación de Sistemas Informáticos (LOGSE)
                            GRADO MEDIO
            ****************************************************/

            $cycle_id = \DB::table('cycles')->insertGetId([
                'profFamilie_id' => $profFamilie_id,
                'name' => 'Explotación de Sistemas Informáticos (LOGSE)',
                'level' => 'Medio',
            ]);

            $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Instalación y mantenimiento de servicios de redes locales',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Instalación y mantenimiento de equipos y sistemas informáticos',
                ]);

                     \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Sondeos',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Instalación y mantenimiento de equipos y sistemas informáticos',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Implantación y mantenimiento de aplicaciones ofimáticas y corporativas',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Operaciones con bases de datos ofimáticas y corporativas',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Instalación y mantenimiento de servicios de Internet',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Mantenimiento de portales de información',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                   $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Administración, gestión y comercialización en la pequeña empresa',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                   $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Sistemas operativos en entornos monousuarios y multiusuarios',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Relaciones en el equipo de trabajo',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Formación y orientación laboral',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

            /***************************************************
                                CYCLE
                Sistemas Microinformáticos y Redes (LOE)
                            GRADO MEDIO
            ****************************************************/

            $cycle_id = \DB::table('cycles')->insertGetId([
                'profFamilie_id' => $profFamilie_id,
                'name' => 'Sistemas Microinformáticos y Redes (LOE)',
                'level' => 'Medio',
            ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Montaje y mantenimiento de equipo',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Sistemas operativos monopuesto',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Aplicaciones ofimáticas',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Sistemas operativos en red',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Redes locales',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Seguridad informática',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);


                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Servicios en red',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);                                      
                         

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Aplicaciones web',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Formación y orientación laboral',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);


                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Empresa e iniciativa emprendedora',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);  

            /***************************************************
                                CYCLE
                Administración de Sistemas Informáticos (LOGSE)
                            GRADO SUPERIOR
            ****************************************************/

            $cycle_id = \DB::table('cycles')->insertGetId([
                'profFamilie_id' => $profFamilie_id,
                'name' => 'Industria Alimentaria (LOGSE)',
                'level' => 'Superior',
            ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Sistemas informáticos monousuario y multiususario',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Redes de área local',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Implantación de aplicaciones informáticas de gestión',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Fundamentos de programación',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Desarrollo de funciones en el sistema informático',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Sistemas gestores de bases de datos',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Relaciones en el entorno de trabajo',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Formación y Orientación Laboral',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]); 

            /***************************************************
                                CYCLE
                Desarrollo de Aplicaciones Informáticas (LOGSE)
                            GRADO SUPERIOR
            ****************************************************/

            $cycle_id = \DB::table('cycles')->insertGetId([
                'profFamilie_id' => $profFamilie_id,
                'name' => 'Desarrollo de Aplicaciones Informáticas (LOGSE)',
                'level' => 'Superior',
            ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Sistemas informáticos multiususario y en red',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Análisis y diseño detallado de aplicaciones informáticas de gestión',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Programación en lenguajes estructurados',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Desarrollo de aplicaciones en entornos de cuarta generación y con herramientas CASE',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Diseño y realización de servicios de presentación en entornos gráficos',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Relaciones en el Entorno de Trabajo',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Formación y Orientación Laboral',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

            /***************************************************
                                     CYCLE
            Administración de Sistemas Informáticos en Red (LOE)
                                GRADO SUPERIOR
            ****************************************************/

            $cycle_id = \DB::table('cycles')->insertGetId([
                'profFamilie_id' => $profFamilie_id,
                'name' => 'Administración de Sistemas Informáticos en Red (LOE)',
                'level' => 'Superior',
            ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Implantación de sistemas operativos',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Planificación y administración de redes',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Fundamentos de hardware',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Gestión de bases de datos',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Lenguajes de marcas y sistemas de gestión de información',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Administración de sistemas operativos',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Servicios de red e Internet',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Implantación de aplicaciones web',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Administración de sistemas gestores de bases de datos',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Seguridad y alta disponibilidad',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Proyecto de administración de sistemas informáticos en red',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Empresa e iniciativa emprendedora',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]); 

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Formación y Orientación Laboral',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

            /***************************************************
                                     CYCLE
             Desarrollo de Aplicaciones Multiplataforma (LOE)
                                GRADO SUPERIOR
            ****************************************************/

            $cycle_id = \DB::table('cycles')->insertGetId([
                'profFamilie_id' => $profFamilie_id,
                'name' => 'Desarrollo de Aplicaciones Multiplataforma (LOE)',
                'level' => 'Superior',
            ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Sistemas informáticos',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Bases de Datos',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Programación',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Lenguajes de marcas y sistemas de gestión de información',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Entornos de desarrollo',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Acceso a datos',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Desarrollo de interface',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Programación multimedia y dispositivos móviles',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Programación de servicios y procesos',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Sistemas de gestión empresarial',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Proyecto de desarrollo de aplicaciones multiplataforma',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Empresa e iniciativa emprendedora',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]); 

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Formación y Orientación Laboral',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);
            /***************************************************
                                     CYCLE
                    Desarrollo de Aplicaciones Web (LOE)
                                GRADO SUPERIOR
            ****************************************************/

            $cycle_id = \DB::table('cycles')->insertGetId([
                'profFamilie_id' => $profFamilie_id,
                'name' => 'Desarrollo de Aplicaciones Web (LOE)',
                'level' => 'Superior',
            ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Sistemas informáticos',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Bases de datos',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Programación',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Gestión de bases de datos',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Lenguajes de marcas y sistemas de gestión de información.',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Entornos de desarrollo',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Desarrollo web en entorno cliente',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Desarrollo web en entorno servidor',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Despliegue de aplicaciones web',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Diseño de interfaces WEB',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Proyecto de desarrollo de aplicaciones web',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Empresa e iniciativa emprendedora',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]); 

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Formación y Orientación Laboral',
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                    ]);
    }
}
