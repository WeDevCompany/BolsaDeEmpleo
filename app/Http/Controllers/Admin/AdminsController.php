<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Teacher\TeachersController;
use App\JobOffer;
use App\Teacher;
use App\User;
use App\Student;
use App\Enterprise;
use App\Http\Requests;
use App\Http\Requests\TeacherNotificationRequest;
use App\Http\Requests\StudentNotificationRequest;
use App\Http\Requests\OfferNotificationRequest;
use App\Http\Requests\DeniedStudentRequest;
use App\Http\Requests\DeniedOfferRequest;
use App\Http\Requests\DeniedTeacherRequest;
use App\Http\Requests\DeniedEnterpriseRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

//use Datatables;

class AdminsController extends TeachersController
{

    public function __construct(Request $request)
    {
        Parent::__construct($request);

        $this->rol = 'admin';
        $this->redirectTo = "/admin";
    }

	public function index(){
        return view('admin/index');
	} // index()

    public function imagenPerfil()
    {
        return view(config('appViews.perfil'));
    } // imagenPerfil()

    /*
    |---------------------------------------------------------------------------|
    | PROFESORES -> Validacion, listado, borrado y restauracion.                |
    |---------------------------------------------------------------------------|
    |                                                                           |
    | En esta seccion tendremos:                                                |
    |       -> Validacion de todos los profesores                               |
    |       -> Listado de todos los profesores validados en la aplicacion       |
    |       -> Borrado de profesores con softDeletes                            |
    |       -> Restauracion de profesores "borrados" mediante softDeletes       |
    |                                                                           |
    */

	/**
     * Metodo que obtiene los profesores y los filtra por un buscador si lo recibe como parametro
     * @return  view        vista en la que el admin validara a los profesores
     * @return  estudiante  Todos los datos de los profesores no validados
     */
    public function getTeacherNotification()
    {
        // Url de buscador
        $urlSearch = config('routes.admin.teacherNotification');

        // Url de post
        $urlPost = config('routes.admin.teacherValidNotification');

        // Url para borrar profesores
        $urlDelete = config('routes.admin.destroyTeacher');

        // Variable de zona
        $zona = config('zona.notificaciones.profesor');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedTeacherStudent');

        // Obtenemos todos los profesores validados
        $validTeacher = $this->validTeacher();

        // Obtenemos todos los profesores que no estan validados
        $notValidateTeacher = Teacher::select('teachers.id')
                                        ->whereNotIn('teachers.id', array_column($validTeacher, 'teacher_id'))
                                        ->get();

        // Obtenemos todos los datos de los profesores que no estan validados
        $invalidTeacher = $this->invalidOrValidTeacher($notValidateTeacher, $this->request);

        // Request
        $request = $this->request;

        return view('generic/notification/teacherNotification', compact('invalidTeacher', 'filters', 'zona', 'urlSearch', 'urlPost', 'urlDelete', 'request'));


    } // getTeacherNotification()

    /**
     * Metodo que Valida los profesores y que admin lo ha validado
     * @return  view        redireccion a la vista en la que el admin validara a los profesores
     *
     */
    public function postTeacherNotification(TeacherNotificationRequest $request)
    {
        // Array de los profesor a validar
        $profesor = $request->toArray();

        foreach ($profesor['profesor'] as $id => $value) {

            // Comprobamos si el profesor se encuentra validado o no
            $verifiedTeacher = $this->verifiedTeacher($value);

            // Si no esta validado insertamos en la tabla su id junto al del
            // admin que lo ha validado
            if(!$verifiedTeacher){

                \DB::table('verifiedTeachers')->insert([
                    'teacher_id' => $value,
                    'admin_id' => \Auth::user()->id,
                    'created_at' => date('YmdHms')
                ]);

            }

        }

        return \Redirect::to('administrador/notificaciones/profesores');

    } // postTeacherNotification()

