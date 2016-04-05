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

    Route::resource('/profesor', 'UsersController@teacherSignUp');
    Route::resource('/admin', 'UsersController@teacherSignUp');
    Route::resource('/estudiante', 'UsersController@studentSignUp');
    Route::resource('/empresa', 'UsersController@enterpriseSignUp');
    Route::resource('/uso', 'UsoController@index');

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