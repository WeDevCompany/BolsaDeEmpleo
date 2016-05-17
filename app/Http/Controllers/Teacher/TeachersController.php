<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\UsersController;
use App\Http\Requests;
use App\Student;
use App\Teacher;
use App\User;
use App\Http\Requests\StudentNotificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection as Collection;

class TeachersController extends UsersController
{

    public function __construct(Request $request)
    {
        Parent::__construct($request);
        $this->rules += [
            'firstName' => 'required|between:2,45|regex:/^[A-Za-z0-9 ]+$/',
            'lastName' => 'required|between:2,75|regex:/^[A-Za-z0-9 ]+$/',
            'dni' => 'required|min:9|unique:teachers,dni|dni',
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
                    Session::flash('message_Success', 'Se ha registrado correctamente.');
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

    /**
     * Metodo que obtiene los estudiantes
     * @return  view        vista en la que el profesor validara a los estudiantes
     * @return  estudiante  Todos los datos de los estudiantes no validados
     */
    public function getStudentNotification()
    {

        // Subconsulta que obtiene todos los estudiantes que no estan verificados
        // No la utilizaremos ya que al utilizar RAW perdemos la abstraccion a la base de datos
        /*$estudiante = \DB::table('students as s1')
                    ->select('s1.*')
                    ->whereNotIn('s1.id', function($query){
                        $query->select('verifiedStudents.student_id')
                              ->from(\DB::raw('verifiedStudents, students as s2'))
                              ->whereRaw('verifiedStudents.student_id = s2.id')
                              ->whereRaw('s1.id = s2.id');
                    })
                    ->paginate();
        */

        $request = $this->request;

        // Obtenemos todos los estudiantes validados
        $validStudent = \DB::table('verifiedStudents')->select('student_id')->get();

        // Obtenemos las familias profesionales del profesor
        $profFamilyTeacher = Teacher::select('profFamilies.name')
                                        ->where('user_id', '=', \Auth::user()->id)
                                        ->join('teacherProfFamilies', 'teacherProfFamilies.teacher_id', '=', 'teachers.id')
                                        ->join('profFamilies', 'profFamilies.id', '=', 'teacherProfFamilies.profFamilie_id')
                                        ->get();

        $profFamilyValidate = array_column($profFamilyTeacher->toArray(), 'name');

        // Obtenemos los estudiantes que no estan validados, solo sacamos los datos
        // que nos interesan debido a la forma que tiene laravel de gestionar el distinct,
        // que necesita estar el campo en la select
        $invalidStudent = Student::name($request->get('name'))
                                    ->select('students.id', 'students.firstName', 'students.lastName','students.dni', 'users.email', 'users.carpeta', 'users.image','profFamilies.name')
                                    ->join('users', 'users.id', '=', 'user_id')
                                    ->join('studentCycles', 'studentCycles.student_id', '=', 'students.id')
                                    ->join('cycles', 'cycles.id', '=', 'studentCycles.cycle_id')
                                    ->join('profFamilies', 'profFamilies.id', '=', 'cycles.profFamilie_id')
                                    ->whereIn('profFamilies.name', $profFamilyValidate)
                                    ->whereNotIn('students.id', array_column($validStudent, 'student_id'))
                                    ->distinct('students.id')
                                    ->paginate();


        //dd($invalidStudent);

        return view('teacher/studentNotification', compact('invalidStudent', 'request'));

    } // getNotificationEstudiante()

    /**
     * Metodo que Valida los estudiantes y que profesor lo ha validado
     * @return  view        redireccion a la vista en la que el profesor validara a los estudiantes
     *
     */
    public function postStudentNotification(StudentNotificationRequest $request)
    {
        // Array de los estudiantes a validar
        $estudiante = $request->toArray();

        foreach ($estudiante['estudiante'] as $id => $value) {

            // Comprobamos si el alumno se encuentra validado o no
            $verifiedStudent = Student::where('verifiedStudents.student_id', '=', $value)
                                        ->join('verifiedStudents', 'verifiedStudents.student_id', '=', 'students.id')
                                        ->first();

            // Obtenemos el id del profesor logueado actualmente
            $authTeacher = Teacher::where('user_id', '=', \Auth::user()->id)->first();

            // Si no esta validado insertamos en la tabla su id junto al del
            // profesor que lo ha validado
            if(!$verifiedStudent){

                \DB::table('verifiedStudents')->insert([
                    'student_id' => $value,
                    'teacher_id' => $authTeacher['id'],
                    'created_at' => date('YmdHms')
                ]);

            }

        }

        return \Redirect::to('profesor/notificaciones/estudiantes');

    } // postNotificationEstudiante()

    public function getVerifiedStudent()
    {

        $request = $this->request;

        // Obtenemos las familias profesionales del profesor
        $profFamilyTeacher = Teacher::select('profFamilies.name')
                                        ->where('user_id', '=', \Auth::user()->id)
                                        ->join('teacherProfFamilies', 'teacherProfFamilies.teacher_id', '=', 'teachers.id')
                                        ->join('profFamilies', 'profFamilies.id', '=', 'teacherProfFamilies.profFamilie_id')
                                        ->get();

        $profFamilyValidate = array_column($profFamilyTeacher->toArray(), 'name');

        // Obtenemos todos los estudiantes validados
        $validStudent = \DB::table('verifiedStudents')->select('student_id')->get();

        // Obtenemos los estudiantes que estan validados, solo sacamos los datos
        // que nos interesan debido a la forma que tiene laravel de gestionar el distinct,
        // que necesita estar el campo en la select
        $verifiedStudent = Student::name($request->get('name'))
                                    ->select('students.id', 'students.firstName', 'students.lastName','students.dni', 'users.email', 'users.carpeta', 'users.image','profFamilies.name')
                                    ->join('users', 'users.id', '=', 'user_id')
                                    ->join('studentCycles', 'studentCycles.student_id', '=', 'students.id')
                                    ->join('cycles', 'cycles.id', '=', 'studentCycles.cycle_id')
                                    ->join('profFamilies', 'profFamilies.id', '=', 'cycles.profFamilie_id')
                                    ->whereIn('profFamilies.name', $profFamilyValidate)
                                    ->whereIn('students.id', array_column($validStudent, 'student_id'))
                                    ->distinct('students.id')
                                    ->paginate();

        //dd($verifiedStudent);
        
        return view('teacher/verifiedStudent', compact('verifiedStudent', 'request'));
        
    }

}
