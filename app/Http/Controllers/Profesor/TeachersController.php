<?php

namespace App\Http\Controllers\Profesor;

use App\Http\Controllers\UsersController;
use App\Http\Requests;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TeachersController extends UsersController
{

	public function __construct(Request $request)
    {
        Parent::__construct($request);

        /*$this->rules += [
            'firstName'        => 'required|alpha|max:100',
            'lastName'         => 'required|alpha|max:100',
            'email'            => 'required|email',
            'password'         => 'required|min:8|confirmed',
            'dni'              => 'required',
            'phone'            => 'required',
        ];*/
        $this->rol = 'teacher';
        $this->redirectTo = "/profesor";
    }

    protected function index(){
           	return view('home');
    } // index()

    protected function store()
    {
        $input = [
        'firstName'        => Input::get('firstName'),
        'lastName'         => Input::get('lastName'),
        'email'             => Input::get('email'),
        'password'          => Hash::make(Input::get('password')),
        'password_confirm'  => Hash::make(Input::get('password2')),
    ];

        $rules = [
            'firstName'        => 'required|alpha|max:100|min:3',
            'lastName'         => 'required|alpha|max:100|min:3',
            'email'            => 'required|email',
            'password'         => 'required|min:8|confirmed',
            'dni'              => 'required',
            'phone'            => 'required',
        ];

       
         $validation = Validator::make($input, $rules);

    if($validation->passes()) {
        // Valido la peticion.
        //$this->validate($this->request, $this->input, $this->rules, $this->messages);

        // Comenzamos la transaccion.
        \DB::beginTransaction();

        // Obtengo el array con los datos de la peticion.
        $req = array_map('trim', $this->request->all());

        // Añado el rol.
        $req['rol'] = $this->rol;

        // Remplazo en la peticion los cambios.
        $this->request->replace($req);

        // Creo el usuario y añado el id.
        $user = Parent::create($this->request->all());
        
        if($user === false){
        	Session::flash('message_Negative', 'En estos momentos no podemos llevar a cabo su registro. Por favor intentelo de nuevo más tarde.');
      	} else {
        	$req['user_id'] = $user['id'];

	        // Remplazo en la peticion los cambios.
	        $this->request->replace($req);

	        // Llamo al metodo para crear el profesor.
	        $insercion = $this->create($this->request->all());

	        if($insercion === true){
	        	\DB::commit();
	        	\Auth::loginUsingId($user['id']);
	        } else {
	       		\DB::rollBack();
        		Session::flash('message_Negative', 'En estos momentos no podemos llevar a cabo su registro. Por favor intentelo de nuevo más tarde.');
	        }
        }
        return redirect()->route('profesor..index');
    }else {
        $errors = $validation->errors();

        return view('teacher/form')->withErrors($errors);
    }
    } // store()

    protected function create(array $data)
    {
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
	    }

    	if(isset($insercion)){
    		return true;
    	}
    	return false;
    } // create()

    public function register()
    {
        if (\Auth::user()) {
            
            return redirect()->to('/');

        }
        return view('teacher.form');
    }


}
