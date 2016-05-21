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
            'allVerifiedStudents'   => '/admin/estudiante/verificados',
            'allDeniedStudents'     => '/admin/estudiante/denegados',
            'allVerifiedOffers'     => '/admin/oferta/verificadas',
            'allDeniedOffers'       => '/admin/oferta/denegadas',
			'statistics'			=> '/admin/estadisticas',
        ],
    'adminRoutes' =>
        [
            'studentNotification'   => '/notificaciones/estudiantes',
            'teacherNotification'   => '/notificaciones/profesores',
            'offerNotification'     => '/notificaciones/ofertas',
            'enterpriseNotification'=> '/notificaciones/empresas',
            'allVerifiedTeachers'   => '/profesor/verificados',
            'allDeniedTeachers'     => '/profesor/denegados',
            'allVerifiedStudents'   => '/estudiante/verificados',
            'allDeniedStudents'     => '/estudiante/denegados',
            'allVerifiedOffers'     => '/oferta/verificadas',
            'allDeniedOffers'       => '/oferta/denegadas',
            'statistics'            => '/estadisticas',
        ],
    'student'    =>
        [
            'studentIndex'       	=> '/estudiante',
			'allOffersSusribed' 	=> '/estudiante/ofertas/suscripciones',
			'allOffers' 			=> '/estudiante/ofertas',
        ],
    'studentRoutes' =>
        [
            'allOffersSusribed'     => '/ofertas/suscripciones',
            'allOffers'             => '/ofertas',
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
    'teacherRoutes'    =>
        [
            'studentNotification'   => '/notificaciones/estudiantes',
            'offertNotification'    => '/notificaciones/ofertas',
            'allVerifiedStudents'   => '/estudiante/verificados',
            'allDeniedStudents'     => '/estudiante/denegados',
            'allVerifiedOffers'     => '/ofertas/verificadas',
            'allDeniedOffers'       => '/ofertas/denegadas',
        ],
    'enterprise'    =>
        [
            'enterpriseIndex'     => '/empresa',
            'enterprisePerfil'    => '/empresa/perfil',
            'enterpriseUploadImg' => '/empresa/uploadImage',
        ],
    'enterpriseRoutes'    =>
        [
            'enterprisePerfil'    => '/perfil',
            'enterpriseUploadImg' => '/uploadImage',
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
