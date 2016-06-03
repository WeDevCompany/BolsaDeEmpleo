<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfFamiliesController;
use App\Http\Controllers\CyclesController;
use App\Http\Requests;
use App\JobOffer;
use App\Student;
use App\Teacher;
use App\User;
use App\Http\Requests\StudentNotificationRequest;
use App\Http\Requests\OfferNotificationRequest;
use App\Http\Requests\DeniedStudentRequest;
use App\Http\Requests\DeniedOfferRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
//use Illuminate\Support\Collection as Collection;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\EmailController;

class TeachersController extends UsersController
{

    public function __construct(Request $request)
    {
        Parent::__construct($request);
        $this->rules += [
            'firstName' => 'required|between:2,45|regex:/^[A-Za-z0-9 ]+$/',
            'lastName' => 'required|between:2,75|regex:/^[A-Za-z0-9 ]+$/',
            'dni' => 'required|min:9|unique:teachers,dni|dni',
            'phone' => 'required|digits_between:9,13',
        ];
        $this->rol = 'profesor';
        $this->redirectTo = "/profesor";

    }

    protected function store()
    {
        // Comenzamos la transaccion.
        \DB::beginTransaction();

        $user = Parent::store();

        if($user === false){
            \DB::rollBack();
            Session::flash('message_Negative', 'En estos momentos no podemos llevar a cabo su registro. Por favor intentelo de nuevo más tarde.');
        } else {

            // Llamo al metodo para crear el profesor.
            $insercion = Self::create();

            if($insercion === true){

                // Llamo al metodo sendEmail del controlador de las familias profesionales
                $email = Parent::sendEmail();

                if($email === true) {
                    \DB::commit();
                    Session::flash('message_Success', 'Se ha registrado correctamente.');
                    return \Redirect::to('login');
                } else {
                    \DB::rollBack();
                    Session::flash('message_Negative', 'En estos momentos no podemos llevar a cabo su registro. Por favor intentelo de nuevo más tarde.');
                }
            } else {
                \DB::rollBack();
                Session::flash('message_Negative', 'En estos momentos no podemos llevar a cabo su registro. Por favor intentelo de nuevo más tarde.');
            }
        }

        // Redireccionamos a la vista de validacion del email. (index provisional).
        return redirect()->route('profesor..index');
    } // store()

    private function create()
    {
        $data = $this->request->all();

        try {
            $insercion = Teacher::create([
                'firstName' => $data['firstName'],
                'lastName' => $data['lastName'],
                'dni' => $data['dni'],
                'phone' => $data['phone'],
                'user_id' => $data['user_id'],
                'created_at' => date('YmdHms'),
            ]);
        } catch(\PDOException $e){
            //dd($e);
            abort(500);
        }

        if(isset($insercion)){
            return true;
        }
        return false;
    } // create()

    public function imagenPerfil()
    {
        return view(config('appViews.perfil'));
    } // imagenPerfil()

    public function uploadImage()
    {
        //$this->validate($this->request, $this->rules_image);
        Parent::uploadImage();
        return \Redirect::to('profesor/perfil');
    }

    /*
    |---------------------------------------------------------------------------|
    | ESTUDIANTES -> Validacion, listado, borrado y restauracion.               |
    |---------------------------------------------------------------------------|
    |                                                                           |
    | En esta seccion tendremos:                                                |
    |       -> Validacion de los estudiantes segun la familia profesional       |
    |           del profesor logueado actualmente                               |
    |       -> Listado de los estudiantes validados en la aplicacion filtrados  |
    |           por la familia profesional del profesor logueado                |
    |       -> "Borrado" de estudiantes con softDeletes segun la familia        |
    |           profesional del profesor logueado actualmente                   |
    |       -> Restauracion de estudiantes "borrados" mediante softDeletes      |
    |           segun la familia profesional del profesor logueado actualmente  |
    |                                                                           |
    */

