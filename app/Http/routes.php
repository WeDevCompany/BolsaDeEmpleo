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

    Route::get('profesor/registro', 'Teacher\TeachersController@index');
    Route::get('estudiante/registro', 'Student\StudentsController@index');
    Route::get('empresa/registro', 'Enterprise\EnterprisesController@index');

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('/terminos', function(){
        return view('partials.protecciondatos');
    });


    Route::resource('/perfil', 'UsersController@imagenPerfil');
    Route::post('/uploadImage', 'UsersController@uploadImage');

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

Route::group(['prefix' => 'profesor', 'middleware' => ['web'/*, 'auth'*/], 'namespace' => 'Teacher'], function(){

    Route::resource('/', 'TeachersController');

});

Route::group(['prefix' => 'estudiante', 'middleware' => ['web'/*, 'auth'*/], 'namespace' => 'Student'], function(){

    Route::resource('/', 'StudentsController');

});

Route::group(['prefix' => 'empresa', 'middleware' => ['web'/*, 'auth'*/], 'namespace' => 'Enterprise'], function(){

    Route::resource('/', 'EnterprisesController');

});

Route::group(['prefix' => 'uso', 'middleware' => 'web', 'namespace' => 'Uso'], function(){

    Route::resource('/', 'UsoController');

});
