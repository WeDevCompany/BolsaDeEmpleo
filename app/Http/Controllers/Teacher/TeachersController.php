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
            'family.0' => 'required|digits_between:1,10|exists:profFamilies,id',
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

            if($insercion != false){

                // Inserto la familia profesional
                $check = $this->createProfFamilie($this->request['family'], $insercion);

                if($check === false) {
                    Session::flash('message_Negative', 'Ha ocurrido un error. Intentelo de nuevo más tarde.');
                    return \Redirect::back();
                }

                // Llamo al metodo sendEmail del controlador de las familias profesionales
                $email = Parent::sendEmail();

                if($email === true) {
                    \DB::commit();
                    Session::flash('message_Success', 'Se ha registrado correctamente.');
                    return \Redirect::to('confirmacion');
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
        return \Redirect::to('registro/profesor');
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
            return $insercion;
        }
        return false;
    } // create()

    private function createProfFamilie($profFamilie_id, $teacher)
    {
        $profFamilie_id = (int) $profFamilie_id[0];

        try {
            $insercion = \DB::table('teacherProfFamilies')->insert([
                        'teacher_id' => $teacher->id,
                        'profFamilie_id' => $profFamilie_id,
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
    } // createProfFamilie()

    private function createTutor($teacher, $cycle_id, $year) {

        $cycle_id = (int) $cycle_id;
        $year = (int) $year;

        try {
            // Comprobamos que el ciclo existe y está activo
            $cycle = $this->teacherCycleId($cycle_id, true);            

            if(empty($cycle)) {
                return false;
            }

            // Compruebo si ya es tutor de ese ciclo
            $check = Teacher::join('tutors', 'tutors.teacher_id', '=', 'teachers.id')
                            ->where('tutors.dateFrom', '=', $year)
                            ->where('teachers.id', '=', $teacher->id)
                            ->where('tutors.cycle_id', '=', $cycle_id)
                            ->get()->toArray();

            if(isset($check[0]) && !empty($check[0])) {
                // Ya es tutor de este ciclo.
                return "tutor";
            } else {
                // Compruebo si tiene otro tutor
                $check = Teacher::join('tutors', 'tutors.teacher_id', '=', 'teachers.id')
                            ->where('tutors.dateFrom', '=', $year)
                            ->where('tutors.cycle_id', '=', $cycle_id)
                            ->get()->toArray();

                if(isset($check) && !empty($check)) {
                    return false;
                } else {
                    
                    $insert = null;

                    $teacher->cycles()->attach($cycle_id, [
                        'dateTo' => $year+1,
                        'dateFrom' => $year,
                        'teacher_id' => $teacher['id'],
                        'created_at' => date('YmdHms'),
                    ]);

                    // Comprobamos si la inserción ha sido correcta
                    $insert = Teacher::join('tutors', 'tutors.teacher_id', '=', 'teachers.id')
                            ->where('tutors.dateFrom', '=', $year)
                            ->where('teachers.id', '=', $teacher->id)
                            ->where('tutors.cycle_id', '=', $cycle_id)
                            ->get()->toArray();
                }
            }  

        } catch(\PDOException $e){
            //dd($e);
            abort(500);
        }

        if(isset($insert) && !empty($insert)){
            return true;
        }
        return false; 
    } // createTutor()

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
     * Metodo que obtiene los estudiantes, si recibe el parametro de busqueda los filtrara
     * @return  view        vista en la que el profesor validara a los estudiantes
     * @return  estudiante  Todos los datos de los estudiantes no validados
     */
    public function getStudentNotification()
    {
        // Url de buscador
        $urlSearch = config('routes.teacher.studentNotification');

        // Url de post
        $urlPost = config('routes.teacher.studentValidNotification');

        // Url para borrar estudiantes
        $urlDelete = config('routes.teacher.destroyStudent');

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

        // Obtenemos las familias profesionales del profesor
        $profFamilyTeacher = $this->profFamilyTeacher();

        // Convertimos el objeto devuelto en un array
        $profFamilyValidate = array_column($profFamilyTeacher->toArray(), 'name');

        // Obtenemos los estudiantes que no estan validados en base a la familia profesional
        // del profesor
        $invalidStudent = $this->invalidOrValidStudent($notValidateStudents, $this->request, $profFamilyValidate);

        // Request
        $request = $this->request;

        return view('generic/notification/studentNotification', compact('invalidStudent', 'filters', 'zona', 'urlSearch', 'urlPost', 'urlDelete', 'request'));

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
            $verifiedStudent = $this->verifiedStudent($value);

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
     * Metodo que obtiene todos los estudiantes validados, filtrados por la rama
     * profesional del profesor logueado, y los muestra en una tabla, 
     * si recibe el parametro de busqueda los filtrara
     * @return view Vista en la que se listan los estudiantes
     */
    public function getVerifiedStudent()
    {
        // Url de buscador
        $urlSearch = config('routes.teacher.allVerifiedStudents');

        // Url para borrar student
        $urlDelete = config('routes.teacher.destroyStudent');

        // Variale de zona
        $zona = config('zona.admitidos.estudiante');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedTeacherStudent');

        // Obtenemos las familias profesionales del profesor
        $profFamilyTeacher = $this->profFamilyTeacher();

        // Convertimos el objeto devuelto en un array
        $profFamilyValidate = array_column($profFamilyTeacher->toArray(), 'name');

        // Obtenemos todos los estudiantes validados
        $validStudent = $this->validStudent();

        // Convertimos el objeto devuelto en un array
        $validStudent = array_column($validStudent, 'student_id');

        // Obtenemos los estudiantes que estan validados
        $verifiedStudent = $this->invalidOrValidStudent($validStudent, $this->request, $profFamilyValidate);

        // Request
        $request = $this->request;

        return view('generic/verified/verifiedStudent', compact('verifiedStudent', 'filters', 'zona', 'urlSearch', 'urlDelete', 'request'));

    } // getVerifiedStudent()

    /**
     * Método que lista todos los estudiantes que han sido borrados a la hora
     * de validarlos para restaurarlos, se mostraran en base a la familia profesional
     * del profesor, si recibe el parametro de busqueda los filtrara
     */
    public function getDeniedStudent()
    {
        // Url de buscador
        $urlSearch = config('routes.teacher.allDeniedStudents');

        // Url de post
        $urlPost = config('routes.teacher.restoreDeniedStudents');

        // Variale de zona
        $zona = config('zona.denegados.estudiante');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedTeacherStudent');

        // Obtenemos las familias profesionales del profesor
        $profFamilyTeacher = $this->profFamilyTeacher();

        // Convertimos el objeto devuelto en un array
        $profFamilyValidate = array_column($profFamilyTeacher->toArray(), 'name');

        // Obtenemos todos los estudiantes borrados segun la familia profesional del profesor
        $deniedStudent = $this->deniedStudent($this->request, $profFamilyValidate);

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
            $deniedStudent = $this->deniedOneStudent($value);
            $user = $this->getUser($value, 'student');

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
        $user = $this->getUser($id, 'student');

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
     * Metodo que obtiene las ofertas, si recibe el parametro de busqueda los filtrara
     * @return  view        vista en la que el profesor validara las ofertas
     * @return  estudiante  Todos los datos de las ofertas no validadas
     */
    public function getOfferNotification()
    {
        // Url de buscador
        $urlSearch = config('routes.teacher.offerNotification');

        // Url de post
        $urlPost = config('routes.teacher.offerValidNotification');

        // Url para borrar ofertas de trabajo
        $urlDelete = config('routes.teacher.destroyOffer');

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

        // Obtenemos las familias profesionales del profesor
        $profFamilyTeacher = $this->profFamilyTeacher();

        // Convertimos el objeto devuelto en un array
        $profFamilyValidate = array_column($profFamilyTeacher->toArray(), 'name');

        // Obtenemos las ofertas que no estan validadas en base a la familia profesional
        // del profesor
        $invalidOffer = $this->invalidOrValidOffer($notValidateOffers, $this->request, $profFamilyValidate);

        // Request
        $request = $this->request;

        return view('generic/notification/offerNotification', compact('invalidOffer', 'filters', 'zona', 'urlSearch', 'urlPost', 'urlDelete', 'request'));

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
            $verifiedOffer = $this->verifiedOffer($value);

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
     * Metodo que obtiene todas las ofertas validadas, filtradas por la rama
     * profesional del profesor logueado, y los muestra, si recibe el parametro de busqueda los filtrara
     * @return view Vista en la que se listan las ofertas
     */
    public function getVerifiedOffer()
    {
        // Url de buscador
        $urlSearch = config('routes.teacher.allVerifiedOffers');

        // Url para borrar ofertas de trabajo
        $urlDelete = config('routes.teacher.destroyOffer');

        // Variale de zona
        $zona = config('zona.admitidos.empresa');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedOffers');

        // Obtenemos las familias profesionales del profesor
        $profFamilyTeacher = $this->profFamilyTeacher();

        // Convertimos el objeto devuelto en un array
        $profFamilyValidate = array_column($profFamilyTeacher->toArray(), 'name');

        // Obtenemos todas las ofertas validadas
        $validOffer = $this->validOffer();

        // Convertimos el objeto devuelto en un array
        $validOffer = array_column($validOffer, 'jobOffer_id');

        // Obtenemos los estudiantes que estan validados
        $verifiedOffer = $this->invalidOrValidOffer($validOffer, $this->request, $profFamilyValidate, true);

        // Añadimos las suscripciones
        $verifiedOffer = Parent::getSubscriptions($validOffer, $verifiedOffer);

        // Añadimos los tags
        $verifiedOffer = Parent::getTags($validOffer, $verifiedOffer);

        // Request
        $request = $this->request;

        return view('generic/verified/verifiedOffer', compact('verifiedOffer', 'filters', 'zona', 'urlSearch', 'urlDelete', 'request'));

    } // getVerifiedOffer()

    /**
     * Método que lista todas las ofertas que han sido borrados a la hora
     * de validarlas para restaurarlas, se mostraran en base a la familia profesional
     * del profesor, si recibe el parametro de busqueda los filtrara
     */
    public function getDeniedOffer()
    {
        // Url de buscador
        $urlSearch = config('routes.teacher.allDeniedOffers');

        // Url de post
        $urlPost = config('routes.teacher.restoreDeniedOffers');

        // Variale de zona
        $zona = config('zona.denegados.empresa');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedOffers');

        // Obtenemos las familias profesionales del profesor
        $profFamilyTeacher = $this->profFamilyTeacher();

        // Convertimos el objeto devuelto en un array
        $profFamilyValidate = array_column($profFamilyTeacher->toArray(), 'name');

        // Obtenemos todas las ofertas borrados segun la familia profesional del profesor
        $deniedOffer = $this->deniedOffer($this->request, $profFamilyValidate);

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
            $deniedOffer = $this->deniedOneOffer($value);

            // Si esta borrado lo restauramos
            if ($deniedOffer) {

                $deniedOffer->deleted_at = null;

                $deniedOffer->save();

            }

        }

        return true;

    } // restoreDeniedStudent()

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


    public function imTutor()
    {
        if(isset($_POST['yearFromId']) && isset($_POST['cycleTutor']) && isset($_POST['tutor'])) {
            $_POST['yearFromId'] = (int) trim($_POST['yearFromId']);
            $_POST['cycleTutor'] = (int) trim($_POST['cycleTutor']);
            $_POST['tutor'] = (string) trim($_POST['tutor']);

            if(empty($_POST['yearFromId']) || empty($_POST['cycleTutor']) || $_POST['tutor'] != 'tutor') {
                // Faltan los datos mínimos
                Session::flash('message_Negative', 'Ha ocurrido un error, intentelo de nuevo más tarde.');
                return \Redirect::to($this->redirectTo . '/asignaturas');
            } else {
                if($_POST['yearFromId'] <= 1990 || $_POST['yearFromId'] > date('Y')+5) {
                    // Año inválido
                    Session::flash('message_Negative', 'El año que ha enviado no es válido.');
                    return \Redirect::to($this->redirectTo . '/asignaturas');
                }

                // Obtengo los ciclos a los que tiene acceso y compruebo si tiene acceso
                $tutors = app(CyclesController::class)->posibleTutorCycles($_POST['yearFromId'], $_POST['cycleTutor']);

                if($tutors != false) {

                    try {
                        $teacher = Teacher::where('user_id', '=', \Auth::user()->id)->get();
                    } catch(\PDOException $e){
                        //dd($e);
                        abort(500);
                    }

                    // Inserto
                    $insert = $this->createTutor($teacher[0], $_POST['cycleTutor'], $_POST['yearFromId']);

                    if($insert === true) {
                        // Inserción correcta
                        Session::flash('message_Success', 'Usted ahora es tutor de ese ciclo.');
                        return \Redirect::to($this->redirectTo . '/asignaturas?cycle='. $_POST['cycleTutor'] . '&yearFrom=' . $_POST['yearFromId']);
                    } elseif($insert == "tutor") {
                        // Ya es tutor del ciclo seleccionado
                        Session::flash('message_Negative', 'Usted ya estaba asignado como tutor de este ciclo.');
                        return \Redirect::to($this->redirectTo . '/asignaturas?cycle='. $_POST['cycleTutor'] . '&yearFrom=' . $_POST['yearFromId']);
                    } elseif($insert == false) {
                        // Otro tutor
                        Session::flash('message_Negative', 'Es posible que este ciclo ya tenga otro tutor.');
                        return \Redirect::to($this->redirectTo . '/asignaturas?cycle='. $_POST['cycleTutor'] . '&yearFrom=' . $_POST['yearFromId']);
                    } else {
                        // No se ha podido insertar
                        Session::flash('message_Negative', 'Ha ocurrido un error. Trate de repetir la acción más tarde.');
                        return \Redirect::to($this->redirectTo . '/asignaturas?cycle='. $_POST['cycleTutor'] . '&yearFrom=' . $_POST['yearFromId']);
                    }
                } else {
                    // No tiene acceso al ciclo o aún no tiene asignaturas para él
                    Session::flash('message_Negative', 'Usted no tiene la posibilidad de ser tutor en este ciclo.');
                    return \Redirect::to($this->redirectTo . '/asignaturas');
                }
            }
        } else {
            // Faltan los datos mínimos
            Session::flash('message_Negative', 'Ha ocurrido un error, intentelo de nuevo más tarde.');
            return \Redirect::to($this->redirectTo . '/asignaturas');
        }
            
    } // imTutor

}