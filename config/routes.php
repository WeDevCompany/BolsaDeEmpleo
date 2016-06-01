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
			'studentNotification'       => 'administrador/notificaciones/estudiantes',
            'teacherNotification'       => 'administrador/notificaciones/profesores',
            'offerNotification'         => 'administrador/notificaciones/ofertas',
            'enterpriseNotification'    => 'administrador/notificaciones/empresas',
            'teacherValidNotification'  => 'administrador/notificaciones/validTeacherNotification',
            'studentValidNotification'  => 'administrador/notificaciones/validStudentNotification',
            'offerValidNotification'    => 'administrador/notificaciones/validOfferNotification',
            'teacherSearchNotification' => 'administrador/notificaciones/profesores-buscador',
            'studentSearchNotification' => 'administrador/notificaciones/estudiantes-buscador',
            'offerSearchNotification'   => 'administrador/notificaciones/ofertas-buscador',
            'destroyTeacherNotification'=> 'administrador/notificaciones/eliminar-notificacion-profesor',
            'allVerifiedTeachers'       => 'administrador/profesor/verificados',
            'allVerifiedTeachersSearch' => 'administrador/profesor/verificados-buscador',
            'allDeniedTeachers'         => 'administrador/profesor/denegados',
            'restoreDeniedTeachers'     => 'administrador/profesor/restaurar',
            'allDeniedTeachersSearch'   => 'administrador/profesor/denegados-buscador',
            'allVerifiedStudents'       => 'administrador/estudiante/verificados',
            'allVerifiedStudentsSearch' => 'administrador/estudiante/verificados-buscador',
            'allDeniedStudents'         => 'administrador/estudiante/denegados',
            'restoreDeniedStudents'     => 'administrador/estudiante/restaurar',
            'allDeniedStudentsSearch'   => 'administrador/estudiante/denegados-buscador',
            'allVerifiedOffers'         => 'administrador/oferta/verificadas',
            'allVerifiedOffersSearch'   => 'administrador/oferta/verificadas-buscador',
            'allDeniedOffers'           => 'administrador/oferta/denegadas',
            'restoreDeniedOffers'       => 'administrador/oferta/restaurar',
            'allDeniedOffersSearch'     => 'administrador/oferta/denegadas-buscador',
            'statistics'                => 'administrador/estadisticas',
            'viewOffer'                 => '/administrador/oferta/{idOffer}',
            'updateOffer'               => '/administrador/oferta/actualizar/{idOffer}',
            'comment'                   => '/administrador/oferta/comentario/{idOffer}',
            'destroyStudentNotification'=> 'administrador/notificaciones/eliminar-notificacion-estudiante',
            'destroyOfferNotification'  => 'administrador/notificaciones/eliminar-notificacion-oferta',
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
            'viewOffer'                 => '/oferta/{idOffer}',
            'updateOffer'               => '/oferta/actualizar/{idOffer}',
            'comment'                   => '/oferta/comentario/{idOffer}',
            'destroyStudentNotification'=> '/notificaciones/eliminar-notificacion-estudiante/{id}',
            'destroyOfferNotification'  => '/notificaciones/eliminar-notificacion-oferta/{id}',
        ],
    'student'    =>
        [
            'studentIndex'       	=> '/estudiante',
			'allOffersSusribed' 	=> '/estudiante/oferta/suscripciones',
			'allOffers' 			=> '/estudiante/ofertas',
            'subcriptionOffer'      => '/estudiante/oferta/suscripcion/{idOffer}',
            'viewOffer'             => '/estudiante/oferta/{idOffer}',
        ],
    'studentRoutes' =>
        [
            'allOffersSusribed'     => '/ofertas/suscripciones',
            'allOffers'             => '/ofertas',
            'register'              => 'registro',
            'subcriptionOffer'      => '/oferta/suscripcion/{idOffer}',
            'viewOffer'             => '/oferta/{idOffer}',
        ],
    'teacher'    =>
        [
            'teacherIndex'     		    => '/profesor',
			'studentNotification' 	    => '/profesor/notificaciones/estudiantes',
			'offertNotification' 	    => '/profesor/notificaciones/ofertas',
			'allVerifiedStudents' 	    => '/profesor/estudiante/verificados',
			'allDeniedStudents' 	    => '/profesor/estudiante/denegados',
			'allVerifiedOffers' 	    => '/profesor/oferta/verificadas',
			'allDeniedOffers' 		    => '/profesor/oferta/denegadas',
            'viewOffer'                 => '/profesor/oferta/{idOffer}',
            'updateOffer'               => '/profesor/oferta/actualizar/{idOffer}',
            'comment'                   => '/profesor/oferta/comentario/{idOffer}',
            'destroyStudentNotification'=> '/notificaciones/eliminar-notificacion-estudiante',
            'destroyOfferNotification'  => '/notificaciones/eliminar-notificacion-oferta',
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
            'viewOffer'                 => '/oferta/{idOffer}',
            'updateOffer'               => '/oferta/actualizar/{idOffer}',
            'comment'                   => '/oferta/comentario/{idOffer}',
        ],
    'enterprise'    =>
        [
            'enterpriseIndex'     => '/empresa',
            'enterprisePerfil'    => '/empresa/perfil',
            'enterpriseUploadImg' => '/empresa/uploadImage',
            'viewOffer'           => '/empresa/oferta/{idOffer}',
            'updateOffer'         => '/empresa/oferta/actualizar/{idOffer}',

        ],
    'enterpriseRoutes'    =>
        [
            'enterprisePerfil'      => '/perfil',
            'enterpriseUploadImg'   => '/uploadImage',
            'viewOffer'             => '/oferta/{idOffer}',
            'updateOffer'           => '/oferta/actualizar/{idOffer}',
        ],
    'offer' =>
        [
            'viewOffer'     => '/',
        ],
    'files'    =>
        [
            'images'        => '/img/imgUser',
            'curriculum'    => storage_path( 'app/curriculum'),
        ],
    'index'             => '/',
    'perfil'            => '/perfil',
    'curriculum'        => '/curriculum',
    'UploadImg'         => '/UploadImg',
    'UploadCurriculum'  => '/UploadCurriculum',
	'uso'		        => '/uso',
    'authLogin'         => '/authLogin',
    'confirmation'      => '/confirmation/{token}',
    'confirmacion'      => '/confirmacion',
    'confirmado'        => '/confirmado',
	'pruebas'		    => '/pruebas',
	'authors'		    => '/autores',

];
?>