    /**
     * Metodo que obtiene todos los profesores validados por los admin
     * y los muestra en una tabla, si recibe el parametro de busqueda los filtrara
     * @return view Vista en la que se listan los profesores
     */
    public function getVerifiedTeacher()
    {
        // Url de buscador
        $urlSearch = config('routes.admin.allVerifiedTeachers');

        // Url para borrar profesores
        $urlDelete = config('routes.admin.destroyTeacher');

        // Variable de zona
        $zona = config('zona.admitidos.profesor');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedTeacherStudent');

        // Obtenemos todos los profesores validados
        $validTeacher = $this->validTeacher();

        // Convertimos el objeto devuelto en un array
        $validTeacher = array_column($validTeacher, 'teacher_id');

        // Obtenemos los profesores que estan validados
        $verifiedTeacher = $this->invalidOrValidTeacher($validTeacher, $this->request);

        // Request
        $request = $this->request;

        return view('generic/verified/verifiedTeacher', compact('verifiedTeacher', 'filters', 'zona', 'urlSearch', 'urlDelete', 'request'));

    } // getVerifiedTeacher()

    /**
     * Método que lista todos los profesores que han sido borrados a la hora
     * de validarlos para restaurarlos, si recibe el parametro de busqueda los filtrara
     */
    public function getDeniedTeacher()
    {
        // Url de buscador
        $urlSearch = config('routes.admin.allDeniedTeachers');

        // Url de post
        $urlPost = config('routes.admin.restoreDeniedTeachers');

        // Variable de zona
        $zona = config('zona.denegados.profesor');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedTeacherStudent');

        // Obtenemos todos los profesores borrados
        $deniedTeacher = $this->deniedTeacher($this->request);

        // Request
        $request = $this->request;

        return view('generic/denied/deniedTeacher', compact('deniedTeacher', 'filters', 'zona', 'urlSearch', 'urlPost', 'request'));

    } // getDeniedTeacher()

    /**
     * Método que obtiene el profesor a restaurar
     * @param  DeniedTeacherRequest $request ID del profesor
     */
    public function postDeniedTeacher(DeniedTeacherRequest $request)
    {
        $this->restoreDeniedTeacher($request);

        return \Redirect::to('administrador/profesor/denegados');

    } // postDeniedTeacher()

    /**
     * Método que restaura el profesor pasado como parámetro
     * @param  $request ID del profesor
     */
    protected function restoreDeniedTeacher($request)
    {
        // Array de los profesors a validar
        $profesor = $request->toArray();

        foreach ($profesor['profesor'] as $id => $value) {

            // Comprobamos que el profesor esta borrado
            $deniedTeacher = $this->deniedOneTeacher($value);
            $user = $this->getUser($value, 'teacher');

            // Si esta borrado lo restauramos
            if ($deniedTeacher && $user) {

                $deniedTeacher->deleted_at = null;
                $user->deleted_at = null;

                $deniedTeacher->save();
                $user->save();
            }
        }

        return true;

    } // restoreDeniedTeacher()

    /**
     * Método para borrar un profesor mediante ajax, el borrado no sera definitivo
     * se hará por softdeletes
     * @param                       $id            ID del usuario a borrar
     */
    public function destroyTeacher($id)
    {
        $ajax = $this->ajaxDestroyTeacher($id);

        return response()->json($ajax);

    } // destroyTeacher()

    /**
     * Método para borrar un usuario mediante ajax un profesor, el borrado no sera definitivo
     * se hará por softdeletes
     * @param                       $id            ID del usuario a borrar
     */
    public function ajaxDestroyTeacher($id)
    {
        // Obtenemos los datos del profesor
        $destroyTeacher = Teacher::findorfail($id);

        // Obtenemos los datos de usuario
        $user = $this->getUser($id, 'teacher');

        if ($destroyTeacher->deleted_at == null && $user->deleted_at == null) {

            // Borramos el profesor con su usuario
            $destroyTeacher->deleted_at = date('YmdHms');

            $user->deleted_at = date('YmdHms');

            $destroyTeacher->save();

            $user->save();

            // Devolvemos un mensaje a la vista
            $message = 'El usuario de ha borrado correctamente';
            $status = 'success';

            if($destroyTeacher->deleted_at != null && $user->deleted_at != null){
                return $ajax = [
                    'id'      => $destroyTeacher->id,
                    'message' => $message,
                    'status'  => $status
                ];
            }


        } else {

            // Devolvemos un mensaje a la vista
            $message = 'No se ha podido borrar el usuario, por favor intentelo mas tarde';
            $status = 'fail';


            return $ajax = [
                'id'      => $destroyTeacher->id,
                'message' => $message,
                'status'  => $status
            ];


        }


    } // ajaxDestroyTeacher()

