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

    protected function index()
    {
        // Llamo al metodo getAllProfFamilies del controlador de las familias profesionales
        $profFamilies = app(ProfFamiliesController::class)->getAllProfFamilies();
        $cycles = app(CyclesController::class)->getAllCycles('*', true);

        // Inicializo las variables que necesitare para los optgroups
        $basico = true;
        $medio = true;
        $superior = true;

        $zona = "Registro de profesores";
        return view('teacher.registerForm', compact('profFamilies', 'cycles', 'basico', 'medio', 'superior', 'zona'));
    } // index()

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
        return view('partials/globals/uploadImage');
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

        return view('teacher/studentNotification', compact('invalidStudent'));

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

        // Obtenemos los estudiantes filtrados por el buscador
        $invalidStudent = $this->getStudentNotification();

        return view('teacher/studentNotification', compact('invalidStudent'));

    } // postSearchStudentNotification()

    /**
     * Metodo que obtiene todos los estudiantes validados, filtrados por la rama
     * profesional del profesor logueado, y los muestra en una tabla
     * @return view Vista en la que se listan los estudiantes
     */
    public function getVerifiedStudent()
    {

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

        return view('teacher/verifiedStudent', compact('verifiedStudent'));

    } // getVerifiedStudent()

    /**
     * Metodo que se encarga de filtrar los estudiantes dados de alta con un buscador
     * @return view Vista con los estudiantes validados filtrados por el buscador
     */
    public function postSearchVerifiedStudent()
    {
        
        $verifiedStudent = $this->getVerifiedStudent();

        return view('teacher/verifiedStudent', compact('verifiedStudent'));

    } // postSearchVerifiedStudent()

    /**
     * Método que lista todos los estudiantes que han sido borrados a la hora
     * de validarlos para restaurarlos, se mostraran en base a la familia profesional
     * del profesor
     */
    public function getDeniedStudent()
    {
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

        return view('teacher/deniedStudent', compact('deniedStudent'));

    } // getDeniedStudent()

    /**
     * Método que obtiene el estudiante a restaurar
     * @param  DeniedStudentRequest $request ID del estudiante
     */
    public function postDeniedStudent(DeniedStudentRequest $request)
    {
        $this->restoreDeniedStudent($request);

        return \Redirect::to('profesor/estudiante/denegados');

    } // postDeniedStudent(

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

            // Si esta borrado lo restauramos
            if ($deniedStudent) {

                $deniedStudent->deleted_at = null;

                $deniedStudent->save();
            }


        }
    } // restoreDeniedStudent()

    /**
     * Metodo que se encarga de filtrar los estudiantes borrados con un buscador
     */
    public function postSearchDeniedStudent()
    {
        $deniedStudent = $this->getDeniedStudent();

        return view('teacher/deniedStudent', compact('deniedStudent'));

    } // postSearchDeniedStudent()

    /**
     * Método para borrar un usuario mediante ajax, el borrado no sera definitivo
     * se hará por softdeletes
     * @param                       $id            ID del usuario a borrar
     * @param  StudentNotificationRequest $request Validaciones y datos recibidos
     */
    public function destroyStudentNotification($id, StudentNotificationRequest $request)
    {
        $destroyStudent = Student::findorfail($id);

        $verifiedStudent = $this->search->verifiedStudent($id);

        
        if ($destroyStudent->deleted_at == null && !$verifiedStudent) {
            
            $destroyStudent->deleted_at = date('YmdHms');

            $destroyStudent->save();

        } else {

            $message = 'No se ha podido borrar el usuario, por favor intentelo mas tarde';
            $fail = 'fail';

            if($request->ajax()){
                return response()->json([
                    'id'      => $destroyStudent->id,
                    'message' => $message,
                    'fail'    => $fail
                ]); 
            }

        }

        return \Redirect::to('profesor/notificaciones/estudiantes');

    } // destroyStudentNotification()

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

        return view('teacher/offerNotification', compact('invalidOffer'));

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
        $invalidOffer = $this->getOfferNotification();

        return view('teacher/offerNotification', compact('invalidOffer'));

    } // postSearchOfferNotification()

    /**
     * Metodo que obtiene todas las ofertas validadas, filtradas por la rama
     * profesional del profesor logueado, y los muestra
     * @return view Vista en la que se listan las ofertas
     */
    public function getVerifiedOffer()
    {

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

        // Obtenemos los tags de la oferta
        $offerTag = $this->search->offerTag($validOffer);

        // Obtenemos el numero de subscripciones a la oferta
        $studentsSubcriptions = $this->search->studentsSubscriptions($validOffer);

        // Añadimos las suscripciones
        $verifiedOffer = $this->search->arrayMap($verifiedOffer, $studentsSubcriptions, 'subcription');

        // Añadimos los tags
        $verifiedOffer = $this->search->arrayMap($verifiedOffer, $offerTag, 'tag');

        // Si recibimos request es porque queremos filtrar por buscador
        if (!empty($this->request->toArray())) {

            return $verifiedOffer;
        }

        return view('teacher/verifiedOffer', compact('verifiedOffer'));

    } // getVerifiedOffer()

    /**
     * Metodo que se encarga de filtrar las ofertas dadas de alta con un buscador
     * @return view Vista con las ofertas validadas filtradas por el buscador
     */
    public function postSearchVerifiedOffer()
    {
        $verifiedOffer = $this->getVerifiedOffer();

        return view('teacher/verifiedOffer', compact('verifiedOffer'));

    } // postSearchVerifiedOffer()

}
