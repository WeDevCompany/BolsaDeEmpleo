<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\UsersController;
use App\Http\Requests;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TeachersController extends UsersController
{

    public function __construct(Request $request)
    {
        Parent::__construct($request);
        $this->rules += [
            'firstName' => 'required|between:2,45|regex:/^[A-Za-z0-9 ]+$/',
            'lastName' => 'required|between:2,75|regex:/^[A-Za-z0-9 ]+$/',
            'dni' => 'required|dni',
            'phone' => 'required|digits_between:9,13',
        ];
        $this->rol = 'profesor';
        $this->redirectTo = "/profesor";
    }

    protected function index()
    {
        $zona = "Registro de profesores";
        return view('teacher.registerForm', compact('zona'));
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

}
