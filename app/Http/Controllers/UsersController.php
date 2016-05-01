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
            'email'     => 'required|email|min:6|unique:users',
            'password'  => 'required|confirmed|between:4,20|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\d).+$/',
            'terminos'  => 'required'
        ];

        $this->rules_image = [
            'file' => 'required|image'
        ];
    }

    protected function store()
    {
        // Valido la peticion.
        $this->validate($this->request, $this->rules);

        // Añado el rol.
        $this->request['rol'] = $this->rol;

        // Creo el usuario y devuelvo los datos de la insercion.
        $user = Self::create();

        if($user === false){
            return false;
        } else {

            $this->request['user_id'] = $user['id'];

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

            // Codigo de verificacion de email
            $code = $this->generarCodigo();

            // Tratamiento de la imagen
            if (!empty($this->request->file('file'))) {

                // Imagen recibida si existe
                $file = $this->request->file('file');

                // Generamos el nombre de la imagen
                $imagen = $this->generarCodigo() . '.png';

            } else {

                // Imagen por defecto aleatoria
                $imagen = $faker->randomElement(['default_1.png', 'default_2.png',
                 'default_3.png', 'default_4.png', 'default_5.png',
                 'default_6.png', 'default_7.png', 'default_8.png',
                 'default_9.png', 'default_10.png', 'default_11.png']);
            }

            // Añadimos la imagen para insertarla
            $this->request['image'] = $imagen;

            // Añado la carpeta.
            $this->request['carpeta'] = $carpeta;

            // Añado el codigo de verificacion
            $this->request['code'] = $code;
            
            //Insertamos todos los campos
            $insercion = User::create($this->request->all());

            // Tratamiento de la imagen
            if (!empty($file)) {

                // Creamos la carpeta de imagenes del usuario y la guardamos
                $save = $file->move(public_path() . '/img/imgUser/' . $carpeta, $imagen);

                // Redimensionamos la imagen del usuario
                \Image::make(public_path() . '/img/imgUser/' . $carpeta . '/' . $imagen)->resize(200, 200)->save(public_path() . '/img/imgUser/' . $carpeta . '/' . $imagen);

            } else {

                // Creamos la carpeta de imagenes del usuario
                \File::makeDirectory(public_path() . '/img/imgUser/' . $carpeta);

                // Redimensionamos la imagen por defecto del usuario y la guardamos en su carpeta
                \Image::make(storage_path() . '/app/public/default/' . $imagen)->resize(200, 200)->save(public_path() . '/img/imgUser/' . $carpeta . '/' . $imagen);

            }

        } catch(\PDOException $e){
            //dd($e);
            // lanzamos una excepción
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
        $nombre = $this->generarCodigo() . '.png';

        //indicamos que queremos guardar un nuevo archivo en el disco local
        $save = $file->move(public_path() . '/img/imgUser/' . \Auth::user()->carpeta, $nombre);

        // Redimensionamos la imagen del usuario
        \Image::make(public_path() . '/img/imgUser/' . \Auth::user()->carpeta . '/' . $nombre)->resize(200, 200)->save(public_path() . '/img/imgUser/' . \Auth::user()->carpeta . '/' . $nombre);

        // Si tengo la imagen guargo el nombre en la base de datos
        if ($save) {
            $user = new User;
            $user->where('id', '=', \Auth::user()->id)->update(['image' => $nombre]);
        }

    } // uploadImage()

    /**
     * Método que genera el código aleatorio
     * @return String cadena aleatoria
     */
    protected function generarCodigo()
    {
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-_1234567890" . date("Yhis");
        $cad = "";
        //                                        AÑO   HORA MIN  SEG
        // Montamos una cadena aleatoria con 63 + 0000 + 00 + 00 + 00
        // Total de caracteres 25
        for($i=0;$i<15;$i++) {
            $cad .= mb_substr($str,rand(0,73),1);
            // Le añadimos los microsegundos [SOLO UNIX] por cada iteración
            // lo cual lo hace más aleatorio
            $cad .= microtime();
        }
        // y al final le concatenamos la fecha de forma que sea una cadena
        // completamente aleaotria
        $cad .=  date("Yhis");
        $cadEncryp = md5($cad);
        return $cadEncryp;
    }// generarCodigo()

    /**
     * Método que envia un email de confirmación al usuario
     * para validar su cuenta
     * @return Boolean false si no se envia el email.
     */
    protected function sendEmail()
    {

        try{

            $user = User::findOrFail($this->request['user_id']);

            // Ruta en la que el usuario se verificara
            $url = route('confirmation', ['token' => $user->code]);

            // Ruta en la que el usuario introduce el codigo para validarse
            $urlCode = route('confirmacion');

            // Mandamos el email al usuario con los datos de la vista
            $email = \Mail::send('auth/emails/emailRegister', compact('user', 'url', 'urlCode'), function ($m) use ($user){

                $m->to($user->email)->subject('Activa tu cuenta');

            });

        } catch(\PDOException $e) {
            //dd($e);
            abort(500);
        }

        if(is_null($email)) {
            return false;
        } elseif ($email !== false) {
            return true;
        } else {
            return false;
        }

    } // sendEmail()

}// fin del controlador