    public function changeTeacherRol($idTeacher)
    {
        $teacher = User::join('teachers', 'teachers.user_id', '=', 'users.id')
                            ->where('teachers.id', '=', $idTeacher)
                            ->first();

        if ($teacher->rol != 'administrador') {

            $teacher->rol = 'administrador';
            $teacher->save();

            Session::flash('message_Success', 'El profesor ' . $teacher->firstName . ' ' . $teacher->lastName . ' ahora es administrador');
            return \Redirect::back();
        }

        Session::flash('message_Negative', 'No hemos podido atender su peticion, por favor intentelo mas tarde');
        return \Redirect::back();

    } // changeTeacherRol()

    /*
    |---------------------------------------------------------------------------|
    | ESTUDIANTES -> Validacion, listado, borrado y restauracion.               |
    |---------------------------------------------------------------------------|
    |                                                                           |
    | En esta seccion tendremos:                                                |
    |       -> Validacion de todos los estudiantes                              |
    |       -> Listado de todos los estudiantes validados en la aplicacion      |
    |       -> Borrado de estudiantes con softDeletes                           |
    |       -> Restauracion de estudiantes "borrados" mediante softDeletes      |
    |                                                                           |
    */

    /**
     * Metodo que obtiene los estudiantes, si recibe el parametro de busqueda los filtrara
     * @return  view        vista en la que el admin validara a los estudiantes
     * @return  estudiante  Todos los datos de los estudiantes no validados
     */
    public function getStudentNotification()
    {
        // Url de buscador
        $urlSearch = config('routes.admin.studentNotification');

        // Url de post
        $urlPost = config('routes.admin.studentValidNotification');

        // Url para borrar estudiantes
        $urlDelete = config('routes.admin.destroyStudent');

        // Variale de zona
        $zona = config('zona.notificaciones.estudiante');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedTeacherStudent');

        // Obtenemos todos los estudiantes validados
        $validStudent = $this->validStudent();

        // Obtenemos todos los estudiantes que no estan validados
        $notValidateStudents = Student::select('students.id')
                                        ->whereNotIn('students.id', array_column($validStudent, 'student_id'))
                                        ->get();

        // Obtenemos los estudiantes que no estan validados
        $invalidStudent = $this->invalidOrValidStudent($notValidateStudents, $this->request);

        // Request
        $request = $this->request;

        return view('generic/notification/studentNotification', compact('invalidStudent', 'filters', 'zona', 'urlSearch', 'urlPost', 'urlDelete', 'request'));

    } // getStudentNotification()

    /**
     * Metodo que Valida los estudiantes y que admin lo ha validado
     * @return  view        redireccion a la vista en la que el admin validara a los estudiantes
     *
     */
    public function postStudentNotification(StudentNotificationRequest $request)
    {

        Parent::insertValidateStudent($request);

        return \Redirect::to('administrador/notificaciones/estudiantes');

    } // postStudentNotification()

    /**
     * Metodo que obtiene todos los estudiantes validados y los muestra en una tabla, 
     * si recibe el parametro de busqueda los filtrara
     * @return view Vista en la que se listan los estudiantes
     */
    public function getVerifiedStudent()
    {
        // Url de buscador
        $urlSearch = config('routes.admin.allVerifiedStudents');

        // Url para borrar estudiantes
        $urlDelete = config('routes.admin.destroyStudent');

        // Variale de zona
        $zona = config('zona.admitidos.estudiante');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedTeacherStudent');

        // Obtenemos todos los estudiantes validados
        $validStudent = $this->validStudent();

        // Convertimos el objeto devuelto en un array
        $validStudent = array_column($validStudent, 'student_id');

        // Obtenemos los estudiantes que estan validados
        $verifiedStudent = $this->invalidOrValidStudent($validStudent, $this->request);

        // Request
        $request = $this->request;

        return view('generic/verified/verifiedStudent', compact('verifiedStudent', 'filters', 'zona', 'urlSearch', 'urlDelete', 'request'));

    } // getVerifiedStudent()

