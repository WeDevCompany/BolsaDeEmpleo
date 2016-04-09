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

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('profesor/registro', 'Profesor\TeachersController@register');
    Route::get('estudiante/registro', 'Estudiante\StudentsController@register');
    Route::get('empresa/registro', 'Empresa\EnterprisesController@register');

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');



    /*Route::resource('/perfil', 'UsersController@imagenPerfil');
    Route::post('/uploadImage', 'UsersController@uploadImage');*/

    //Ruta en la que mandamos por get la imagen de perfil del usuario
    Route::get('images/profile', function()
    {
        $filepath = storage_path() . '/app/public/' . Auth::user()->image;
        return Response::download($filepath);
    });

});

Route::group(['prefix' => 'admin', 'middleware' => 'web', 'namespace' => 'Admin'], function(){

    Route::resource('/', 'TeachersController');

});

Route::group(['prefix' => 'profesor', 'middleware' => ['web', 'auth'], 'namespace' => 'Profesor'], function(){

    Route::resource('/', 'TeachersController');

});

Route::group(['prefix' => 'estudiante', 'middleware' => ['web', 'auth'], 'namespace' => 'Estudiante'], function(){

    Route::resource('/', 'StudentsController');

});

Route::group(['prefix' => 'empresa', 'middleware' => ['web', 'auth'], 'namespace' => 'Empresa'], function(){

    Route::resource('/', 'EnterprisesController');

});

Route::group(['prefix' => 'uso', 'middleware' => 'web', 'namespace' => 'Uso'], function(){

    Route::resource('/', 'UsoController');

});