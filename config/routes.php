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

    'registroRoutes' =>
        [
            'registroEstudiante'    => '/estudiante',
            'registroProfesor'      => '/profesor',
            'registroEmpresa'       => '/empresa',
            'registerTeacher'       => '/registroProfesor',
            'registerEnterprise'    => '/registroEmpresa',
            'registerStudent'       => '/registroEstudiante',
        ],

    'terminos' => '/terminos/',

    'admin'    =>
        [
            'adminIndex'     		    => '/administrador',
			'studentNotification' 	    => '/administrador/notificaciones/estudiantes',
            'teacherNotification'       => '/administrador/notificaciones/profesores',
            'offerNotification'         => '/administrador/notificaciones/ofertas',
			'enterpriseNotification'    => '/administrador/notificaciones/empresas',
			'allVerifiedTeachers' 	    => '/administrador/profesor/verificados',
			'allDeniedTeachers' 	    => '/administrador/profesor/denegados',
            'allVerifiedStudents'       => '/administrador/estudiante/verificados',
            'allDeniedStudents'         => '/administrador/estudiante/denegados',
            'allVerifiedOffers'         => '/administrador/oferta/verificadas',
            'allDeniedOffers'           => '/administrador/oferta/denegadas',
			'statistics'			    => '/administrador/estadisticas',
        ],
    'adminRoutes' =>
        [
            'studentNotification'       => '/notificaciones/estudiantes',
            'teacherNotification'       => '/notificaciones/profesores',
            'offerNotification'         => '/notificaciones/ofertas',
            'enterpriseNotification'    => '/notificaciones/empresas',
            'teacherValidNotification'  => '/notificaciones/validTeacherNotification',
            'studentValidNotification'  => '/notificaciones/validStudentNotification',
            'offerValidNotification'    => '/notificaciones/validOfferNotification',
            'teacherSearchNotification' => '/notificaciones/profesores-buscador',
            'studentSearchNotification' => '/notificaciones/estudiantes-buscador',
            'offerSearchNotification'   => '/notificaciones/ofertas-buscador',
            'destroyTeacherNotification'=> '/notificaciones/eliminar-notificacion-profesor/{id}',
            'allVerifiedTeachers'       => '/profesor/verificados',
            'allVerifiedTeachersSearch' => '/profesor/verificados-buscador',
            'allDeniedTeachers'         => '/profesor/denegados',
            'restoreDeniedTeachers'     => '/profesor/restaurar',
            'allDeniedTeachersSearch'   => '/profesor/denegados-buscador',
            'allVerifiedStudents'       => '/estudiante/verificados',
            'allVerifiedStudentsSearch' => '/estudiante/verificados-buscador',
            'allDeniedStudents'         => '/estudiante/denegados',
            'restoreDeniedStudents'     => '/estudiante/restaurar',
            'allDeniedStudentsSearch'   => '/estudiante/denegados-buscador',
            'allVerifiedOffers'         => '/oferta/verificadas',
            'allVerifiedOffersSearch'   => '/oferta/verificadas-buscador',
            'allDeniedOffers'           => '/oferta/denegadas',
            'restoreDeniedOffers'       => '/oferta/restaurar',
            'allDeniedOffersSearch'     => '/oferta/denegadas-buscador',
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
            'register'              => 'registro',
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
            'offerNotification'         => '/notificaciones/ofertas',
            'studentValidNotification'  => '/notificaciones/validStudentNotification',
            'offerValidNotification'    => '/notificaciones/validOfferNotification',
            'studentSearchNotification' => '/notificaciones/estudiantes-buscador',
            'offerSearchNotification'   => '/notificaciones/ofertas-buscador',
            'destroyStudentNotification'=> '/notificaciones/eliminar-notificacion-estudiante/{id}',
            'destroyOfferNotification'  => '/notificaciones/eliminar-notificacion-oferta/{id}',
            'allVerifiedStudents'       => '/estudiante/verificados',
            'allVerifiedStudentsSearch' => '/estudiante/verificados-buscador',
            'allDeniedStudents'         => '/estudiante/denegados',
            'allDeniedStudentsSearch'   => '/estudiante/denegados-buscador',
            'restoreDeniedStudents'     => '/estudiante/restaurar',
            'allDeniedOffers'           => '/oferta/denegadas',
            'allDeniedOffersSearch'     => '/oferta/denegadas-buscador',
            'restoreDeniedOffers'       => '/oferta/restaurar',
            'allVerifiedOffers'         => '/oferta/verificadas',
            'allVerifiedOffersSearch'   => '/oferta/verificadas-buscador',
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