    /**
     * Método que lista todos los estudiantes que han sido borrados a la hora
     * de validarlos para restaurarlos, si recibe el parametro de busqueda los filtrara
     */
    public function getDeniedStudent()
    {
        // Url de buscador
        $urlSearch = config('routes.admin.allDeniedStudents');

        // Url de post
        $urlPost = config('routes.admin.restoreDeniedStudents');

        // Variale de zona
        $zona = config('zona.denegados.estudiante');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedTeacherStudent');

        // Obtenemos todos los estudiantes borrados segun la familia profesional del profesor
        $deniedStudent = $this->deniedStudent($this->request);

        // Request
        $request = $this->request;

        return view('generic/denied/deniedStudent', compact('deniedStudent', 'filters', 'zona', 'urlSearch', 'urlPost', 'request'));

    } // getDeniedStudent()

    /**
     * Método que obtiene el estudiante a restaurar
     * @param  DeniedStudentRequest $request ID del estudiante
     */
    public function postDeniedStudent(DeniedStudentRequest $request)
    {
        Parent::restoreDeniedStudent($request);

        return \Redirect::to('administrador/estudiante/denegados');

    } // postDeniedStudent()

    /**
     * Método para borrar una notificacion de estudiante mediante ajax, el borrado no sera definitivo
     * se hará por softdeletes
     * @param                       $id            ID del usuario a borrar
     */
    public function destroyStudent($id)
    {
        $ajax = Parent::ajaxDestroyStudent($id);

        return response()->json($ajax);

    } // destroyStudentNotification()

    /*
    |---------------------------------------------------------------------------|
    | OFERTAS -> Validacion, listado, borrado y restauracion.                   |
    |---------------------------------------------------------------------------|
    |                                                                           |
    | En esta seccion tendremos:                                                |
    |       -> Validacion de todas las ofertas                                  |
    |       -> Listado de todas las ofertas validadas en la aplicacion          |
    |       -> "Borrado" de las ofertas con softDeletes                         |
    |       -> Restauracion de las ofertas "borradas" mediante softDeletes      |
    |                                                                           |
    */

   /**
     * Metodo que obtiene las ofertas, si recibe el parametro de busqueda los filtrara
     * @return  view        vista en la que el admin validara las ofertas
     * @return  ofertas     Todos los datos de las ofertas no validadas
     */
    public function getOfferNotification()
    {
        // Url de buscador
        $urlSearch = config('routes.admin.offerNotification');

        // Url de post
        $urlPost = config('routes.admin.offerValidNotification');

        // Url para borrar ofertas de trabajo
        $urlDelete = config('routes.admin.destroyOffer');

        // Variale de zona
        $zona = config('zona.notificaciones.empresa');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedOffers');

        // Obtenemos todas las ofertas validadas
        $validOffer = $this->validOffer();

        // Obtenemos todas las ofertas que no estan validadas
        $notValidateOffers = JobOffer::select('jobOffers.id')
                                        ->whereNotIn('jobOffers.id', array_column($validOffer, 'jobOffer_id'))
                                        ->get();

        // Obtenemos las ofertas que no estan validadas
        $invalidOffer = $this->invalidOrValidOffer($notValidateOffers, $this->request);

        // Request
        $request = $this->request;

        return view('generic/notification/offerNotification', compact('invalidOffer', 'filters', 'zona', 'urlSearch', 'urlPost', 'urlDelete', 'request'));

    } // getOfferNotification()

    /**
     * Metodo que Valida las ofertas y que admin lo ha validado
     * @return  view        redireccion a la vista en la que el admin validara las ofertas
     *
     */
    public function postOfferNotification(OfferNotificationRequest $request)
    {

        Parent::insertValidateOffer($request);

        return \Redirect::to('administrador/notificaciones/ofertas');

    } // postOfferNotification()

