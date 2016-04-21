<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\UsersController;
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
            //'cycles' => 'selected',
            'yearFrom' => 'required',
            'yearTo' => 'required',
        ];
        $this->rol = 'student';
    }

    protected function index(){
        return view('student.registerForm');
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
                $insercion = self::createStudentCycle($insercion);

                if ($insercion === true){
                    \DB::commit();
                    \Auth::loginUsingId($user['id']);
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
        $data = $this->request->all();

        try {
            $insercion = Student::create([
                'firstName' => $data['firstName'],
                'lastName' => $data['lastName'],
                'dni' => $data['dni'],
                'nre' => $data['nre'],
                'phone' => $data['phone'],
                'road' => $data['road'],
                'address' => $data['address'],
                //'curriculum' => $data['curriculum'],
                'birthdate' => $data['birthdate'],
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

    private function createStudentCycle($student)
    {
        $data = $this->request->all();

        try {
            // Inserta 1 solo ciclo, falta hacer el foreach para cada uno de ellos y validar que exista previamente el
            $insercion = $student->manyCycles()->attach($data['cycles'], [
                'dateTo' => $data['yearTo'],
                'dateFrom' => $data['yearFrom'],
                'student_id' => $student['id'],
                'cycle_id' => $data['cycles'],
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
    } // createStudentCycle()

}
