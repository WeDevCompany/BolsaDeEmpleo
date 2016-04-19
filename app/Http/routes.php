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

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get(config('routes.registro.registroProfesor'), 'Teacher\TeachersController@index');
    Route::get(config('routes.registro.registroEstudiante'), 'Student\StudentsController@index');
    Route::get(config('routes.registro.registroEmpresa'), 'Enterprise\EnterprisesController@index');

});

Route::group(['middleware' => 'web'], function () {

    Route::post(config('routes.authlogin'), 'Auth\AuthController@authLogin');
    Route::auth();

    //Route::get('/home', 'HomeController@index');

    // Ruta para protección de datos
    Route::get(config('routes.terminos'), function(){
        return view('partials.protecciondatos');
    });

});

Route::group(['prefix' => 'admin', 'middleware' => 'web', 'namespace' => 'Admin'], function(){

    Route::resource(config('routes.index'), 'AdminsController');
    Route::get(config('routes.perfil'), 'AdminsController@imagenPerfil');
    Route::post(config('routes.UploadImg'), 'AdminsController@uploadImage');

});

Route::group(['prefix' => 'profesor', 'middleware' => ['web'], 'namespace' => 'Teacher'], function(){

    Route::resource(config('routes.index'), 'TeachersController');
    Route::get(config('routes.perfil'), 'TeachersController@imagenPerfil');
    Route::post(config('routes.UploadImg'), 'TeachersController@uploadImage');

});

Route::group(['prefix' => 'estudiante', 'middleware' => ['web', 'auth'], 'namespace' => 'Student'], function(){

    Route::resource(config('routes.index'), 'StudentsController');
    Route::get(config('routes.perfil'), 'StudentsController@imagenPerfil');
    Route::post(config('routes.UploadImg'), 'StudentsController@uploadImage');

});

Route::group(['prefix' => 'empresa', 'middleware' => ['web', 'auth'], 'namespace' => 'Enterprise'], function(){

    Route::resource(config('routes.index'), 'EnterprisesController');
    Route::get(config('routes.perfil'), 'EnterprisesController@imagenPerfil');
    Route::post(config('routes.UploadImg'), 'EnterprisesController@uploadImage');

});

Route::group(['prefix' => 'uso', 'middleware' => 'web', 'namespace' => 'Uso'], function(){

    Route::resource(config('routes.index'), 'UsoController');

});