    /**
     * Metodo que obtiene los estudiantes
     * @return  view        vista en la que el profesor validara a los estudiantes
     * @return  estudiante  Todos los datos de los estudiantes no validados
     */
    public function getStudentNotification()
    {
        // Url de buscador
        $urlSearch = config('routes.teacher.studentSearchNotification');

        // Url de post
        $urlPost = config('routes.teacher.studentValidNotification');

        // Url para borrar estudiantes
        $urlDelete = config('routes.teacher.destroyStudent');

        // Variale de zona
        $zona = config('zona.notificaciones.estudiante');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedTeacherStudent');

        // Obtenemos todos los estudiantes validados
        $validStudent = $this->search->validStudent();

        // Obtenemos todos los estudiantes que no estan validados
        $notValidateStudents = Student::select('students.id')
                                        ->whereNotIn('students.id', array_column($validStudent, 'student_id'))
                                        ->get();

        // Obtenemos las familias profesionales del profesor
        $profFamilyTeacher = $this->search->profFamilyTeacher();

        // Convertimos el objeto devuelto en un array
        $profFamilyValidate = array_column($profFamilyTeacher->toArray(), 'name');

        // Obtenemos los estudiantes que no estan validados en base a la familia profesional
        // del profesor
        $invalidStudent = $this->search->invalidOrValidStudent($notValidateStudents, $this->request, $profFamilyValidate);

        // Si recibimos request es porque queremos filtrar por buscador
        if (!empty($this->request->toArray())) {

            return $invalidStudent;
        }

        return view('generic/notification/studentNotification', compact('invalidStudent', 'filters', 'zona', 'urlSearch', 'urlPost', 'urlDelete'));

    } // getStudentNotification()

    /**
     * Metodo que Valida los estudiantes y que profesor lo ha validado
     * @return  view        redireccion a la vista en la que el profesor validara a los estudiantes
     *
     */
    public function postStudentNotification(StudentNotificationRequest $request)
    {
        $this->insertValidateStudent($request);

        return \Redirect::to('profesor/notificaciones/estudiantes');

    } // postStudentNotification()

    // Metodo que inserta los estudiantes validados por un profesor
    public function insertValidateStudent($request)
    {
        // Array de los estudiantes a validar
        $estudiante = $request->toArray();

        foreach ($estudiante['estudiante'] as $id => $value) {

            // Comprobamos si el alumno se encuentra validado o no
            $verifiedStudent = $this->search->verifiedStudent($value);

            // Si no esta validado insertamos en la tabla su id junto al del
            // profesor que lo ha validado
            if(!$verifiedStudent){

                \DB::table('verifiedStudents')->insert([
                    'student_id' => $value,
                    'teacher_id' => \Auth::user()->id,
                    'created_at' => date('YmdHms')
                ]);

            }

        }

        return true;

    } // insertValidateStudent()

    /**
     * Metodo que se encarga de filtrar los estudiantes a validar con un buscador
     * @return view Vista con los estudiantes a validar filtrados por el buscador
     */
    public function postSearchStudentNotification()
    {
        // Url de buscador
        $urlSearch = config('routes.teacher.studentSearchNotification');

        // Url de post
        $urlPost = config('routes.teacher.studentValidNotification');

        // Url para borrar profesores
        $urlDelete = config('routes.teacher.destroyStudent');

        // Variale de zona
        $zona = config('zona.notificaciones.estudiante');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedTeacherStudent');

        // Obtenemos los estudiantes filtrados por el buscador
        $invalidStudent = $this->getStudentNotification();

        return view('generic/notification/studentNotification', compact('invalidStudent', 'filters', 'zona', 'urlSearch', 'urlPost', 'urlDelete'));

    } // postSearchStudentNotification()

