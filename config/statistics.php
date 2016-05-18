<?php

// Este archivo contiene todos los tipos de vía (campo enumerado en la base de datos)
    return [
        'workCenter' =>
            [
                'workCenterMurcia'           => 'Empresas que tienen un centro de trabajo en Murcia',
                'principalCenter'            => 'Obtener los centros principales de las empresas',
            ],
        'offers' =>
            [
                'principalCenterOffers'      => 'cuantas ofertas de trabajo tiene cada empresa en su centro principal',
                'numSuscriptionsInAOffer+'   => 'Obtener el número de suscriptores de una oferta con la información del centro de trabajo que lanza la oferta y a que empresa pertenece y el nombrebre del responsable de la oferta ',
            ],
        'taggs' =>
            [
                'tagsMoreUsed' => 'El nombre de los tags ordenados por numero de repeticiones en sus ofertas de trabajo',
                'tagsLessUsed' => 'El nombre e identificador de los tags que no han sido usados en ninguna oferta.',

            ],
        'cycles' =>
            [
                'noTutorThisYear'     => 'Ciclos activos que no tengan tutores este año',
                'noStudentsThisYear'  => 'Ciclos sin alumnos matriculados ese año', /* Mejor el año actual */
                'subjectWithoutTags' => 'Asignaturas de un ciclo sin tags', /* Asignaturas sin tags sería mejor descripción */

            ],
        'support' =>
            [
                'enterpriseWithWorkCenter'    => 'Empresas que tinen centro de trabajo',
            ],
    ];

?>
