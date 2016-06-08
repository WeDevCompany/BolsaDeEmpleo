<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfFamiliesController;
use App\Http\Controllers\CyclesController;
use App\Http\Requests;
use App\Student;
use App\Cycle;
use App\User;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

    protected function index(){
        // Llamo al metodo getAllProfFamilies del controlador de las familias profesionales
        $profFamilies = app(ProfFamiliesController::class)->getAllProfFamilies();

        // Obtengo el identificador de la primera familia profesional
        $familyId = array_keys($profFamilies)[0];

        // Obtengo los ciclos de la primera familia
        $cycles = app(CyclesController::class)->getAllCycles($familyId);
        $zona = 'Registro de estudiantes';

        // Inicializo las variables que necesitare para los optgroups
        $basico = true;
        $medio = true;
        $superior = true;

        // Devuelvo la vista junto con las familias
        return view('student.registerForm', compact('profFamilies', 'cycles', 'zona', 'basico', 'medio', 'superior'));

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

            // Llamo al metodo para crear el estudiante.
            $insert = Self::create();

            if($insert !== false){

                // Llamo al metodo para almacenar sus grados.
                $insert = self::createStudentCycle($insert);

                if ($insert === true){

                    // Llamo al metodo sendEmail del controlador de las familias profesionales
                    $email = Parent::sendEmail();

                    if($email === true) {
                        \DB::commit();
                        return \Redirect::to('login');
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

        // Redireccionamos a la vista de validacion del email. (index provisional).
        return redirect()->route('estudiante..index');
    } // store()

    private function create()
    {
        try {
            
            // Obtenemos el curriculum
            $curriculum = $this->request->file('curriculum');

            // Obtenemos el nombre del curriculum del cliente
            $nombreCurriculum = $curriculum->getClientOriginalName();

            // Sustituimos el archivo por el nombre del curriculum para insertar solo el nombre en la base de datos
            $this->request['curriculum'] = $nombreCurriculum;

            // Insertamos el estudiante
            $insert = Student::create($this->request->all());
            $this->sendEmailTeacher($insert);
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
        $validTeacher = $this->search->validTeacher();

        // Convertimos el objeto devuelto en un array
        $validTeacher = array_column($validTeacher, 'teacher_id');

        // Obtenemos los profesores de las mismas ramas profesionales que el estudiante
        $teacher = Teacher::select('users.email', 'teachers.*')
                            ->join('users', 'users.id', '=', 'teachers.user_id')
                            ->join('teacherProfFamilies', 'teacherProfFamilies.teacher_id', '=', 'teachers.id')
                            ->whereIn('teacherProfFamilies.profFamilie_id', $this->request['family'])
                            ->whereIn('teachers.id', $validTeacher)
                            ->get();

        // Si hay algun profesor                    
        if ($teacher) {

            foreach ($teacher as $key => $value) {

                // Enviamos el email con los datos declarados antes
                $email = $this->email->sendEmail($value->email, $subject, null, $cuerpo);

                // Si hemos mandado el email registramos quien lo ha hecho y cuando
                if ($email) {
                    
                    \DB::table('sentEmailStudents')->insert([
                        'student_id' => $insert['id'],
                        'teacher_id' => $value->id,
                        'sent'       => true,
                        'created_at' => date('YmdHms')
                    ]);

                }
            }

        // Si no hay ningun profesor por defecto se le enviara al administrador
        } else {

            // Obtenemos los administradores
            $admin = $this->search->admin();

            foreach ($admin as $key => $value) {

                // Enviamos el email con los datos declarados antes
                $email = $this->email->sendEmail($value->email, $subject, null, $cuerpo);

                // Si hemos mandado el email registramos quien lo ha hecho y cuando
                if ($email) {
                    
                    \DB::table('sentEmailStudents')->insert([
                        'student_id' => $insert['id'],
                        'teacher_id' => $value->id,
                        'sent'       => true,
                        'created_at' => date('YmdHms')
                    ]);

                }

            }
        }
             
    } // sendEmailTeacher()

}
