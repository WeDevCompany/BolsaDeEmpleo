<?php

return [

	'registro' =>
		 [
            'registroEstudiante' 	=> '/registro/estudiante',
		    'registroProfesor' 	    => '/registro/profesor',
		    'registroEmpresa' 		=> '/registro/empresa',
		 ],
    'terminos' =>
        [
            'terminos' 	  => '/terminos',
        ],
    'admin'    =>
        [
            'adminIndex'    => '/admin',
        ],
    'student'    =>
        [
            'studentIndex'    => '/estudiante'
        ],
    'teacher'    =>
        [
            'teacherIndex'    => '/profesor'
        ],
    'enterprise'    =>
        [
            'enterpriseIndex'    => '/empresa'
        ],
    'files'    =>
        [
            'images'    => '/img/imgUser',
            'curriculum'    => storage_path( 'app'),
        ]
];
?>
