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
use Storage;
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

        $this->rules_image = [
            'file' => 'required|image'
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

        try {

            // Creacion de la carpeta de usuario
            $carpeta = $this->generarCodigo();

            // Tratamiento de la imagen
            if (!empty($this->request->file('file'))) {

                $file = $this->request->file('file');
                $imagen = $file->getClientOriginalName();

            } else {
                $imagen = $faker->randomElement(['default_1.png', 'default_2.png',
                 'default_3.png', 'default_4.png', 'default_5.png',
                 'default_6.png', 'default_7.png', 'default_8.png',
                 'default_9.png', 'default_10.png', 'default_11.png']);
            }

            $this->request['image'] = $imagen;

            // Obtengo el array con los datos de la peticion.
            $req = array_map('trim', $this->request->all());

            // Añado la carpeta.
            $req['carpeta'] = $carpeta;

            // Remplazo en la peticion los cambios para añadir el rol.
            $this->request->replace($req);

            $insercion = User::create($this->request->all());

            if (!empty($file)) {

                $save = $file->move(public_path() . '/img/imgUser/' . $carpeta, $imagen);

                \Image::make(public_path() . '/img/imgUser/' . $carpeta . '/' . $imagen)->resize(200, 200)->save(public_path() . '/img/imgUser/' . $carpeta . '/' . $imagen);

            } else {

                \File::makeDirectory(public_path() . '/img/imgUser/' . $carpeta);
                \Image::make(storage_path() . '/app/public/default/' . $imagen)->resize(200, 200)->save(public_path() . '/img/imgUser/' . $carpeta . '/' . $imagen);

            }
            
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
     * Método de subida de imagenes [Pruebas]
     * @param  UploadImageRequest $request middleware hecho
     *                                     expresamente para validar la imagen
     * @return [type]                      [description]
     */
    protected function uploadImage()
    {
        // Validamos la imagen
        $this->validate($this->request, $this->rules_image);

        //obtenemos el campo file definido en el formulario
        $file = $this->request->file('file');

        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        //indicamos que queremos guardar un nuevo archivo en el disco local
        $save = $file->move(public_path() . '/img/imgUser/' . \Auth::user()->carpeta, $nombre);

        \Image::make(public_path() . '/img/imgUser/' . \Auth::user()->carpeta . '/' . $nombre)->resize(200, 200)->save(public_path() . '/img/imgUser/' . \Auth::user()->carpeta . '/' . $nombre);

        if ($save) {
            $user = new User;
            $user->where('id', '=', \Auth::user()->id)->update(['image' => $nombre]);
        }
        
    } // uploadImage()

    protected function generarCodigo()
    {
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-_1234567890" . date("Yhis");
        $cad = "";
        //                                        AÑO   HORA MIN  SEG
        // Montamos una cadena aleatoria con 63 + 0000 + 00 + 00 + 00
        // Total de caracteres 25 - aleatorios + el string bolsaempleo
        for($i=0;$i<15;$i++) {
            $cad .= mb_substr($str,rand(0,73),1);
        }
        $cadEncryp = md5($cad);
        return $cadEncryp;

    }

}// fin del controlador 
