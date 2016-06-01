<?php
/**
 *   @author Emmanuel Valverde Ramos
 *   @author Pedro Hernandéz Mora
 *   @author Eduardo López Pardo
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
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfFamiliesController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\CyclesController;

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
    protected $search = null;           // Buscador
    protected $email = null;            // Email

    /**
     * Constructor del Controlador de usuarios
     * @param Request $request obtenemos la petición
     */
    public function __construct(Request $request)
    {
        //$this->middleware('auth');

        // Almacenamos la petición realizada
        // en una variable de clase
        $this->request = $request;

        // Reglas de usuarios.
        $this->rules = [
            'email'     => 'required|email|min:6|unique:users,email',
            'password'  => 'required|confirmed|between:4,20|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\d).+$/',
            'terminos'  => 'required'
        ];

        $this->rules_image = [
            'file' => 'required|image'
        ];

        $this->search = new SearchController();
        $this->email = new EmailController();

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
     * [register description]
     * @return [type] [description]
     */
    protected function register()
    {
        // Registro de profesores
        if($this->request->is('registro/profesor')){

            // Llamo al metodo getAllProfFamilies del controlador de las familias profesionales
            $profFamilies = app(ProfFamiliesController::class)->getAllProfFamilies();
            $cycles = app(CyclesController::class)->getAllCycles('*', true);

            // Inicializo las variables que necesitare para los optgroups
            $basico = true;
            $medio = true;
            $superior = true;

            $zona = "Registro de profesores";
            return view('teacher.registerForm', compact('profFamilies', 'cycles', 'basico', 'medio', 'superior', 'zona'));

        // Registro de estudiantes
        } else if ($this->request->is('registro/estudiante')) {

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

        // Registro de empresas
        } else if ($this->request->is('registro/empresa')) {

            return view('enterprise.registerForm');

        } else {

            abort(404);

        }

    } //register()

    /**
     * Método de subida de imagenes [Pruebas]
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

            Session::flash('message_Success', 'Se ha cambiado la imagen correctamente.');

        } else {

            Session::flash('message_Negative', 'No se ha podido cambiar la imagen, por favor intentelo mas tarde');

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

    public function getNotificationsJSON() {

        $notifications = [];

        if (\Auth::user()->rol == "profesor" || \Auth::user()->rol == "administrador") {
            try{
                // Obtenemos las familias profesionales del profesor
                $profFamilyTeacher = $this->search->profFamilyTeacher();

                // Convertimos el objeto devuelto en un array
                $profFamilyValidate = array_column($profFamilyTeacher->toArray(), 'name');

            } catch (\PDOException $e){
                //dd($e);
                abort(500);
            }

            // Obtenemos todos los estudiantes sin verificar dependiendo de la familia
            try{
                // Obtenemos todos los alumnos correspondientes a sus familias profesionales
                $query = $this->search->notVerifiedStudents($profFamilyValidate);

                // Almacenamos el resultado
                $notifications['studentNotifications'] = count($query);
            } catch (\PDOException $e){
                //dd($e);
                abort(500);
            }

            // Obtenemos todas las ofertas sin verificar dependiendo de la familia
            try{
                // Obtenemos todos los alumnos correspondientes a sus familias profesionales
                $query = $this->search->notVerifiedOffers($profFamilyValidate);

                // Almacenamos el resultado
                $notifications['offerNotifications'] = count($query);
            } catch (\PDOException $e){
                //dd($e);
                abort(500);
            }
        }

        if (\Auth::user()->rol == "administrador") {
            // Obtenemos todos los profesores sin verificar
            try{
                // Obtenemos todos los ids de profesores no verificados aún
                $query = $this->search->notVerifiedTeachers();

                // Almacenamos el resultado
                $notifications['allTeacherNotifications'] = count($query);

            } catch (\PDOException $e){
                //dd($e);
                abort(500);
            }

            // Obtenemos todos los estudiantes sin verificar
            try{
                // Obtenemos todos los ids de estudiantes no verificados aún
                $query = $this->search->notVerifiedStudents();

                // Almacenamos el resultado
                $notifications['allStudentNotifications'] = count($query);

            } catch (\PDOException $e){
                //dd($e);
                abort(500);
            }

            // Obtenemos todas las ofertas sin verificar
            try{
                // Obtenemos todos los ids de ofertas no verificados aún
                $query = $this->search->notVerifiedOffers();

                // Almacenamos el resultado
                $notifications['allOfferNotifications'] = count($query);

            } catch (\PDOException $e){
                //dd($e);
                abort(500);
            }

        }

        $result = [];
        foreach ($notifications as $id => $count) {
            $result[] = ['id' => $id, 'cantidad' => $count];
        }

        return \Response::json($result);

    } // getNotificationsJSON()

}// fin del controlador
