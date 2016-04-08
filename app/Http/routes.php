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

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    //Ruta en la que mandamos por get la imagen de perfil del usuario
    Route::get('images/profile', function()
    {
        $filepath = storage_path() . '/app/public/default/' . Auth::user()->image;
        return Response::download($filepath);
    });

});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){

    Route::resource('/', 'TeachersController');

});

Route::group(['prefix' => 'profesor', 'namespace' => 'Profesor'], function(){

    Route::resource('/', 'TeachersController');

});

Route::group(['prefix' => 'estudiante', 'namespace' => 'Estudiante'], function(){

    Route::resource('/', 'StudentsController');

});

Route::group(['prefix' => 'empresa', 'namespace' => 'Empresa'], function(){

    Route::resource('/', 'EnterprisesController');

});

Route::group(['prefix' => 'uso', 'namespace' => 'Uso'], function(){

    Route::resource('/', 'UsoController');

});