    /**
     * Metodo que obtiene todos los estudiantes validados, filtrados por la rama
     * profesional del profesor logueado, y los muestra en una tabla
     * @return view Vista en la que se listan los estudiantes
     */
    public function getVerifiedStudent()
    {
        // Url de buscador
        $urlSearch = config('routes.teacher.allVerifiedStudentsSearch');

        // Variale de zona
        $zona = config('zona.admitidos.estudiante');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedTeacherStudent');

        // Obtenemos las familias profesionales del profesor
        $profFamilyTeacher = $this->search->profFamilyTeacher();

        // Convertimos el objeto devuelto en un array
        $profFamilyValidate = array_column($profFamilyTeacher->toArray(), 'name');

        // Obtenemos todos los estudiantes validados
        $validStudent = $this->search->validStudent();

        // Convertimos el objeto devuelto en un array
        $validStudent = array_column($validStudent, 'student_id');

        // Obtenemos los estudiantes que estan validados
        $verifiedStudent = $this->search->invalidOrValidStudent($validStudent, $this->request, $profFamilyValidate);

        // Si recibimos request es porque queremos filtrar por buscador
        if (!empty($this->request->toArray())) {

            return $verifiedStudent;
        }

        return view('generic/verified/verifiedStudent', compact('verifiedStudent', 'filters', 'zona', 'urlSearch'));

    } // getVerifiedStudent()

    /**
     * Metodo que se encarga de filtrar los estudiantes dados de alta con un buscador
     * @return view Vista con los estudiantes validados filtrados por el buscador
     */
    public function postSearchVerifiedStudent()
    {
        // Url de buscador
        $urlSearch = config('routes.teacher.allVerifiedStudentsSearch');

        // Variale de zona
        $zona = config('zona.admitidos.estudiante');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedTeacherStudent');

        $verifiedStudent = $this->getVerifiedStudent();

        return view('generic/verified/verifiedStudent', compact('verifiedStudent', 'filters', 'zona', 'urlSearch'));

    } // postSearchVerifiedStudent()

    /**
     * Método que lista todos los estudiantes que han sido borrados a la hora
     * de validarlos para restaurarlos, se mostraran en base a la familia profesional
     * del profesor
     */
    public function getDeniedStudent()
    {
        // Url de buscador
        $urlSearch = config('routes.teacher.allDeniedStudentsSearch');

        // Url de post
        $urlPost = config('routes.teacher.restoreDeniedStudents');

        // Variale de zona
        $zona = config('zona.denegados.estudiante');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedTeacherStudent');

        // Obtenemos las familias profesionales del profesor
        $profFamilyTeacher = $this->search->profFamilyTeacher();

        // Convertimos el objeto devuelto en un array
        $profFamilyValidate = array_column($profFamilyTeacher->toArray(), 'name');

        // Obtenemos todos los estudiantes borrados segun la familia profesional del profesor
        $deniedStudent = $this->search->deniedStudent($this->request, $profFamilyValidate);

        // Si recibimos request es porque queremos filtrar por buscador
        if (!empty($this->request->toArray())) {

            return $deniedStudent;
        }

        return view('generic/denied/deniedStudent', compact('deniedStudent', 'filters', 'zona', 'urlSearch', 'urlPost'));

    } // getDeniedStudent()

    /**
     * Método que obtiene el estudiante a restaurar
     * @param  DeniedStudentRequest $request ID del estudiante
     */
    public function postDeniedStudent(DeniedStudentRequest $request)
    {
        $this->restoreDeniedStudent($request);

        return \Redirect::to('profesor/estudiante/denegados');

    } // postDeniedStudent()

    /**
     * Método que restaura el estudiante pasado como parámetro
     * @param  $request ID del estudiante
     */
    protected function restoreDeniedStudent($request)
    {
        // Array de los estudiantes a validar
        $estudiante = $request->toArray();

        foreach ($estudiante['estudiante'] as $id => $value) {

            // Comprobamos que el estudiante esta borrado
            $deniedStudent = $this->search->deniedOneStudent($value);
            $user = $this->search->getUser($value, 'student');

            // Si esta borrado lo restauramos
            if ($deniedStudent && $user) {

                $deniedStudent->deleted_at = null;
                $user->deleted_at = null;

                $deniedStudent->save();
                $user->save();
            }


        }

        return true;

    } // restoreDeniedStudent()

