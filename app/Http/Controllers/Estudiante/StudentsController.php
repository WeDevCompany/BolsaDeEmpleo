<?php

namespace App\Http\Controllers\Estudiante;

use App\Http\Controllers\UsersController;
use App\Http\Requests;
use App\Student;
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
            'firstName' => 'required',
            'lastName' => 'required',
            'dni' => 'required',
            'nre' => 'required',
            'phone' => 'required',
            'road' => 'required',
            'address' => 'required',
            'curriculum' => 'required',
            'birthdate' => 'required',
            'updates' => 'required',
        ];
        $this->rol = 'student';
        $this->redirectTo = "/estudiante";
    }

    public function index(){
        return view('home');
    } // index()



    public function store()
    {

        // Obtengo el array con los datos de la peticion.
        $req = array_map('trim', $this->request->all());

        // Añado el rol
        $req['rol'] = $this->rol;
        unset($req['_token']);

        // Valido la peticion.
        $this->validate($this->request, $this->rules);

        // Remplazo en la peticion los cambios.
        $this->request->replace($req);

        // Comenzamos la transaccion.
        \DB::beginTransaction();

        // Creo el usuario.
        Parent::create($this->request->all());

        // Creo el profesor.
        Student::create($this->request->all());

        \DB::commit();
        //\DB::rollBack()
        return redirect()->route('student.index');
    } // store()

}
