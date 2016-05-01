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
            'adminIndex'     => '/admin',
        ],
    'student'    =>
        [
            'studentIndex'        => '/estudiante',
        ],
    'teacher'    =>
        [
            'teacherIndex'     => '/profesor',
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
		[
			'manu'			=> '/autores/emmanuel',
			'edu'			=> '/autores/eduardo',
			'pedro'			=> '/autores/pedro',
		],

];
?>