    /**
     * Metodo que se encarga de filtrar los estudiantes borrados con un buscador
     */
    public function postSearchDeniedStudent()
    {
        // Url de buscador
        $urlSearch = config('routes.teacher.allDeniedStudentsSearch');

        // Url de post
        $urlPost = config('routes.teacher.restoreDeniedStudents');

        // Variale de zona
        $zona = config('zona.denegados.estudiante');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedTeacherStudent');

        $deniedStudent = $this->getDeniedStudent();

        return view('generic/denied/deniedStudent', compact('deniedStudent', 'filters', 'zona', 'urlSearch', 'urlPost'));

    } // postSearchDeniedStudent()

    /**
     * Método para borrar una notificacion de estudiante mediante ajax, el borrado no sera definitivo
     * se hará por softdeletes
     * @param                       $id            ID del usuario a borrar
     */
    public function destroyStudent($id)
    {
        $ajax = $this->ajaxDestroyStudent($id);

        return response()->json($ajax);

    } // destroyStudentNotification()

    /**
     * Método para borrar mediante ajax un estudiante, el borrado no sera definitivo
     * se hará por softdeletes
     * @param                       $id            ID del usuario a borrar
     */
    public function ajaxDestroyStudent($id)
    {
        // Obtenemos los datos del estudiante
        $destroyStudent = Student::findorfail($id);

        // Obtenemos los datos de usuario
        $user = $this->search->getUser($id, 'student');

        if ($destroyStudent->deleted_at == null && $user->deleted_at == null) {

            // Borramos los estudiantes y su usuario
            $destroyStudent->deleted_at = date('YmdHms');

            $user->deleted_at = date('YmdHms');

            $destroyStudent->save();

            $user->save();

            // Devolvemos un mensaje a la vista
            $message = 'El usuario de ha borrado correctamente';
            $status = 'success';

            if($destroyStudent->deleted_at != null && $user->deleted_at != null){
                return $ajax = [
                    'id'      => $destroyStudent->id,
                    'message' => $message,
                    'status'  => $status
                ];
            }


        } else {

            // Devolvemos un mensaje a la vista
            $message = 'No se ha podido borrar el usuario, por favor intentelo mas tarde';
            $status = 'fail';


            return $ajax = [
                'id'      => $destroyStudent->id,
                'message' => $message,
                'status'  => $status
            ];


        }

    } // ajaxDestroyStudent()

    /*
    |---------------------------------------------------------------------------|
    | OFERTAS -> Validacion, listado, borrado y restauracion.                   |
    |---------------------------------------------------------------------------|
    |                                                                           |
    | En esta seccion tendremos:                                                |
    |       -> Validacion de las ofertas segun la familia profesional           |
    |           del profesor logueado actualmente                               |
    |       -> Listado de las ofertas validadas en la aplicacion filtrados      |
    |           por la familia profesional del profesor logueado                |
    |       -> "Borrado" de las ofertas con softDeletes segun la familia        |
    |           profesional del profesor logueado actualmente                   |
    |       -> Restauracion de las ofertas "borradas" mediante softDeletes      |
    |           segun la familia profesional del profesor logueado actualmente  |
    |                                                                           |
    */

