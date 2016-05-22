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
    Route::get('profFamilies', 'ProfFamiliesController@getAllProfFamiliesJSON');

    // Provincias
    Route::get('states', 'StatesController@getAllStatesJSON');

});

// Grupo de rutas para los administradores
Route::group(['prefix' => 'admin', 'middleware' => 'web', 'namespace' => 'Admin'], function(){

    // Vista de administrador logeado
    Route::resource(config('routes.index'), 'AdminsController');

    // Modificacion de la imagen de perfil de los administradores
    Route::get(config('routes.perfil'), 'AdminsController@imagenPerfil');
    Route::post(config('routes.UploadImg'), 'AdminsController@uploadImage');

    // Validacion del Profesor
    Route::get(config('routes.adminRoutes.teacherNotification'), 'AdminsController@getTeacherNotification');
    Route::post(config('routes.adminRoutes.teacherValidNotification'), 'AdminsController@postTeacherNotification');
    Route::post(config('routes.adminRoutes.teacherSearchNotification'), 'AdminsController@postSearchTeacherNotification');

    // Profesores admitidos
    Route::get(config('routes.adminRoutes.allVerifiedTeachers'), 'AdminsController@getVerifiedTeacher');
    Route::post(config('routes.adminRoutes.allVerifiedTeachersSearch'), 'AdminsController@postSearchVerifiedTeacher');

    // Validacion del Estudiante
    Route::get(config('routes.adminRoutes.studentNotification'), 'AdminsController@getStudentNotification');
    Route::post(config('routes.adminRoutes.studentValidNotification'), 'AdminsController@postStudentNotification');
    Route::post(config('routes.adminRoutes.studentSearchNotification'), 'AdminsController@postSearchStudentNotification');

    // Alumnos admitidos
    Route::get(config('routes.adminRoutes.allVerifiedStudents'), 'AdminsController@getVerifiedStudent');
    Route::post(config('routes.adminRoutes.allVerifiedStudentsSearch'), 'AdminsController@postSearchVerifiedStudent');

    // Validacion de ofertas de trabajo
    Route::get(config('routes.adminRoutes.offerNotification'), 'AdminsController@getOfferNotification');
    Route::post(config('routes.adminRoutes.offerValidNotification'), 'AdminsController@postOfferNotification');
    Route::post(config('routes.adminRoutes.offerSearchNotification'), 'AdminsController@postSearchOfferNotification');

    // Ofertas admitidas
    Route::get(config('routes.adminRoutes.allVerifiedOffers'), 'AdminsController@getVerifiedOffer');
    Route::post(config('routes.adminRoutes.allVerifiedOffersSearch'), 'AdminsController@postSearchVerifiedOffer');

});

// Grupo de rutas para los profesores
Route::group(['prefix' => 'profesor', 'middleware' => ['web'], 'namespace' => 'Teacher'], function(){

    // Vista de profesor logeado
    Route::resource(config('routes.index'), 'TeachersController');

    // Modificacion de la imagen de perfil de los profesores
    Route::get(config('routes.perfil'), 'TeachersController@imagenPerfil');
    Route::post(config('routes.UploadImg'), 'TeachersController@uploadImage');

    // Validacion del Estudiante
    Route::get(config('routes.teacherRoutes.studentNotification'), 'TeachersController@getStudentNotification');
    Route::post(config('routes.teacherRoutes.studentValidNotification'), 'TeachersController@postStudentNotification');
    Route::post(config('routes.teacherRoutes.studentSearchNotification'), 'TeachersController@postSearchStudentNotification');

    // Alumnos admitidos
    Route::get(config('routes.teacherRoutes.allVerifiedStudents'), 'TeachersController@getVerifiedStudent');
    Route::post(config('routes.teacherRoutes.allVerifiedStudentsSearch'), 'TeachersController@postSearchVerifiedStudent');

    // Validacion de ofertas de trabajo
    Route::get(config('routes.teacherRoutes.offerNotification'), 'TeachersController@getOfferNotification');
    Route::post(config('routes.teacherRoutes.offerValidNotification'), 'TeachersController@postOfferNotification');
    Route::post(config('routes.teacherRoutes.offerSearchNotification'), 'TeachersController@postSearchOfferNotification');

    // Ofertas admitidas
    Route::get(config('routes.teacherRoutes.allVerifiedOffers'), 'TeachersController@getVerifiedOffer');
    Route::post(config('routes.teacherRoutes.allVerifiedOffersSearch'), 'TeachersController@postSearchVerifiedOffer');

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
