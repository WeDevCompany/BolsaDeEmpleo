<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// La función config no funciona con Route::resource

Route::group(['middleware' => ['web']], function () {

    // Ruta de la pagina principal
    Route::get('/' , function () {
        $zona = "Inicio";
        return view('welcome', compact('zona'));
    });

    // Rutas para el registro de profesor, estudiante y empresa
    Route::get(config('routes.registro.registroProfesor'), 'Teacher\TeachersController@index');
    Route::get(config('routes.registro.registroEstudiante'), 'Student\StudentsController@index');
    Route::get(config('routes.registro.registroEmpresa'), 'Enterprise\EnterprisesController@index');

});

// Ruta para pruebas
Route::get(config('routes.pruebas'), function(){
    return view('errors.notVerified', ['rol' => "Administrador"]);
});

// Ruta para pruebas
Route::get(config('routes.authors'), function(){
    return view('authors.authors');
});

// Grupo de rutas para la autentificacion
Route::group(['middleware' => 'web'], function () {

    // Ruta que recibe el formulario de login
    Route::post('/authLogin', 'Auth\AuthController@authLogin');

    // Ruta para la confirmacion del usuario
    Route::get(config('routes.confirmation'), [
        'uses'  => 'Auth\AuthController@getDirectConfirmation',
        // Alias, para utilizarlo escribiriamos en el enlace: route('confirmation')
        'as'    => 'confirmation'
    ]);

    // Ruta para la confirmacion del usuario
    Route::get(config('routes.confirmacion'), [
        'uses'  => 'Auth\AuthController@getConfirmation',
        'as'    => 'confirmacion'
    ]);

    // Ruta que recibe el codigo de la confirmacion del usuario
    Route::post(config('routes.confirmado'), 'Auth\AuthController@postConfirmation');

    Route::auth();

    //Route::get('/home', 'HomeController@index');

    // Ruta para protección de datos
    Route::get(config('routes.terminos'), function(){
        // Puesto que los terminos no tienen controlador
        // Redirecciono desde aqui a la vista y le paso un titulo
        // Para mejorar el posicionamiento de la web
        $zona = "Terminos de uso";
        return view('partials.protecciondatos', compact('zona'));
    });

});

// Rutas de peticiones Ajax  JSON
// NO SE UTILIZA NAMESPACES SINO SE ENCUENTRA EN LA CARPETA CON EL MISMO NOMBRE
Route::group(['prefix' => 'json', 'middleware' => 'web'], function () {

    // Ciclos
    Route::get('cycles/{familyId}', 'CyclesController@getCiclesJSON');

    // Familias profesionales
    Route::get('profFamilies', 'ProfFamilieController@getAllProfFamiliesJSON');

});

// Grupo de rutas para los administradores
Route::group(['prefix' => 'admin', 'middleware' => 'web', 'namespace' => 'Admin'], function(){

    // Vista de administrador logeado
    Route::resource(config('routes.index'), 'AdminsController');

    // Modificacion de la imagen de perfil de los administradores
    Route::get(config('routes.perfil'), 'AdminsController@imagenPerfil');
    Route::post(config('routes.UploadImg'), 'AdminsController@uploadImage');

});

// Grupo de rutas para los profesores
Route::group(['prefix' => 'profesor', 'middleware' => ['web'], 'namespace' => 'Teacher'], function(){

    // Vista de profesor logeado
    Route::resource(config('routes.index'), 'TeachersController');

    // Modificacion de la imagen de perfil de los profesores
    Route::get(config('routes.perfil'), 'TeachersController@imagenPerfil');
    Route::post(config('routes.UploadImg'), 'TeachersController@uploadImage');

});

// Grupo de rutas para los estudiantes
Route::group(['prefix' => 'estudiante', 'middleware' => ['web'], 'namespace' => 'Student'], function(){

    // Vista de estudiante logeado
    Route::resource(config('routes.index'), 'StudentsController');

    // Modificacion de la imagen de perfil de los estudiantes
    Route::get(config('routes.perfil'), 'StudentsController@imagenPerfil');
    Route::post(config('routes.UploadImg'), 'StudentsController@uploadImage');

});

// Grupo de rutas para las empresas
Route::group(['prefix' => 'empresa', 'middleware' => ['web', 'auth'], 'namespace' => 'Enterprise'], function(){

    // Vista de empresa logeado
    Route::resource(config('routes.index'), 'EnterprisesController');

    // Modificacion de la imagen de perfil de las empresas
    Route::get(config('routes.perfil'), 'EnterprisesController@imagenPerfil');
    Route::post(config('routes.UploadImg'), 'EnterprisesController@uploadImage');

});


Route::group(['prefix' => 'uso', 'middleware' => 'web', 'namespace' => 'Uso'], function(){

    Route::resource(config('routes.index'), 'UsoController');

});