    /**
     * Metodo que obtiene las ofertas
     * @return  view        vista en la que el profesor validara las ofertas
     * @return  estudiante  Todos los datos de las ofertas no validadas
     */
    public function getOfferNotification()
    {
        // Url de buscador
        $urlSearch = config('routes.teacher.offerSearchNotification');

        // Url de post
        $urlPost = config('routes.teacher.offerValidNotification');

        // Url para borrar ofertas de trabajo
        $urlDelete = config('routes.teacher.destroyOffer');

        // Variale de zona
        $zona = config('zona.notificaciones.empresa');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedOffers');

        // Obtenemos todas las ofertas validadas
        $validOffer = $this->search->validOffer();

        // Obtenemos todas las ofertas que no estan validadas
        $notValidateOffers = JobOffer::select('jobOffers.id')
                                        ->whereNotIn('jobOffers.id', array_column($validOffer, 'jobOffer_id'))
                                        ->get();

        // Obtenemos las familias profesionales del profesor
        $profFamilyTeacher = $this->search->profFamilyTeacher();

        // Convertimos el objeto devuelto en un array
        $profFamilyValidate = array_column($profFamilyTeacher->toArray(), 'name');

        // Obtenemos las ofertas que no estan validadas en base a la familia profesional
        // del profesor
        $invalidOffer = $this->search->invalidOrValidOffer($notValidateOffers, $this->request, $profFamilyValidate);

        // Si recibimos request es porque queremos filtrar por buscador
        if (!empty($this->request->toArray())) {

            return $invalidOffer;
        }

        return view('generic/notification/offerNotification', compact('invalidOffer', 'filters', 'zona', 'urlSearch', 'urlPost', 'urlDelete'));

    } // getOfferNotification()

    /**
     * Metodo que Valida las ofertas y que profesor lo ha validado
     * @return  view        redireccion a la vista en la que el profesor validara las ofertas
     *
     */
    public function postOfferNotification(OfferNotificationRequest $request)
    {
        $this->insertValidateOffer($request);

        return \Redirect::to('profesor/notificaciones/ofertas');

    } // postOfferNotification()

    // Metodo que inserta las ofertas validadas por un profesor
    public function insertValidateOffer($request)
    {
        // Array de las ofertas a validar
        $oferta = $request->toArray();

        foreach ($oferta['oferta'] as $id => $value) {

            // Comprobamos si el alumno se encuentra validado o no
            $verifiedOffer = $this->search->verifiedOffer($value);

            // Si no esta validado insertamos en la tabla su id junto al del
            // profesor que lo ha validado
            if(!$verifiedOffer){

                \DB::table('verifiedOffers')->insert([
                    'jobOffer_id' => $value,
                    'teacher_id' => \Auth::user()->id,
                    'created_at' => date('YmdHms')
                ]);

            }

        }

        return true;

    } // insertValidateOffer()

    /**
     * Metodo que se encarga de filtrar las ofertas a validar con un buscador
     * @return view Vista las ofertas a validar filtrados por el buscador
     */
    public function postSearchOfferNotification()
    {
        // Url de buscador
        $urlSearch = config('routes.teacher.offerSearchNotification');

        // Url de post
        $urlPost = config('routes.teacher.offerValidNotification');

        // Url para borrar ofertas de trabajo
        $urlDelete = config('routes.teacher.destroyOffer');

        // Variale de zona
        $zona = config('zona.notificaciones.empresa');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedOffers');

        $invalidOffer = $this->getOfferNotification();

        return view('generic/notification/offerNotification', compact('invalidOffer', 'filters', 'zona', 'urlSearch', 'urlPost', 'urlDelete'));

    } // postSearchOfferNotification()

