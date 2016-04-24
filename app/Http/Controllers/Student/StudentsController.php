<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfFamilieController;
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
        Parent::__construct($request);
        $this->rules += [
            // Reglas para el estudiante
            'firstName' => 'required',
            'lastName' => 'required',
            'dni' => 'required',
            'nre' => 'required',
            'phone' => 'required',
            'road' => 'required',
            'address' => 'required',
            //'curriculum' => 'required',
            'birthdate' => 'required',

            // Reglas de los ciclos.
            /*'cycles' => 'required',
            'yearFrom' => 'required',
            'yearTo' => 'required',*/
        ];
        $this->rol = 'estudiante';
        $this->redirectTo = "/estudiante";
    }

    protected function index(){
        // Llamo al metodo getAllProfFamilies del controlador de las familias profesionales
        $profFamilies = app(ProfFamilieController::class)->getAllProfFamilies();

        // Devuelvo la vista junto con las familias
        return view('student.registerForm', compact('profFamilies'));
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
            $insercion = Self::create();

            if($insercion !== false){

                // Llamo al metodo para almacenar sus grados.
                
                // INACABADO $insercion = self::createStudentCycle($insercion);
                $insercion = true;

                if ($insercion === true){

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
            $insercion = Student::create($this->request->all());
        } catch(\PDOException $e){
            //dd($e);
            abort(500);
        }

        if(isset($insercion)){
            return $insercion;
        }
        return false;
    } // create()

    // INACABADO
    private function createStudentCycle($student)
    {
        $data = $this->request->all();

        try {
            // Inserta 1 solo ciclo, falta hacer el foreach para cada uno de ellos y validar que exista previamente el
            $student->cycles()->attach($data['cycles'], [
                'dateTo' => 1190,//$data['yearTo'],
                'dateFrom' => 1820,//$data['yearFrom'],
                'student_id' => $student['id'],
                'cycle_id' => $data['cycles'],
                'created_at' => date('YmdHms'),
            ]);
        } catch(\PDOException $e){
            dd($e);
            abort(500);
        }

        if(isset($insercion)){
            return true;
        }
        return true;
    } // createStudentCycle()

}
