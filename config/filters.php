<?php

// Este archivo contiene todos los tipos de vía (campo enumerado en la base de datos)
    return [
        'verifiedTeacherStudent' => [
            'name'     	  =>  'Nombre',
            'dni'         =>  'DNI',
            'email'       =>  'Email',
            'profFamily'  =>  'Familia Profesional',
        ],
        'verifiedStudent' => [
            'name'     	  =>  'Nombre',
            'dni'         =>  'DNI',
            'email'       =>  'Email',
            'profFamily'  =>  'Familia Profesional',
            'subscription'=> ''
        ],
        'verifiedOffers' => [
            'offer'       =>  'Nombre oferta',
            'enterprise'  =>  'Nombre empresa',
            'lugar'       =>  'Lugar',
            'description' =>  'Descripción',
            'duration'    =>  'Duración',
            'kind'        =>  'Tipo',
            'experience'  =>  'Experiencia',
            'level'       =>  'Nivel',
        ],
        'responsable' => [
            'name'       => 'Nombre',
            'workCenter' => 'Centro de trabajo',
            'dni'        => 'DNI',

        ],
        'verifiedEnterprise' => [
            'enterprise' => 'Nombre',
            'workCenter' => 'Centro de trabajo',
            'cif' => 'CIF',
        ],
    ];

?>