    /**
     * Metodo que obtiene todas las ofertas validadas, filtradas por la rama
     * profesional del profesor logueado, y los muestra
     * @return view Vista en la que se listan las ofertas
     */
    public function getVerifiedOffer()
    {
        // Url de buscador
        $urlSearch = config('routes.teacher.allVerifiedOffersSearch');

        // Url para borrar ofertas de trabajo
        $urlDelete = config('routes.teacher.destroyOffer');

        // Variale de zona
        $zona = config('zona.admitidos.empresa');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedOffers');

        // Obtenemos las familias profesionales del profesor
        $profFamilyTeacher = $this->search->profFamilyTeacher();

        // Convertimos el objeto devuelto en un array
        $profFamilyValidate = array_column($profFamilyTeacher->toArray(), 'name');

        // Obtenemos todas las ofertas validadas
        $validOffer = $this->search->validOffer();

        // Convertimos el objeto devuelto en un array
        $validOffer = array_column($validOffer, 'jobOffer_id');

        // Obtenemos los estudiantes que estan validados
        $verifiedOffer = $this->search->invalidOrValidOffer($validOffer, $this->request, $profFamilyValidate, true);

        // Añadimos las suscripciones
        $verifiedOffer = Parent::getSubscriptions($validOffer, $verifiedOffer);

        // Añadimos los tags
        $verifiedOffer = Parent::getTags($validOffer, $verifiedOffer);

        // Si recibimos request es porque queremos filtrar por buscador
        if (!empty($this->request->toArray())) {

            return $verifiedOffer;
        }

        return view('generic/verified/verifiedOffer', compact('verifiedOffer', 'filters', 'zona', 'urlSearch', 'urlDelete'));

    } // getVerifiedOffer()

    /**
     * Metodo que se encarga de filtrar las ofertas dadas de alta con un buscador
     * @return view Vista con las ofertas validadas filtradas por el buscador
     */
    public function postSearchVerifiedOffer()
    {
        // Url de buscador
        $urlSearch = config('routes.teacher.allVerifiedOffersSearch');

        // Url para borrar ofertas de trabajo
        $urlDelete = config('routes.teacher.destroyOffer');

        // Variale de zona
        $zona = config('zona.admitidos.empresa');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedOffers');

        $verifiedOffer = $this->getVerifiedOffer();

        return view('generic/verified/verifiedOffer', compact('verifiedOffer', 'filters', 'zona', 'urlSearch', 'urlDelete'));

    } // postSearchVerifiedOffer()

    /**
     * Método que lista todas las ofertas que han sido borrados a la hora
     * de validarlas para restaurarlas, se mostraran en base a la familia profesional
     * del profesor
     */
    public function getDeniedOffer()
    {
        // Url de buscador
        $urlSearch = config('routes.teacher.allDeniedOffersSearch');

        // Url de post
        $urlPost = config('routes.teacher.restoreDeniedOffers');

        // Variale de zona
        $zona = config('zona.denegados.empresa');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedOffers');

        // Obtenemos las familias profesionales del profesor
        $profFamilyTeacher = $this->search->profFamilyTeacher();

        // Convertimos el objeto devuelto en un array
        $profFamilyValidate = array_column($profFamilyTeacher->toArray(), 'name');

        // Obtenemos todas las ofertas borrados segun la familia profesional del profesor
        $deniedOffer = $this->search->deniedOffer($this->request, $profFamilyValidate);

        // Si recibimos request es porque queremos filtrar por buscador
        if (!empty($this->request->toArray())) {

            return $deniedOffer;
        }

        return view('generic/denied/deniedOffer', compact('deniedOffer', 'filters', 'zona', 'urlSearch', 'urlPost'));

    } // getDeniedOffer()

    /**
     * Método que obtiene la oferta a restaurar
     * @param  DeniedOfferRequest $request ID de la oferta
     */
    public function postDeniedOffer(DeniedOfferRequest $request)
    {
        $this->restoreDeniedOffer($request);

        return \Redirect::to('profesor/oferta/denegadas');

    } // postDeniedStudent()

    /**
     * Método que restaura la oferta pasada como parámetro
     * @param  $request ID de la oferta
     */
    protected function restoreDeniedOffer($request)
    {
        // Array de las ofertas a validar
        $oferta = $request->toArray();

        foreach ($oferta['oferta'] as $id => $value) {

            // Comprobamos que el oferta esta borrado
            $deniedOffer = $this->search->deniedOneOffer($value);

            // Si esta borrado lo restauramos
            if ($deniedOffer) {

                $deniedOffer->deleted_at = null;

                $deniedOffer->save();

            }

        }

        return true;

    } // restoreDeniedStudent()