    /**
     * Metodo que obtiene todas las ofertas validadas y las muestra, si recibe el parametro de busqueda los filtrara
     * @return view Vista en la que se listan las ofertas
     */
    public function getVerifiedOffer()
    {
        // Url de buscador
        $urlSearch = config('routes.admin.allVerifiedOffers');

        // Variale de zona
        $zona = config('zona.admitidos.empresa');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedOffers');

        // Obtenemos todas las ofertas validadas
        $validOffer = $this->validOffer();

        // Convertimos el objeto devuelto en un array
        $validOffer = array_column($validOffer, 'jobOffer_id');

        // Obtenemos llas ofertas que estan validados
        $verifiedOffer = $this->invalidOrValidOffer($validOffer, $this->request, null, true);

        // Obtenemos los tags de la oferta
        $offerTag = $this->offerTag($validOffer);

        // Obtenemos el numero de subscripciones a la oferta
        $studentsSubcriptions = $this->studentsSubscriptions($validOffer);

        // Añadimos las suscripciones
        $verifiedOffer = $this->arrayMap($verifiedOffer, $studentsSubcriptions, 'subcription');

        // Añadimos los tags
        $verifiedOffer = $this->arrayMap($verifiedOffer, $offerTag, 'tag');

        // Request
        $request = $this->request;

        return view('generic/verified/verifiedOffer', compact('verifiedOffer', 'filters', 'zona', 'urlSearch', 'request'));

    } // getVerifiedOffer()

    /**
     * Método que lista todas las ofertas que han sido borrados a la hora
     * de validarlas para restaurarlas, si recibe el parametro de busqueda los filtrara
     */
    public function getDeniedOffer()
    {
        // Url de buscador
        $urlSearch = config('routes.admin.allDeniedOffers');

        // Url de post
        $urlPost = config('routes.admin.restoreDeniedOffers');

        // Variale de zona
        $zona = config('zona.denegados.empresa');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedOffers');

        // Obtenemos todas las ofertas borradas
        $deniedOffer = $this->deniedOffer($this->request);

        // Request
        $request = $this->request;

        return view('generic/denied/deniedOffer', compact('deniedOffer', 'filters', 'zona', 'urlSearch', 'urlPost', 'request'));

    } // getDeniedOffer()

    /**
     * Método que obtiene la oferta a restaurar
     * @param  DeniedOfferRequest $request ID de la oferta
     */
    public function postDeniedOffer(DeniedOfferRequest $request)
    {
        Parent::restoreDeniedOffer($request);

        return \Redirect::to('administrador/oferta/denegadas');

    } // postDeniedStudent()

    /**
     * Método para borrar una notificacion de oferta mediante ajax, el borrado no sera definitivo
     * se hará por softdeletes
     * @param                       $id            ID del usuario a borrar
     */
    public function destroyOffer($id)
    {
        $ajax = Parent::ajaxDestroyOffer($id);

        return response()->json($ajax);

    } // destroyOfferNotification()

    /*
    |---------------------------------------------------------------------------|
    | EMPRESAS -> Listado, borrado y restauracion.                              |
    |---------------------------------------------------------------------------|
    |                                                                           |
    | En esta seccion tendremos:                                                |
    |       -> Listado de todas las empresas validadas en la aplicacion         |
    |       -> "Borrado" de las empresas con softDeletes                        |
    |       -> Restauracion de las empresas "borradas" mediante softDeletes     |
    |                                                                           |
    */
   
   /**
     * Metodo que obtiene todas las ofertas validadas y las muestra, si recibe el parametro de busqueda los filtrara
     * @return view Vista en la que se listan las ofertas
     */
    public function getVerifiedEnterprise()
    {
        // Url de buscador
        $urlSearch = config('routes.admin.allVerifiedEnterprises');

        // Url para borrar la empresa
        $urlDelete = config('routes.admin.destroyEnterprise');

        // Variale de zona
        $zona = config('zona.admitidos.empresa');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedEnterprises');

        // Obtenemos todas las empresas registradas
        $verifiedEnterprise = $this->verifiedEnterprise($this->request);

        // Request
        $request = $this->request;

        return view('generic/verified/verifiedEnterprise', compact('verifiedEnterprise', 'filters', 'zona', 'urlSearch', 'urlDelete', 'request'));

    } // getVerifiedEnterprise()

