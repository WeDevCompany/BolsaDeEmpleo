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
			'studentNotification' 	=> '/admin/estudiantes/notificaciones',
			'teacherNotification' 	=> '/admin/profesores/notificaciones',
			'offertNotification' 	=> '/admin/ofertas/notificaciones',
			'allStudents' 			=> '/admin/estudiante',
			'allVerifiedStudents' 	=> '/admin/estudiante/verificados',
			'allDeniedStudents' 	=> '/admin/estudiante/denegados',
			'allOffers' 			=> '/admin/ofertas',
			'allVerifiedOffers' 	=> '/admin/ofertas/verificadas',
			'allDeniedOffers' 		=> '/admin/ofertas/denegadas',
			'allTeachers' 			=> '/admin/profesores',
			'allVerifiedTeachers' 	=> '/admin/profesores/verificadas',
			'allDeniedTeachers' 	=> '/admin/profesores/denegadas',
        ],
    'student'    =>
        [
            'studentIndex'        => '/estudiante',
        ],
    'teacher'    =>
        [
            'teacherIndex'     		=> '/profesor',
			'studentNotification' 	=> '/profesor/estudiantes/notificaciones',
			'offertNotification' 	=> '/profesor/ofertas/notificaciones',
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