    /**
     * Metodo que se encarga de filtrar las oferta borradas con un buscador
     */
    public function postSearchDeniedOffer()
    {
        // Url de buscador
        $urlSearch = config('routes.teacher.allDeniedOffersSearch');

        // Url de post
        $urlPost = config('routes.teacher.restoreDeniedOffers');

        // Variale de zona
        $zona = config('zona.denegados.empresa');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedOffers');

        $deniedOffer = $this->getDeniedOffer();

        return view('generic/denied/deniedOffer', compact('deniedOffer', 'filters', 'zona', 'urlSearch', 'urlPost'));

    } // postSearchDeniedOffer()

    /**
     * Método para borrar una notificacion de oferta mediante ajax, el borrado no sera definitivo
     * se hará por softdeletes
     * @param                       $id            ID del usuario a borrar
     */
    public function destroyOffer($id)
    {
        $ajax = $this->ajaxDestroyOffer($id);

        return response()->json($ajax);

    } // destroyOfferNotification()

    /**
     * Método para borrar mediante ajax una oferta, el borrado no sera definitivo
     * se hará por softdeletes
     * @param                       $id            ID del usuario a borrar
     */
    public function ajaxDestroyOffer($id)
    {
        // Obtenemos las ofertas de trabajo
        $destroyOffer = JobOffer::findorfail($id);

        if ($destroyOffer->deleted_at == null) {

            // Borramos la oferta de trabajo
            $destroyOffer->deleted_at = date('YmdHms');

            $destroyOffer->save();

            // Devolvemos un mensaje a la vista
            $message = 'La oferta de ha borrado correctamente';
            $status = 'success';

            if($destroyOffer->deleted_at != null){
                return $ajax = [
                    'id'      => $destroyOffer->id,
                    'message' => $message,
                    'status'  => $status
                ];
            }

        } else {

            // Devolvemos un mensaje a la vista
            $message = 'No se ha podido borrar la oferta, por favor intentelo mas tarde';
            $status = 'fail';
            return $ajax = [
                'id'      => $destroyOffer->id,
                'message' => $message,
                'status'  => $status
            ];

        }
    } // ajaxDestroyOffer()

    /**
     * Método para mostrar las ofertas de un profesor
     * se hará por softdeletes
     * @param   $id  id de la oferta de
     */
    public function getOfferById($idOffer)
    {
        // Saneamos el id que se nos pasa como parametro
        $idOffer = (int) $idOffer;
        $aux = [$idOffer];
        // comprobamos si lo que nos devuelve es un array y si este está vacio o no, en caso de estar vacio
        // se enviará un error 404
        if(is_array($this->search->validOffer($idOffer)) && !empty($this->search->validOffer($idOffer)) ){
            // Obtenemos la familia profesional a la que pertenece
            // el profesor
            $profFamilie = $this->search->profFamilyTeacher();

            // Llamamos al Search para obtener la oferta seleccionada
            $offer = $this->search->invalidOrValidOffer($aux, $this->request,$profFamilie);
            //dd($offer);
            if (isset($offer[0])) {
                $offer = (Object) $offer[0];

                // Añadimos las suscripciones
                //$offer = Parent::getSubscriptions($aux, $offer);

                // Añadimos los tags
                $offer = Parent::getTags($aux, $offer);
                // Generamos el nombre de la zona de forma dinámica para que
                // los buscadores puedan mejorar las posibilidades de indexación
                $zona = (isset($offer->title) && isset($offer->enterpriseName)) ? $offer->title ." - " . $offer->enterpriseName : "Oferta de empleo";
                //
                return view('offer.offer', compact('offer','zona'));
            } else {
                abort('404');
            }

        }
        abort('404');

    } // getOfferById()

}