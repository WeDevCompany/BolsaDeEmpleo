<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfFamiliesController;
use App\Http\Controllers\CyclesController;
use App\Http\Requests;
use App\Student;
use App\JobOffer;
use App\Cycle;
use App\User;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Response;

class StudentsController extends UsersController
{

	public function __construct(Request $request)
    {
        $roads = implode(',', config('roads.road'));
        Parent::__construct($request);
        $this->rules += [
            // Reglas para el estudiante
            'firstName'         => 'required|between:2,45|regex:/^[A-Za-z0-9 ]+$/',
            'lastName'          => 'required|between:2,75|regex:/^[A-Za-z0-9 ]+$/',
            'dni'               => 'required|min:9|unique:students,dni|dni',
            'nre'               => 'digits:7',
            'phone'             => 'required|digits_between:9,13',
            'road'              => 'required|in:'.$roads,
            'address'           => 'required|between:6,225',
            'curriculum'        => 'required|mimes:pdf',

            // El nombre es debido a datepicker
            'birthdate'  => 'required|date',

            // Reglas de los ciclos.
            'family'            => 'required|validStudentProfFamilies',
            'cycle'            => 'required|validStudentCycles',
            'yearFrom'          => 'required|cycleYearFrom',
            'yearTo'            => 'required',
        ];
        $this->rules_curriculum = [
            'file' => 'required|mimes:pdf',
        ];
        $this->rol = 'estudiante';
        $this->redirectTo = "/estudiante";
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

            // Llamo al metodo para crear el estudiante.
            $insert = Self::create();

            if($insert !== false){

                // Llamo al metodo para almacenar sus grados.
                $insercion = self::createStudentCycle($insert);

                if ($insercion === true){

                    // Llamo al metodo sendEmail del controlador de las familias profesionales
                    $email = Parent::sendEmail();

                    if($email === true) {

                        $email = $this->sendEmailTeacher($insert);

                        if ($email === true) {

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
                } else {
                    // Aqui debo controlar los errores de inserción de ciclos
                    \DB::rollBack();
                    Session::flash('message_Negative', 'En estos momentos no podemos llevar a cabo su registro. Por favor intentelo de nuevo más tarde.');
                }
            } else {
                \DB::rollBack();
                Session::flash('message_Negative', 'En estos momentos no podemos llevar a cabo su registro. Por favor intentelo de nuevo más tarde.');
            }
        }

        \DB::rollBack();
        Session::flash('message_Negative', 'En estos momentos no podemos llevar a cabo su registro. Por favor intentelo de nuevo más tarde.');
        // Redireccionamos a la vista de validacion del email. (index provisional).
        return redirect()->route('estudiante..index');
    } // store()

    private function create()
    {
        try {

            // Obtenemos el curriculum
            $curriculum = $this->request->file('curriculum');

            // Obtenemos el nombre del curriculum del cliente
            $nombreCurriculum = $this->generarCodigo();

            // Insertamos el estudiante
            $insert = Student::create([
                'firstName' => $this->request['firstName'],
                'lastName' => $this->request['lastName'],
                'dni' => $this->request['dni'],
                'nre' => $this->request['nre'],
                'phone' => $this->request['phone'],
                'road' => $this->request['road'],
                'address' => $this->request['address'],
                'curriculum' => $nombreCurriculum,
                'birthdate' => $this->request['birthdate'],
                'user_id' => $this->request['user_id'],
                'created_at' => date('YmdHms'),
            ]);

            // Creamos la carpeta de curriculum del usuario y lo guardamos
            $save = $curriculum->move(storage_path() . '/app/curriculum/' . $this->request['carpeta'], $nombreCurriculum);

        } catch(\PDOException $e){
            //dd($e);
            abort(500);
        }

        if(isset($insert)){
            return $insert;
        }
        return false;
    } // create()

    // INACABADO
    private function createStudentCycle($student)
    {
        $data = $this->request->all();
        $cuantity = 0;
        $cycles = count($data['cycle']);

        try {
            // Para cada ciclo recibido hacemos una inserción
            foreach ($data['cycle'] as $posicion => $id) {
                $insert = null;

                $student->cycles()->attach($id, [
                    'dateTo' => $data['yearTo'][$posicion],
                    'dateFrom' => $data['yearFrom'][$posicion],
                    'student_id' => $student['id'],
                    'created_at' => date('YmdHms'),
                ]);

                // Comprobamos si la inserción ha sido correcta
                $insert = $student->cycles()
                                ->where('cycle_id', '=', $id)
                                ->select(['studentCycles.id'])
                                ->get()
                                ->toArray();

                if(!empty($insert) && !is_null($insert)){
                    $cuantity++;
                } else {
                    // Añado los errores para devolverlos sacar en la consulta el nombre del ciclo tambien para devolverlo en el error
                }
            }
        } catch(\PDOException $e){
            //dd($e);
            abort(500);
        }

        if($cuantity == $cycles){
            return true;
        }
        return false; // devuelvo false (temporal) debo devolver los errores
    } // createStudentCycle()

    public function imagenPerfil()
    {
        return view(config('appViews.perfil'));
    } // imagenPerfil()

    public function studentCurriculum()
    {
        return view(config('appViews.curriculum'));
    }

    /**
     * Método de subida de curriculum
     */
    public function uploadCurriculum()
    {

        // Validamos el curriculum
        $this->validate($this->request, $this->rules_curriculum);

        //obtenemos el campo curriculum definido en el formulario
        $curriculum = $this->request->file('file');

        //obtenemos el nombre del archivo
        $nombre = Parent::generarCodigo() . '.pdf';

        //indicamos que queremos guardar un nuevo archivo en el disco local
        $save = $curriculum->move(storage_path() . '/app/curriculum/' . \Auth::user()->carpeta, $nombre);

        // Si tengo la imagen guargo el nombre en la base de datos
        if ($save) {

            Student::where('user_id', '=', \Auth::user()->id)->update(['curriculum' => $nombre]);

            Session::flash('message_Success', 'Se ha cambiado el curriculum correctamente.');

        } else {
            Session::flash('message_Negative', 'No se ha podido cambiar el curriculum, por favor intentelo mas tarde');
        }

    } // uploadImage()

    /**
     * Método que envia correos a todos los profesores con las mismas ramas profesionales
     * que el estudiante que se acaba de registrar.
     * @param  object $insert Datos del estudiante nuevo
     */
    public function sendEmailTeacher($insert)
    {
        // Variables con el contenido del email
        $subject = 'Validar Estudiante';
        $cuerpo = 'El estudiante con nombre y apellidos: ' . $this->request['firstName'] . ' ' . $this->request['lastName'] . ', dni: ' . $this->request['dni'] . ' y email: ' . $this->request['email'] . ' se ha registrado correctamente, necesita ser validado por un profesor para poder entrar en la aplicación, si usted conoce a este estudiante por favor validelo.';

        // Obtenemos los profesores validados
        $validTeacher = $this->validTeacher();

        // Convertimos el objeto devuelto en un array
        $validTeacher = array_column($validTeacher, 'teacher_id');

        // Obtenemos los profesores de las mismas ramas profesionales que el estudiante
        $teacher = Teacher::select('users.email', 'teachers.id')
                            ->join('users', 'users.id', '=', 'teachers.user_id')
                            ->join('subjectTeachers', 'subjectTeachers.teacher_id', '=', 'teachers.id')
                            ->join('subjects', 'subjects.id', '=', 'subjectTeachers.subject_id')
                            ->join('cycleSubjects', 'cycleSubjects.subject_id', '=', 'subjects.id')
                            ->whereIn('cycleSubjects.cycle_id', $this->request['cycle'])
                            ->whereIn('teachers.id', $validTeacher)
                            ->distinct('teachers.id')
                            ->get();
        // Si hay algun profesor
        if (!$teacher->isEmpty()) {

            foreach ($teacher as $key => $value) {

                // Enviamos el email con los datos declarados antes
                $email = $this->email->sendEmail($value->email, $subject, null, $cuerpo);

                // Si hemos mandado el email registramos quien lo ha hecho y cuando
                if ($email) {

                    $sent = $this->insertSentEmailStudent($insert['id'], $value->id);

                    if (!$sent) {
                        return false;
                    }

                }
            }

        // Si no hay ningun profesor por defecto se le enviara al tutor del ciclo
        } else {

            // Obtenemos los profesores de las mismas ramas profesionales que el estudiante
            $tutor = Teacher::select('users.email', 'teachers.*')
                            ->join('users', 'users.id', '=', 'teachers.user_id')
                            ->join('tutors', 'tutors.teacher_id', '=', 'teachers.id')
                            ->join('cycles', 'cycles.id', '=', 'tutors.cycle_id')
                            ->whereIn('cycles.id', $this->request['cycle'])
                            ->whereIn('teachers.id', $validTeacher)
                            ->get();

            if (!$tutor->isEmpty()) {

                foreach ($tutor as $key => $value) {

                    // Enviamos el email con los datos declarados antes
                    $email = $this->email->sendEmail($value->email, $subject, null, $cuerpo);

                    // Si hemos mandado el email registramos quien lo ha hecho y cuando
                    if ($email) {

                        $sent = $this->insertSentEmailStudent($insert['id'], $value->id);

                        if (!$sent) {
                            return false;
                        }

                    }
                }

            // Si no hay ningun profesor ni tutor por defecto se le enviara al administrador
            } else {

                // Obtenemos los administradores
                $admin = $this->admin();

                foreach ($admin as $key => $value) {

                    // Enviamos el email con los datos declarados antes
                    $email = $this->email->sendEmail($value->email, $subject, null, $cuerpo);

                    // Si hemos mandado el email registramos quien lo ha hecho y cuando
                    if ($email) {

                        $sent = $this->insertSentEmailStudent($insert['id'], $value->id);

                        if (!$sent) {
                            return false;
                        }
                    }

                }
            }
        }

        return true;

    } // sendEmailTeacher()

    /**
     * @param  $idStudent    Id del estudiante
     * @param  $idTeacher    Id del profesor
     * @return boolean       True or false si se ha insertado en la tabla o no
     */
    public function insertSentEmailStudent($idStudent, $idTeacher)
    {
        $sent = \DB::table('sentEmailStudents')->insert([
            'student_id' => $idStudent,
            'teacher_id' => $idTeacher,
            'sent'       => true,
            'created_at' => date('YmdHms')
        ]);

        return $sent;

    } // insertSentEmailStudent()

    /**
     * Metodo que obtiene todas las ofertas validadas, filtradas por la rama
     * profesional del profesor logueado, y los muestra, si recibe el parametro de busqueda los filtrara
     * @return view Vista en la que se listan las ofertas
     */
    public function getVerifiedOffer()
    {
        // Url de buscador
        $urlSearch = config('routes.student.allOffers');

        // Variale de zona
        $zona = config('zona.admitidos.empresa');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.verifiedOffers');

        // Obtenemos las familias profesionales del profesor
        $profFamilyStudent = $this->profFamilyStudent();

        // Convertimos el objeto devuelto en un array
        $profFamilyValidate = array_column($profFamilyStudent->toArray(), 'name');

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

        return view('generic/verified/verifiedOffer', compact('verifiedOffer', 'filters', 'zona', 'urlSearch', 'request'));

    } // getVerifiedOffer()

    /**
     * Método en el que un estudiante se suscribe a una oferta pasada por parámetro
     * @param  $idOffer     Id de la oferta a suscribirse
     */
    public function getSubcriptionStudent($idOffer)
    {
        // Validamos los campos que nos llegan en el controlador
        // ya que los errores del comentario los mostraremos con un session flash
        $validator = \Validator::make((array)$idOffer, [
            '0' => 'required|integer|validOfferUser:estudiante',
        ]);

        // Si hay errores los mandamos a la vista
        if ($validator->fails()) {

            Session::flash('message_Negative', 'No se ha podido suscribirse a la oferta. Oferta inválida');
            return \Redirect::back();
        }

        // Todos los datos del estudiante
        $student = Student::select('users.*', 'students.*')
                            ->where('students.user_id', '=', \Auth::user()->id)
                            ->join('users', 'users.id', '=', 'students.user_id')
                            ->first();

        // Comprobamos que el estudiante no esta inscrito ya en la oferta
        $suscripcion = \DB::table('subcriptions')->where('student_id', '=', $student->id)
                                                ->where('jobOffer_id', '=', $idOffer)
                                                ->first();

        if (!$suscripcion) {

            // Todos los datos de la oferta a la que el estudiante quiere suscribirse
            $offer = JobOffer::join('workCenters', 'workCenters.id', '=', 'jobOffers.workCenter_id')
                                ->where('jobOffers.id', '=', $idOffer)
                                ->first();

            // Variables para el email
            $cuerpo = 'El estudiante con nombre y apellidos: ' . $student->firstName . ' ' . $student->lastName . ' y email: ' . $student->email . ' se ha suscrito a su oferta de trabajo cuyo titulo es: ' . $offer->title . '.';
            $subject = 'Un Estudiante se ha suscrito a su oferta';

            // Ruta hasta el curriculum del estudiante
            $url = storage_path() . '/app/curriculum/' . $student->carpeta . '/' . $student->curriculum;

            // Enviamos el email con los datos declarados antes
            $email = $this->email->sendEmail($offer->email, $subject, null, $cuerpo, $url);

            if (!$email){
                Session::flash('message_Negative', 'En este momento no podemos atender su peticion, por favor intentelo mas tarde');
                return \Redirect::back();
            }

            $sentEmail = \DB::table('subcriptions')->insert([
                'sentEmail' => true,
                'student_id' => $student->id,
                'jobOffer_id' => $idOffer,
                'created_at' => date('YmdHms'),
            ]);

            if ($sentEmail) {
                Session::flash('message_Success', 'Te has suscrito a la oferta correctamente');
                return \Redirect::back();
            }

        } else {

            Session::flash('message_Negative', 'Ya te encuentras suscrito a esta oferta');
            return \Redirect::back();
        }

        Session::flash('message_Negative', 'En este momento no podemos atender su petición, por favor intentelo mas tarde');
        return \Redirect::back();

    } // getSuscriptionStudent()

    /**
     * Método para descargarse el curriculum
     * @return file
     */
    public function downloadCurriculum()
    {
        $student = Student::select('users.*', 'students.*')
                            ->where('students.user_id', '=', \Auth::user()->id)
                            ->join('users', 'users.id', '=', 'students.user_id')
                            ->first();

        $url = storage_path() . '/app/curriculum/' . $student->carpeta . '/' . $student->curriculum;

        if (\File::exists($url)) {
            return response()->download($url);
        }

        Session::flash('message_Negative', 'En este momento no podemos atender su petición, por favor intentelo mas tarde');
        return \Redirect::to('/estudiante/curriculum');

    } // downloadCurriculum()

    public function getAllSusbscriptions() {
        $validOffer = $this->validOffer();
        // Convertimos el objeto devuelto en un array
        $validOffer = array_column($validOffer, 'jobOffer_id');
        //dd($validOffer);
        $profFamilie = $this->profFamilyStudent();
        $profFamilie = array_column($profFamilie->toArray(), 'name');
        $studentId = Student::where('user_id', '=', \Auth::user()->id)->first();
        if(isset($studentId->id)){
            $studentId = $studentId->id;
        } else {
            abort(404);
        }
        $verifiedOffer =  $this->invalidOrValidOffer($validOffer, $this->request, $profFamilie, $truncate = null, $studentId );
		foreach ($verifiedOffer as $key => $value) {
			$idOffer[] = $value->idJobOffer;
		}
		$tag = $this->offerTag($idOffer);
		$verifiedOffer = $this->arrayMap($verifiedOffer, $tag, 'tag');
        $zona = "Ofertas inscritas";
        $filters = config('filters.verifiedOffers');
        $request = $this->request;
        $urlSearch = config('routes.studentRoutes.allOffersSubscribed');
		$titulo = 'en las que estas inscrito';
        return view('generic.verified.verifiedOffer', compact('verifiedOffer', 'zona', 'filters', 'urlSearch', 'request', 'titulo'));
    }

    public function updateStudent()
    {
        $nuevafecha = date( 'YmdHms' );

        $student = Student::where('user_id', '=', \Auth::user()->id)->update(['updated_at' => $nuevafecha]);

        if ($student) {

            Session::flash('message_Success', 'Has actualizado correctamente tu perfil.');
            return \Redirect::back();

        }

        Session::flash('message_Negative', 'El usuario que intenta actualizar no es su usuario');
        return \Redirect::back();
    }
}
