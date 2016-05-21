<?php
/**
 * Este archivo contiene todas las rutas que utilizaremos
 * en la aplicación de forma que modificando esto archivos se modifiquen
 * tanto las vistas como las rutas
 */


/**
 * Este archivo no se puede utilizar con la funión Route::resource
 */
return [

	'registro' =>
		 [
            'registroEstudiante' 	=> '/registro/estudiante',
		    'registroProfesor' 	    => '/registro/profesor',
		    'registroEmpresa' 		=> '/registro/empresa',
		 ],

    'terminos' => '/terminos/',

    'admin'    =>
        [
            'adminIndex'     		=> '/admin',
			'studentNotification' 	=> '/admin/notificaciones/estudiantes',
            'teacherNotification'   => '/admin/notificaciones/profesores',
            'offerNotification'     => '/admin/notificaciones/ofertas',
			'enterpriseNotification'=> '/admin/notificaciones/empresas',
			'allVerifiedTeachers' 	=> '/admin/profesor/verificados',
			'allDeniedTeachers' 	=> '/admin/profesor/denegados',
            'allVerifiedStudents'   => '/admin/estudiantes/verificados',
            'allDeniedStudents'     => '/admin/estudiantes/denegados',
            'allVerifiedOffers'     => '/admin/ofertas/verificadas',
            'allDeniedOffers'       => '/admin/ofertas/denegadas',
			'statistics'			=> '/admin/estadisticas',
        ],
    'student'    =>
        [
            'studentIndex'       	=> '/estudiante',
			'allOffersSusribed' 	=> '/estudiante/ofertas/suscripciones',
			'allOffers' 			=> '/estudiante/ofertas',
        ],
    'teacher'    =>
        [
            'teacherIndex'     		=> '/profesor',
			'studentNotification' 	=> '/profesor/notificaciones/estudiantes',
			'offertNotification' 	=> '/profesor/notificaciones/ofertas',
			'allVerifiedStudents' 	=> '/profesor/estudiante/verificados',
			'allDeniedStudents' 	=> '/profesor/estudiante/denegados',
			'allVerifiedOffers' 	=> '/profesor/ofertas/verificadas',
			'allDeniedOffers' 		=> '/profesor/ofertas/denegadas',
        ],
    'enterprise'    =>
        [
            'enterpriseIndex'     => '/empresa',
            'enterprisePerfil'    => '/empresa/perfil',
            'enterpriseUploadImg' => '/empresa/uploadImage',
        ],
    'files'    =>
        [
            'images'        => '/img/imgUser',
            'curriculum'    => storage_path( 'app/curriculum'),
        ],
    'index'         => '/',
    'perfil'        => '/perfil',
    'UploadImg'     => '/UploadImg',
	'uso'		    => '/uso',
    'authLogin'     => '/authLogin',
    'confirmation'  => '/confirmation/{token}',
    'confirmacion'  => '/confirmacion',
    'confirmado'    => '/confirmado',
	'pruebas'		=> '/pruebas',
	'authors'		=> '/autores',

];
?>
