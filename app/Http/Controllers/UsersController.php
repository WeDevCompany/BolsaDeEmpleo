<?php
/**
 *   @author Emmanuel Valverde Ramos
 *   @author Pedro Hernandéz Mora
 *   @author Eduardo López Pardo
 *   @author Fernando Manuel Barcelona
 *   @author Abel Montejo
 *
 * Este controlador se encarga de gestionar todas las llamadas a la lógica
 * y a las vistas de usuario.
 */

/**
 * Incluimos todos los namespace a utilizar
 */
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\UploadImageRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

// Incluimos la librería faker para poder hacer pruebas
use Faker\Factory as Faker;

class UsersController extends Controller
{

    // =====================================
    // Variables
    // =====================================
    protected $request = null;          // Inicializada a null
	protected $rol = null;              // Inicializada a null
	protected $redirectTo = '/';        // Donde redireccionaremos

    /**
     * Constructor del Controlador de usuarios
     * @param Request $request obtenemos la petición
     */
    protected function __construct(Request $request)
    {
        //$this->middleware('auth');

        // Almacenamos la petición realizada
        // en una variable de clase
        $this->request = $request;

        // Reglas de usuarios.
        $this->rules = [
            'email' => 'required',
            'password' => 'required',
            'password2' => 'required',
            //'image' => 'required',
        ];
    }

    protected function store()
    {

        // Valido la peticion.
        $this->validate($this->request, $this->rules);

        // Obtengo el array con los datos de la peticion.
        $req = array_map('trim', $this->request->all());

        // Añado el rol.
        $req['rol'] = $this->rol;

        // Remplazo en la peticion los cambios para añadir el rol.
        $this->request->replace($req);

        // Creo el usuario y devuelvo los datos de la insercion.
        $user = Self::create();

        if($user === false){
            return false;
        } else {
            $req['user_id'] = $user['id'];

            // Remplazo en la peticion los cambios para añadir el user_id.
            $this->request->replace($req);

            // Devuelvo los datos de la insercion.
            return $user;
        }
    } // store()

    /**
     * 
     * Método de creación de los usuarios
     * @return [type] [description]
     */
    private function create()
    {
        // Creamos una instancia de Faker
        $faker = Faker::create('es_ES');

        // Tratamiento de la imagen
        if (!empty($this->request->file('file'))) {
            $imagen = $request->file('file');
        } else {
            $imagen = $faker->randomElement(['default/default_1.png', 'default/default_2.png',
             'default/default_3.png', 'default/default_4.png', 'default/default_5.png',
             'default/default_6.png', 'default/default_7.png', 'default/default_8.png',
             'default/default_9.png', 'default/default_10.png', 'default/default_11.png']);
        }

        // Variable local
        $data = $this->request->all();

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
            abort(500);
        }

        if(isset($insercion['id'])){
            return $insercion;
        }
        return false;
    } // create()

    /**
     * Método para hacer pruebas con las imágenes
     * @return view llamada a la vista para realizar pruebas
     */
    protected function imagenPerfil()
    {
        return view('globals/uploadimage');
    } // imagenPerfil()

    /**
     * Método de subida de imagenes [Pruebas]
     * @param  UploadImageRequest $request middleware hecho
     *                                     expresamente para validar la imagen
     * @return [type]                      [description]
     */
    protected function uploadImage(UploadImageRequest $request)
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

}// fin del controlador 
