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
            'registroEstudiante'    => '/registro/estudiante',
            'registroProfesor'      => '/registro/profesor',
            'registroEmpresa'       => '/registro/empresa',
        ],

    'registroRoutes' =>
        [
            'registroEstudiante'    => '/estudiante',
            'registroProfesor'      => '/profesor',
            'registroEmpresa'       => '/empresa',
            'registerTeacher'       => '/registroProfesor',
            'registerEnterprise'    => '/registroEmpresa',
            'registerStudent'       => '/registroEstudiante',
        ],

    'terminos' => '/terminos/',

    'admin'    =>
        [
            'adminIndex'                => '/administrador',
            'studentNotification'       => 'administrador/notificaciones/estudiantes',
            'teacherNotification'       => 'administrador/notificaciones/profesores',
            'offerNotification'         => 'administrador/notificaciones/ofertas',
            'enterpriseNotification'    => 'administrador/notificaciones/empresas',
            'teacherValidNotification'  => 'administrador/notificaciones/validTeacherNotification',
            'studentValidNotification'  => 'administrador/notificaciones/validStudentNotification',
            'offerValidNotification'    => 'administrador/notificaciones/validOfferNotification',
            'teacherSearchNotification' => 'administrador/notificaciones/profesores-buscador',
            'studentSearchNotification' => 'administrador/notificaciones/estudiantes-buscador',
            'offerSearchNotification'   => 'administrador/notificaciones/ofertas-buscador',
            'destroyTeacher'            => 'administrador/profesor/eliminar-profesor',
            'allVerifiedTeachers'       => 'administrador/profesor/verificados',
            'allVerifiedTeachersSearch' => 'administrador/profesor/verificados-buscador',
            'allDeniedTeachers'         => 'administrador/profesor/denegados',
            'restoreDeniedTeachers'     => 'administrador/profesor/restaurar',
            'allDeniedTeachersSearch'   => 'administrador/profesor/denegados-buscador',
            'allVerifiedStudents'       => 'administrador/estudiante/verificados',
            'allVerifiedStudentsSearch' => 'administrador/estudiante/verificados-buscador',
            'allDeniedStudents'         => 'administrador/estudiante/denegados',
            'restoreDeniedStudents'     => 'administrador/estudiante/restaurar',
            'allDeniedStudentsSearch'   => 'administrador/estudiante/denegados-buscador',
            'allVerifiedOffers'         => 'administrador/oferta/verificadas',
            'allVerifiedOffersSearch'   => 'administrador/oferta/verificadas-buscador',
            'allDeniedOffers'           => 'administrador/oferta/denegadas',
            'restoreDeniedOffers'       => 'administrador/oferta/restaurar',
            'allDeniedOffersSearch'     => 'administrador/oferta/denegadas-buscador',
            'statistics'                => 'administrador/estadisticas',
            'viewOffer'                 => '/administrador/oferta/{idOffer}',
            'updateOffer'               => '/administrador/oferta/actualizar/{idOffer}',
            'comment'                   => '/administrador/oferta/comentario/{idOffer}',
            'destroyStudent'            => 'administrador/estudiante/eliminar-estudiante',
            'destroyOffer'              => 'administrador/oferta/eliminar-oferta',
            'allVerifiedEnterprises'       => 'administrador/empresa/verificadas',
            'allVerifiedEnterprisesSearch' => 'administrador/empresa/verificadas-buscador',
            'allDeniedEnterprises'         => 'administrador/empresa/denegadas',
            'restoreDeniedEnterprises'     => 'administrador/empresa/restaurar',
            'allDeniedEnterprisesSearch'   => 'administrador/empresa/denegadas-buscador',
            'destroyEnterprise'            => 'administrador/empresa/eliminar-empresa',
            'subjects'                  => '/administrador/asignaturas',
            'allProfFamilies'      => 'administrador/configuracion/familias-profesionales',

        ],
    'adminRoutes' =>
        [
            'studentNotification'       => '/notificaciones/estudiantes',
            'teacherNotification'       => '/notificaciones/profesores',
            'offerNotification'         => '/notificaciones/ofertas',
            'enterpriseNotification'    => '/notificaciones/empresas',
            'teacherValidNotification'  => '/notificaciones/validTeacherNotification',
            'studentValidNotification'  => '/notificaciones/validStudentNotification',
            'offerValidNotification'    => '/notificaciones/validOfferNotification',
            'teacherSearchNotification' => '/notificaciones/profesores-buscador',
            'studentSearchNotification' => '/notificaciones/estudiantes-buscador',
            'offerSearchNotification'   => '/notificaciones/ofertas-buscador',
            'destroyTeacher'            => '/profesor/eliminar-profesor/{id}',
            'allVerifiedTeachers'       => '/profesor/verificados',
            'allVerifiedTeachersSearch' => '/profesor/verificados-buscador',
            'allDeniedTeachers'         => '/profesor/denegados',
            'restoreDeniedTeachers'     => '/profesor/restaurar',
            'allDeniedTeachersSearch'   => '/profesor/denegados-buscador',
            'allVerifiedStudents'       => '/estudiante/verificados',
            'allVerifiedStudentsSearch' => '/estudiante/verificados-buscador',
            'allDeniedStudents'         => '/estudiante/denegados',
            'restoreDeniedStudents'     => '/estudiante/restaurar',
            'allDeniedStudentsSearch'   => '/estudiante/denegados-buscador',
            'allVerifiedOffers'         => '/oferta/verificadas',
            'allVerifiedOffersSearch'   => '/oferta/verificadas-buscador',
            'allDeniedOffers'           => '/oferta/denegadas',
            'restoreDeniedOffers'       => '/oferta/restaurar',
            'allDeniedOffersSearch'     => '/oferta/denegadas-buscador',
            'statistics'                => '/estadisticas',
            'viewOffer'                 => '/oferta/{idOffer}',
            'updateOffer'               => '/oferta/actualizar/{idOffer}',
            'comment'                   => '/oferta/comentario/{idOffer}',
            'destroyStudent'            => '/estudiante/eliminar-estudiante/{id}',
            'destroyOffer'              => '/oferta/eliminar-oferta/{id}',
            'allVerifiedEnterprises'       => '/empresa/verificadas',
            'allVerifiedEnterprisesSearch' => '/empresa/verificadas-buscador',
            'allDeniedEnterprises'         => '/empresa/denegadas',
            'restoreDeniedEnterprises'     => '/empresa/restaurar',
            'allDeniedEnterprisesSearch'   => '/empresa/denegadas-buscador',
            'destroyEnterprise'    => '/empresa/eliminar-empresa/{id}',
            'allProfFamilies'      => '/configuracion/familias-profesionales',
        ],
    'student'    =>
        [
            'studentIndex'          => '/estudiante',
            'allOffersSusribed'     => '/estudiante/oferta/suscripciones',
            'allOffers'             => '/estudiante/ofertas',
            'subcriptionOffer'      => '/estudiante/oferta/suscripcion/{idOffer}',
            'viewOffer'             => '/estudiante/oferta/{idOffer}',
            'downloadCurriculum'    => '/estudiante/downloadCV',
        ],
    'studentRoutes' =>
        [
            'allOffersSusribed'     => '/ofertas/suscripciones',
            'allOffers'             => '/ofertas',
            'register'              => 'registro',
            'subcriptionOffer'      => '/oferta/suscripcion/{idOffer}',
            'viewOffer'             => '/oferta/{idOffer}',
            'downloadCurriculum'    => '/downloadCV',
        ],

    'teacher'    =>
           [
               'teacherIndex'              => '/profesor',
               'studentNotification'       => '/profesor/notificaciones/estudiantes',
               'offerNotification'         => '/profesor/notificaciones/ofertas',
               'studentValidNotification'  => '/profesor/notificaciones/validStudentNotification',
               'offerValidNotification'    => '/profesor/notificaciones/validOfferNotification',
               'studentSearchNotification' => '/profesor/notificaciones/estudiantes-buscador',
               'offerSearchNotification'   => '/profesor/notificaciones/ofertas-buscador',
               'destroyStudent'            => '/profesor/estudiante/eliminar-estudiante/{id}',
               'destroyOffer'              => '/profesor/oferta/eliminar-oferta/{id}',
               'allVerifiedStudents'       => '/profesor/estudiante/verificados',
               'allVerifiedStudentsSearch' => '/profesor/estudiante/verificados-buscador',
               'allDeniedStudents'         => '/profesor/estudiante/denegados',
               'allDeniedStudentsSearch'   => '/profesor/estudiante/denegados-buscador',
               'restoreDeniedStudents'     => '/profesor/estudiante/restaurar',
               'allDeniedOffers'           => '/profesor/oferta/denegadas',
               'allDeniedOffersSearch'     => '/profesor/oferta/denegadas-buscador',
               'restoreDeniedOffers'       => '/profesor/oferta/restaurar',
               'allVerifiedOffers'         => '/profesor/oferta/verificadas',
               'allVerifiedOffersSearch'   => '/profesor/oferta/verificadas-buscador',
               'viewOffer'                 => '/profesor/oferta/{idOffer}',
               'updateOffer'               => '/profesor/oferta/actualizar/{idOffer}',
               'comment'                   => '/profesor/oferta/comentario/{idOffer}',
               'destroyStudent'            => '/profesor/estudiante/eliminar-estudiante',
               'destroyOffer'              => '/profesor/oferta/eliminar-oferta',
               'subjects'                  => '/profesor/asignaturas',

           ],
    'teacherRoutes'    =>
        [
            'studentNotification'       => '/notificaciones/estudiantes',
            'offerNotification'         => '/notificaciones/ofertas',
            'studentValidNotification'  => '/notificaciones/validStudentNotification',
            'offerValidNotification'    => '/notificaciones/validOfferNotification',
            'studentSearchNotification' => '/notificaciones/estudiantes-buscador',
            'offerSearchNotification'   => '/notificaciones/ofertas-buscador',
            'destroyStudent'            => '/estudiante/eliminar-estudiante/{id}',
            'destroyOffer'              => '/oferta/eliminar-oferta/{id}',
            'allVerifiedStudents'       => '/estudiante/verificados',
            'allVerifiedStudentsSearch' => '/estudiante/verificados-buscador',
            'allDeniedStudents'         => '/estudiante/denegados',
            'allDeniedStudentsSearch'   => '/estudiante/denegados-buscador',
            'restoreDeniedStudents'     => '/estudiante/restaurar',
            'allDeniedOffers'           => '/oferta/denegadas',
            'allDeniedOffersSearch'     => '/oferta/denegadas-buscador',
            'restoreDeniedOffers'       => '/oferta/restaurar',
            'allVerifiedOffers'         => '/oferta/verificadas',
            'allVerifiedOffersSearch'   => '/oferta/verificadas-buscador',
            'viewOffer'                 => '/oferta/{idOffer}',
            'updateOffer'               => '/oferta/actualizar/{idOffer}',
            'comment'                   => '/oferta/comentario/{idOffer}',
        ],
    'enterprise'    =>
        [
            'enterpriseIndex'              => '/empresa',
            'enterprisePerfil'             => '/empresa/perfil',
            'enterpriseUploadImg'          => '/empresa/uploadImage',
        ],
    'enterpriseRoutes'    =>
        [
            'enterprisePerfil'             => '/perfil',
            'enterpriseUploadImg'          => '/uploadImage',
            'viewOffer'                    => '/oferta/{idOffer}',
            'updateOffer'                  => '/oferta/actualizar/{idOffer}',

        ],
    'offerTeacher' =>
        [
            'updateOffer'            => 'profesor/oferta/actualizar/{idOffer}',
            'commentEdit'            => 'profesor/oferta/comentario/editar',
            'commentDelete'          => 'profesor/oferta/comentario/borrar',
            'commentCreate'          => 'profesor/oferta/comentario/crear',
        ],
    'offerAdmin' =>
        [
            'updateOffer'            => 'administrador/oferta/actualizar/{idOffer}',
            'commentEdit'            => 'administrador/oferta/comentario/editar',
            'commentDelete'          => 'administrador/oferta/comentario/borrar',
            'commentCreate'          => 'administrador/oferta/comentario/crear',
            'offerEdit'              => 'administrador/oferta/editar/{idOffer}',
            'postOfferEdit'          => 'administrador/oferta/editar-oferta',
            'offerDelete'            => 'administrador/oferta/borrar',
        ],
    'offerEnterprise' =>
        [
            'allOffers'             => 'ofertas',
            'viewOffer'             => 'empresa/oferta/{idOffer}',
            'newOffer'              => 'oferta/nueva-oferta',
            'newOfferPost'          => 'oferta/nueva-oferta/alta',
            'offerEdit'             => 'empresa/oferta/editar/{idOffer}',
            'postOfferEdit'         => 'empresa/oferta/editar-oferta',
            'offerDelete'           => 'empresa/oferta/borrar',
            'updateOffer'           => 'empresa/oferta/actualizar/{idOffer}',
        ],
    'files'    =>
        [
            'images'        => '/img/imgUser',
            'curriculum'    => storage_path( 'app/curriculum'),
        ],
    'index'             => '/',
    'perfil'            => '/perfil',
    'curriculum'        => '/curriculum',
    'UploadImg'         => '/UploadImg',
    'UploadCurriculum'  => '/UploadCurriculum',
    'uso'               => '/uso',
    'authLogin'         => '/authLogin',
    'confirmation'      => '/confirmation/{token}',
    'confirmacion'      => '/confirmacion',
    'confirmado'        => '/confirmado',
    'pruebas'           => '/pruebas',
    'authors'           => '/autores',

];
?>