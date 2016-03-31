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
            'active' => true,
            'created_at' => date('YmdHms')
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
                'active' => true,
                'created_at' => date('YmdHms')
            ]);

            $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Instalación y mantenimiento de servicios de redes locales',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Instalación y mantenimiento de equipos y sistemas informáticos',
                    'created_at' => date('YmdHms')
                ]);

                     \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Implantación y mantenimiento de aplicaciones ofimáticas y corporativas',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Operaciones con bases de datos ofimáticas y corporativas',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Instalación y mantenimiento de servicios de Internet',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Mantenimiento de portales de información',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                   $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Administración, gestión y comercialización en la pequeña empresa',
                    'created_at' => date('YmdHms')
                    ]);


                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                   $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Sistemas operativos en entornos monousuarios y multiusuarios',
                    'created_at' => date('YmdHms')
                    ]);


                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Relaciones en el equipo de trabajo',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Formación y orientación laboral',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
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
                'active' => true,
                'created_at' => date('YmdHms')
            ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Montaje y mantenimiento de equipo',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Sistemas operativos monopuesto',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Aplicaciones ofimáticas',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Sistemas operativos en red',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Redes locales',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Seguridad informática',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);


                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Servicios en red',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);                                      
                         

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Aplicaciones web',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Formación y orientación laboral',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);


                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Empresa e iniciativa emprendedora',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);  

            /***************************************************
                                CYCLE
                Administración de Sistemas Informáticos (LOGSE)
                            GRADO SUPERIOR
            ****************************************************/

            $cycle_id = \DB::table('cycles')->insertGetId([
                'profFamilie_id' => $profFamilie_id,
                'name' => 'Administración de Sistemas Informáticos (LOGSE)',
                'level' => 'Superior',
                'active' => true,
                'created_at' => date('YmdHms')
            ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Sistemas informáticos monousuario y multiususario',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Redes de área local',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Implantación de aplicaciones informáticas de gestión',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Fundamentos de programación',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Desarrollo de funciones en el sistema informático',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Sistemas gestores de bases de datos',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Relaciones en el entorno de trabajo',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Formación y Orientación Laboral',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
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
                'active' => true,
                'created_at' => date('YmdHms')
            ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Sistemas informáticos multiususario y en red',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Análisis y diseño detallado de aplicaciones informáticas de gestión',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Programación en lenguajes estructurados',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Desarrollo de aplicaciones en entornos de cuarta generación y con herramientas CASE',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Diseño y realización de servicios de presentación en entornos gráficos',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Relaciones en el Entorno de Trabajo',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Formación y Orientación Laboral',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
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
                'active' => true,
                'created_at' => date('YmdHms')
            ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Implantación de sistemas operativos',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Planificación y administración de redes',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Fundamentos de hardware',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Gestión de bases de datos',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Lenguajes de marcas y sistemas de gestión de información',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Administración de sistemas operativos',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Servicios de red e Internet',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Implantación de aplicaciones web',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Administración de sistemas gestores de bases de datos',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Seguridad y alta disponibilidad',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Proyecto de administración de sistemas informáticos en red',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Empresa e iniciativa emprendedora',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]); 

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Formación y Orientación Laboral',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
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
                'active' => true,
                'created_at' => date('YmdHms')
            ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Sistemas informáticos',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Bases de Datos',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Programación',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Lenguajes de marcas y sistemas de gestión de información',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Entornos de desarrollo',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Acceso a datos',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Desarrollo de interfaces',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Programación multimedia y dispositivos móviles',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Programación de servicios y procesos',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Sistemas de gestión empresarial',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Proyecto de desarrollo de aplicaciones multiplataforma',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Empresa e iniciativa emprendedora',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]); 

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Formación y Orientación Laboral',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
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
                'active' => true,
                'created_at' => date('YmdHms')
            ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Sistemas informáticos',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Bases de datos',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Programación',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Lenguajes de marcas y sistemas de gestión de información',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Entornos de desarrollo',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Desarrollo web en entorno cliente',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Desarrollo web en entorno servidor',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Despliegue de aplicaciones web',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Diseño de interfaces WEB',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Proyecto de desarrollo de aplicaciones web',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Empresa e iniciativa emprendedora',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]); 

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Formación y Orientación Laboral',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

            /***************************************************
                                CYCLE
                        Informática de Oficina
                            GRADO BÁSICO
            ****************************************************/

            $cycle_id = \DB::table('cycles')->insertGetId([
                'profFamilie_id' => $profFamilie_id,
                'name' => 'Informática de Oficina',
                'level' => 'Básico',
                'active' => true,
                'created_at' => date('YmdHms')
            ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Montaje y mantenimiento de sistemas y componentes informáticos',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Operaciones auxiliares para la configuración y la explotación',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Ofimática y archivo de documentos',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Instalación y mantenimiento de redes para transmisión de datos',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Ciencias aplicadas I',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Ciencias aplicadas II',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Comunicación y sociedad I',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Comunicación y sociedad II',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

            /***************************************************
                                CYCLE
                    Informática y Comunicaciones
                            GRADO BÁSICO
            ****************************************************/

            $cycle_id = \DB::table('cycles')->insertGetId([
                'profFamilie_id' => $profFamilie_id,
                'name' => 'Informática y Comunicaciones',
                'level' => 'Básico',
                'active' => true,
                'created_at' => date('YmdHms')
            ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Montaje y mantenimiento de sistemas y componentes informáticos',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Operaciones auxiliares para la configuración y la explotación',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Equipos eléctricos y electrónicos',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Instalación y mantenimiento de redes para transmisión de datos',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Ciencias aplicadas I',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Ciencias aplicadas II',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Comunicación y sociedad I',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);

                $subject_id = \DB::table('subjects')->insertGetId([
                    'name' => 'Comunicación y sociedad II',
                    'created_at' => date('YmdHms')
                ]);

                    \DB::table('cycleSubjects')->insert([
                        'subject_id' => $subject_id,
                        'cycle_id' => $cycle_id,
                        'created_at' => date('YmdHms')
                    ]);
    }
}
