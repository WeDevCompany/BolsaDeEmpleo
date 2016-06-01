<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfFamiliesController;
use App\Http\Controllers\CyclesController;
use App\Http\Requests;
use App\Student;
use App\Cycle;
use App\User;
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
            //'curriculum'        => 'required|mimes:pdf',

            // El nombre es debido a datepicker
            'birthdate'  => 'required|date',

            // Reglas de los ciclos.
            //'family'            => 'required|exists:profFamilies,name',
            //'cycle'            => 'required|exists:cycles,name',
            //'yearFrom'          => 'required|digits:4|cycleYearFrom',
            //'yearTo'            => 'required|digits:4',
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

}
