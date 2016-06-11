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

Route::group(['prefix' => 'registro', 'middleware' => 'web'], function () {

    // Registro de profesores
    Route::get(config('routes.registroRoutes.registroProfesor'), 'UsersController@register');
    Route::post(config('routes.registroRoutes.registerTeacher'), 'Teacher\TeachersController@store');

    // Registro de estudiantes
    Route::get(config('routes.registroRoutes.registroEstudiante'), 'UsersController@register');
    Route::post(config('routes.registroRoutes.registerStudent'), 'Student\StudentsController@store');

    // Registro de empresas
    Route::get(config('routes.registroRoutes.registroEmpresa'), 'UsersController@register');
    Route::post(config('routes.registroRoutes.registerEnterprise'), 'Enterprise\EnterprisesController@store');

});

// Ruta para pruebas
Route::get(config('routes.pruebas'), function(){
    return view('errors.notVerified', ['rol' => "Administrador"]);
});


// Grupo de rutas para la autentificacion
Route::group(['middleware' => 'web'], function () {

    // Autores
    Route::get(config('routes.authors'), function(){
        return view('authors.authors');
    });

    // Ruta de la pagina principal
    Route::get('/' , function () {
        $zona = "Inicio";
        return view('welcome', compact('zona'));
    });

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
/**********************************
        Grupo json
************************************/
Route::group(['prefix' => 'json', 'middleware' => 'web'], function () {

    // Ciclos
    Route::get('cycles/{familyId}', 'CyclesController@getCyclesJSON');

    // Familias profesionales
    Route::get('profFamilies', 'ProfFamiliesController@getAllProfFamiliesJSON');

    // Provincias
    Route::get('states', 'StatesController@getAllStatesJSON');

    // Notificaciones
    Route::get('notifications', 'UsersController@getNotificationsJSON');

    // Ciclos
    Route::get('cities/{stateId}', 'CitiesController@getCitiesJSON');

});

// Grupo de rutas para los administradores
Route::group(['prefix' => 'administrador', 'middleware' => ['web', 'auth', 'isAdmin'], 'namespace' => 'Admin'], function(){

    // Vista de administrador logeado
    Route::resource(config('routes.index'), 'AdminsController');

    // Modificacion de la imagen de perfil de los administradores
    Route::get(config('routes.perfil'), 'AdminsController@imagenPerfil');
    Route::post(config('routes.UploadImg'), 'AdminsController@uploadImage');

    // Validacion del Profesor
    Route::get(config('routes.adminRoutes.teacherNotification'), 'AdminsController@getTeacherNotification');
    Route::post(config('routes.adminRoutes.teacherValidNotification'), 'AdminsController@postTeacherNotification');

    // Borrar profesor
    Route::delete(config('routes.adminRoutes.destroyTeacher'), 'AdminsController@destroyTeacher');

    // Profesores admitidos
    Route::get(config('routes.adminRoutes.allVerifiedTeachers'), 'AdminsController@getVerifiedTeacher');

    // Profesores borrados
    Route::get(config('routes.adminRoutes.allDeniedTeachers'), 'AdminsController@getDeniedTeacher');
    Route::post(config('routes.adminRoutes.restoreDeniedTeachers'), 'AdminsController@postDeniedTeacher');

    // Validacion del Estudiante
    Route::get(config('routes.adminRoutes.studentNotification'), 'AdminsController@getStudentNotification');
    Route::post(config('routes.adminRoutes.studentValidNotification'), 'AdminsController@postStudentNotification');

    // Borrar Estudiante
    Route::delete(config('routes.adminRoutes.destroyStudent'), 'AdminsController@destroyStudent');

    // Estudiantes admitidos
    Route::get(config('routes.adminRoutes.allVerifiedStudents'), 'AdminsController@getVerifiedStudent');

    // Estudiantes borrados
    Route::get(config('routes.adminRoutes.allDeniedStudents'), 'AdminsController@getDeniedStudent');
    Route::post(config('routes.adminRoutes.restoreDeniedStudents'), 'AdminsController@postDeniedStudent');

    // Validacion de ofertas de trabajo
    Route::get(config('routes.adminRoutes.offerNotification'), 'AdminsController@getOfferNotification');
    Route::post(config('routes.adminRoutes.offerValidNotification'), 'AdminsController@postOfferNotification');

    // Borrar Oferta
    Route::delete(config('routes.adminRoutes.destroyOffer'), 'AdminsController@destroyOffer');

    // Ofertas admitidas
    Route::get(config('routes.adminRoutes.allVerifiedOffers'), 'AdminsController@getVerifiedOffer');

    // Ofertas borradas
    Route::get(config('routes.adminRoutes.allDeniedOffers'), 'AdminsController@getDeniedOffer');
    Route::post(config('routes.adminRoutes.restoreDeniedOffers'), 'AdminsController@postDeniedOffer');

    // Empresas admitidas
    Route::get(config('routes.adminRoutes.allVerifiedEnterprises'), 'AdminsController@getVerifiedEnterprise');

    // Borrar empresas
    Route::delete(config('routes.adminRoutes.destroyEnterprise'), 'AdminsController@destroyEnterprise');

    // Empresas borradas
    Route::get(config('routes.adminRoutes.allDeniedEnterprises'), 'AdminsController@getDeniedEnterprise');
    Route::post(config('routes.adminRoutes.restoreDeniedEnterprises'), 'AdminsController@postDeniedEnterprise');

    // Visualización de una sola oferta
    Route::get(config('routes.adminRoutes.viewOffer'), 'AdminsController@getOfferById');

});

// Grupo de rutas para los profesores
/**********************************
        Grupo profesor
************************************/
Route::group(['prefix' => 'profesor', 'middleware' => ['web', 'auth', 'isTeacher'], 'namespace' => 'Teacher'], function(){

    // Vista de profesor logeado
    Route::resource(config('routes.index'), 'TeachersController');

    // Modificacion de la imagen de perfil de los profesores
    Route::get(config('routes.perfil'), 'TeachersController@imagenPerfil');
    Route::post(config('routes.UploadImg'), 'TeachersController@uploadImage');

    // Validacion del Estudiante
    Route::get(config('routes.teacherRoutes.studentNotification'), 'TeachersController@getStudentNotification');
    Route::post(config('routes.teacherRoutes.studentValidNotification'), 'TeachersController@postStudentNotification');

    // Borrar estudiantes
    Route::delete(config('routes.teacherRoutes.destroyStudent'), 'TeachersController@destroyStudent');

    // Alumnos admitidos
    Route::get(config('routes.teacherRoutes.allVerifiedStudents'), 'TeachersController@getVerifiedStudent');

    // Estudiantes borrados
    Route::get(config('routes.teacherRoutes.allDeniedStudents'), 'TeachersController@getDeniedStudent');
    Route::post(config('routes.teacherRoutes.restoreDeniedStudents'), 'TeachersController@postDeniedStudent');

    // Validacion de ofertas de trabajo
    Route::get(config('routes.teacherRoutes.offerNotification'), 'TeachersController@getOfferNotification');
    Route::post(config('routes.teacherRoutes.offerValidNotification'), 'TeachersController@postOfferNotification');

    // Borrar ofertas
    Route::delete(config('routes.teacherRoutes.destroyOffer'), 'TeachersController@destroyOffer');

    // Ofertas admitidas
    Route::get(config('routes.teacherRoutes.allVerifiedOffers'), 'TeachersController@getVerifiedOffer');

    // Ofertas borradas
    Route::get(config('routes.teacherRoutes.allDeniedOffers'), 'TeachersController@getDeniedOffer');
    Route::post(config('routes.teacherRoutes.restoreDeniedOffers'), 'TeachersController@postDeniedOffer');

    // Visualización de una sola oferta
    Route::get(config('routes.teacherRoutes.viewOffer'), 'TeachersController@getOfferById');

});

// Grupo de rutas para los estudiantes
/**********************************
        Grupo estudiante
************************************/
Route::group(['prefix' => 'estudiante', 'middleware' => ['web', 'auth', 'isStudent'], 'namespace' => 'Student'], function(){

    // Registro de estudiantes
    Route::post(config('routes.studentRoutes.register'), 'StudentsController@store');

    // Vista de estudiante logeado
    Route::resource(config('routes.index'), 'StudentsController');

    // Modificacion de la imagen de perfil y el curriculum de los estudiantes
    Route::get(config('routes.perfil'), 'StudentsController@imagenPerfil');
    Route::post(config('routes.UploadImg'), 'StudentsController@uploadImage');
    Route::get(config('routes.curriculum'), 'StudentsController@studentCurriculum');
    Route::post(config('routes.UploadCurriculum'), 'StudentsController@uploadCurriculum');

    // Ofertas admitidas
    Route::get(config('routes.studentRoutes.allOffers'), 'StudentsController@getVerifiedOffer');

    // Visualización de una sola oferta
    Route::get(config('routes.studentRoutes.viewOffer'), 'StudentsController@getOfferById');

    // Suscripcion a una oferta
    Route::get(config('routes.studentRoutes.subcriptionOffer'), 'StudentsController@getSubcriptionStudent');

});

// Grupo de rutas para las empresas
/**********************************
        Grupo empresa
************************************/
Route::group(['prefix' => 'empresa', 'middleware' => ['web', 'auth', 'isEnterprise'], 'namespace' => 'Enterprise'], function(){

    // Registro de empresas
    Route::post(config('routes.enterpriseRoutes.register'), 'EnterprisesController@store');

    // Vista de empresa logeado
    Route::resource(config('routes.index'), 'EnterprisesController');

    // Modificacion de la imagen de perfil de las empresas
    Route::get(config('routes.perfil'), 'EnterprisesController@imagenPerfil');
    Route::post(config('routes.UploadImg'), 'EnterprisesController@uploadImage');

});

// Grupo de rutas para las ofertas
/**********************************
        Grupo oferta
************************************/
Route::group(['middleware' => ['web', 'auth']], function(){

    /**********************************
            Oferta Profesor
    ************************************/
    Route::group(['middleware' => ['isTeacher']], function(){

        // Comentarios: creacion, edicion y borrado
        Route::post(config('routes.offerTeacher.commentEdit'), 'OffersController@getCommentEdit');
        Route::post(config('routes.offerTeacher.commentDelete'), 'OffersController@getCommentDelete');
        Route::post(config('routes.offerTeacher.commentCreate'), 'OffersController@getCommentCreate');

        // Actualizar oferta
        Route::get(config('routes.offerTeacher.updateOffer'), 'OffersController@getOfferUpdate');
    });

    /**********************************
        Oferta Administrador
    ************************************/
    Route::group(['middleware' => ['isAdmin']], function(){

        // Comentarios: creacion, edicion y borrado
        Route::post(config('routes.offerAdmin.commentEdit'), 'OffersController@getCommentEdit');
        Route::post(config('routes.offerAdmin.commentDelete'), 'OffersController@getCommentDelete');
        Route::post(config('routes.offerAdmin.commentCreate'), 'OffersController@getCommentCreate');

        // Actualizar, editar, borrar oferta
        Route::get(config('routes.offerAdmin.updateOffer'), 'OffersController@getOfferUpdate');
        Route::get(config('routes.offerAdmin.offerEdit'), 'OffersController@getOfferEdit');
        Route::post(config('routes.offerAdmin.postOfferEdit'), 'OffersController@postOfferEdit');
        Route::get(config('routes.offerAdmin.offerDelete'), 'OffersController@getOfferDelete');

    });

    /**********************************
        Oferta Empresa
    ************************************/
    Route::group(['middleware' => ['isEnterprise']], function(){

        // listado de ofertas
        Route::get(config('routes.offerEnterprise.allOffers'), 'OffersController@getEnterpriseOffers');

        // vista de una oferta
        Route::get(config('routes.offerEnterprise.viewOffer'), 'OffersController@getOneEnterpriseOffer');

        // edición de una oferta
        Route::get(config('routes.offerEnterprise.offerEdit'), 'OffersController@getOneEnterpriseOfferEdit');
        Route::post(config('routes.offerEnterprise.postOfferEdit'), 'OffersController@postOfferEdit');

        // Actualización de la fecha de la oferta
        Route::get(config('routes.offerEnterprise.updateOffer'), 'OffersController@getOfferUpdate');

        // Inserción de la oferta
        Route::get(config('routes.offerEnterprise.newOffer'), 'OffersController@getNewOffer');
        Route::post(config('routes.offerEnterprise.newOfferPost'), 'OffersController@postNewOffer');

    });

});

/**********************************
        Grupo asignaturas
************************************/
Route::group(['middleware' => ['web', 'auth']], function(){

    // Asignaturas profesor
    Route::get(config('routes.teacher.subjects'), 'SubjectsController@index');
    Route::post(config('routes.teacher.subjects'), 'SubjectsController@store');

    // Asignaturas administrador
    Route::get(config('routes.admin.subjects'), 'SubjectsController@index');
    Route::post(config('routes.admin.subjects'), 'SubjectsController@store');

});