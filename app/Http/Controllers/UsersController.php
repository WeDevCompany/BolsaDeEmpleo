<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\UploadImageRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use Faker\Factory as Faker;

class UsersController extends Controller
{

    protected $request = null;
	protected $rol = null;
	protected $redirectTo = '/';

    protected function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
        
        // Reglas de usuarios.
        $this->rules = [
            'email' => 'required',
            'password' => 'required',
            'password2' => 'required',
        ];
    }


    protected function create(array $data)
    {
    	// Creamos una instancia de Faker
        $faker = Faker::create('es_ES');
        $imagen = $faker->randomElement(['default/default_1.png', 'default/default_2.png',
         'default/default_3.png', 'default/default_4.png', 'default/default_5.png',
         'default/default_6.png', 'default/default_7.png', 'default/default_8.png',
         'default/default_9.png', 'default/default_10.png', 'default/default_11.png']);

        try {
	    	$insercion = User::create([
	            'email' => $data['email'],
	            'password' => \Hash::make($data['password']),
	            //'code' => //llamada a la funcion que crea el codigo
	            'rol' => $data['rol'],
	            'image' => $imagen,
	            'created_at' => date('YmdHms'),
	    	]);
        } catch(\PDOException $e){
        	//dd($e);
        }

    	if(isset($insercion['id'])){
    		return $insercion;
    	}
    	return false;
    } // create()

    public function imagenPerfil()
    {
        return view('globals/uploadimage');
    } // imagenPerfil()

    public function uploadImage(UploadImageRequest $request)
    {
        //obtenemos el campo file definido en el formulario
        $file = $request->file('imagen');
 
        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        //indicamos que queremos guardar un nuevo archivo en el disco local
        $save = $file->move(storage_path() . '/app/public/' . \Auth::user()->email, $nombre);
        
        if ($save) {
            $user = new User;
            $user->where('id', '=', \Auth::user()->id)->update(['image' => \Auth::user()->email . '/' . $nombre]); 
        }
        return Redirect::to('/perfil');
    } // uploadImage()

}