    /**
     * Método que lista todas las enpresas que han sido borrados a la hora
     * de validarlas para restaurarlas, si recibe el parametro de busqueda los filtrara
     */
    public function getDeniedEnterprise()
    {
        // Url de buscador
        $urlSearch = config('routes.admin.allDeniedEnterprises');

        // Url de post
        $urlPost = config('routes.admin.restoreDeniedEnterprises');

        // Variale de zona
        $zona = config('zona.denegados.empresa');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedEnterprises');

        // Obtenemos todas las enpresas borradas
        $deniedEnterprise = $this->deniedEnterprise($this->request);

        // Request
        $request = $this->request;

        return view('generic/denied/deniedEnterprise', compact('deniedEnterprise', 'filters', 'zona', 'urlSearch', 'urlPost', 'request'));

    } // getDeniedEnterprise()

    /**
     * Método que obtiene la empresa a restaurar
     * @param  DeniedEnterpriseRequest $request ID de la empresa
     */
    public function postDeniedEnterprise(DeniedEnterpriseRequest $request)
    {
        $this->restoreDeniedEnterprise($request);

        return \Redirect::to('administrador/empresa/denegadas');

    } // postDeniedStudent()

    /**
     * Método que restaura la empresa pasado como parámetro
     * @param  $request ID de la empresa
     */
    protected function restoreDeniedEnterprise($request)
    {
        // Array de los empresas a validar
        $empresa = $request->toArray();

        foreach ($empresa['empresa'] as $id => $value) {

            // Comprobamos que la empresa esta borrado
            $deniedEnterprise = $this->deniedOneEnterprise($value);
            $user = $this->getUser($value, 'enterprise');

            // Si esta borrado lo restauramos
            if ($deniedEnterprise && $user) {

                $deniedEnterprise->deleted_at = null;
                $user->deleted_at = null;

                $deniedEnterprise->save();
                $user->save();
            }
        }

        return true;

    } // restoreDeniedEnterprise()

    /**
     * Método para borrar una empresa verificada mediante ajax, el borrado no sera definitivo
     * se hará por softdeletes
     * @param                       $id            ID del usuario a borrar
     */
    public function destroyEnterprise($id)
    {
        $ajax = $this->ajaxDestroyEnterprise($id);

        return response()->json($ajax);

    } // destroyVerifiedEnterprise()

    /**
     * Método para borrar un usuario mediante ajax una empresa, el borrado no sera definitivo
     * se hará por softdeletes
     * @param                       $id            ID del usuario a borrar
     */
    public function ajaxDestroyEnterprise($id)
    {
        // Obtenemos los datos del profesor
        $destroyEnterprise = Enterprise::findorfail($id);

        // Obtenemos los datos de usuario
        $user = $this->getUser($id, 'enterprise');

        if ($destroyEnterprise->deleted_at == null && $user->deleted_at == null) {

            // Borramos la empresa con su usuario
            $destroyEnterprise->deleted_at = date('YmdHms');

            $user->deleted_at = date('YmdHms');

            $destroyEnterprise->save();

            $user->save();

            // Devolvemos un mensaje a la vista
            $message = 'La empresa de ha borrado correctamente';
            $status = 'success';

            if($destroyEnterprise->deleted_at != null && $user->deleted_at != null){
                return $ajax = [
                    'id'      => $destroyEnterprise->id,
                    'message' => $message,
                    'status'  => $status
                ];
            }


        } else {

            // Devolvemos un mensaje a la vista
            $message = 'No se ha podido borrar la empresa, por favor intentelo mas tarde';
            $status = 'fail';


            return $ajax = [
                'id'      => $destroyEnterprise->id,
                'message' => $message,
                'status'  => $status
            ];


        }


    } // ajaxDestroyEnterprise()

}
