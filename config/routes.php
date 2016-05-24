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
            'adminIndex'     		    => '/admin',
			'studentNotification' 	    => '/admin/notificaciones/estudiantes',
            'teacherNotification'       => '/admin/notificaciones/profesores',
            'offerNotification'         => '/admin/notificaciones/ofertas',
			'enterpriseNotification'    => '/admin/notificaciones/empresas',
			'allVerifiedTeachers' 	    => '/admin/profesor/verificados',
			'allDeniedTeachers' 	    => '/admin/profesor/denegados',
            'allVerifiedStudents'       => '/admin/estudiante/verificados',
            'allDeniedStudents'         => '/admin/estudiante/denegados',
            'allVerifiedOffers'         => '/admin/oferta/verificadas',
            'allDeniedOffers'           => '/admin/oferta/denegadas',
			'statistics'			    => '/admin/estadisticas',
        ],
    'adminRoutes' =>
        [
            'studentNotification'       => '/notificaciones/estudiantes',
            'teacherNotification'       => '/notificaciones/profesores',
            'offerNotification'         => '/notificaciones/ofertas',
            'enterpriseNotification'    => '/notificaciones/empresas',
            'teacherValidNotification'  => 'notificaciones/validTeacherNotification',
            'studentValidNotification'  => '/notificaciones/validStudentNotification',
            'offerValidNotification'    => '/notificaciones/validOfferNotification',
            'teacherSearchNotification' => 'notificaciones/profesores-buscador',
            'studentSearchNotification' => '/notificaciones/estudiantes-buscador',
            'offerSearchNotification'   => '/notificaciones/ofertas-buscador',
            'allVerifiedTeachers'       => '/profesor/verificados',
            'allVerifiedTeachersSearch' => '/profesor/verificados-buscador',
            'allDeniedTeachers'         => '/profesor/denegados',
            'allVerifiedStudents'       => '/estudiante/verificados',
            'allVerifiedStudentsSearch' => '/estudiante/verificados-buscador',
            'allDeniedStudents'         => '/estudiante/denegados',
            'allVerifiedOffers'         => '/oferta/verificadas',
            'allVerifiedOffersSearch'   => '/oferta/verificadas-buscador',
            'allDeniedOffers'           => '/oferta/denegadas',
            'statistics'                => '/estadisticas',
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
			'allVerifiedOffers' 	=> '/profesor/oferta/verificadas',
			'allDeniedOffers' 		=> '/profesor/oferta/denegadas',
        ],
    'teacherRoutes'    =>
        [
            'studentNotification'       => '/notificaciones/estudiantes',
            'offerNotification'        => '/notificaciones/ofertas',
            'studentValidNotification'  => '/notificaciones/validStudentNotification',
            'offerValidNotification'    => '/notificaciones/validOfferNotification',
            'studentSearchNotification' => '/notificaciones/estudiantes-buscador',
            'offerSearchNotification'   => '/notificaciones/ofertas-buscador',
            'allVerifiedStudents'       => '/estudiante/verificados',
            'allVerifiedStudentsSearch' => '/estudiante/verificados-buscador',
            'allDeniedStudents'         => '/estudiante/denegados',
            'allDeniedStudentsSearch'   => '/estudiante/denegados-buscador',
            'restoreDeniedStudents'     => '/estudiante/restaurar',
            'allVerifiedOffers'         => '/oferta/verificadas',
            'allVerifiedOffersSearch'   => '/oferta/verificadas-buscador',
            'allDeniedOffers'           => '/oferta/denegadas',
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
