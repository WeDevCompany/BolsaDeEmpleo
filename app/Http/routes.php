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

    Route::get('/' , function () {
        $zona = "Inicio";
        return view('welcome', compact('zona'));
    });

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

Route::group(['middleware' => 'web'], function () {

    Route::post('/authLogin', 'Auth\AuthController@authLogin');

    Route::get(config('routes.confirmation'), [
        'uses'  => 'Auth\AuthController@getConfirmation',
        'as'    => 'confirmation'
    ]);

    Route::post(config('routes.confirmado'), 'Auth\AuthController@postConfirmation');

    Route::auth();

    //Route::get('/home', 'HomeController@index');

    // Ruta para protección de datos
    Route::get(config('routes.terminos'), function(){
        $zona = "Terminos de uso";
        return view('partials.protecciondatos', compact('zona'));
    });

});

// Rutas de peticiones Ajax
Route::group(['prefix' => 'json', 'middleware' => 'web', 'namespace' => 'Json'], function () {

    // Ciclos
    Route::get('cycles/{familyId}', function($familyId) {

        $cycles = App\Cycle::where('active', '=', '1')->where('profFamilie_id', '=', $familyId)->get();

        return \Response::json($cycles);
    });

    // Familias profesionales
    Route::get('profFamilies', function(Illuminate\Http\Request  $request) {
        $profFamilies = App\ProfFamilie::where('active', '=', '1')->lists('name', 'id');
        $valid_profFamilies = [];
        foreach ($profFamilies as $id => $profFamilie) {
            $valid_profFamilies[] = ['id' => $id, 'familia' => $profFamilie];
        }
        return \Response::json($valid_profFamilies);
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

Route::group(['prefix' => 'estudiante', 'middleware' => ['web'], 'namespace' => 'Student'], function(){

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
