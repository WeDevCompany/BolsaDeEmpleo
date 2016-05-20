<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Teacher\TeachersController;
use App\JobOffer;
use App\Teacher;
use App\User;
use App\Student;
use App\Http\Requests;
use App\Http\Requests\TeacherNotificationRequest;
use App\Http\Requests\StudentNotificationRequest;
use App\Http\Controllers\Controller;

//use Datatables;

class AdminsController extends TeachersController
{

    public function __construct(Request $request)
    {
        Parent::__construct($request);

        $this->rol = 'admin';
        $this->redirectTo = "/admin";
    }

	public function index(){
        return view('admin/index');
	} // index()

	/**
     * Metodo que obtiene los profesores
     * @return  view        vista en la que el admin validara a los profesores
     * @return  estudiante  Todos los datos de los profesores no validados
     */
    public function getTeacherNotification()
    {

        // Obtenemos todos los profesores validados
        $validTeacher = $this->search->validTeacher();

        // Obtenemos todos los profesores que no estan validados
        $notValidateTeacher = Teacher::select('teachers.id')
                                        ->whereNotIn('teachers.id', array_column($validTeacher, 'teacher_id'))
                                        ->get();

        // Obtenemos todos los datos de los profesores que no estan validados
        $invalidTeacher = $this->search->invalidOrValidTeacher($notValidateTeacher, $this->request);

        // Si recibimos request es porque queremos filtrar por buscador
        if (!empty($this->request->toArray())) {

            return $invalidTeacher;
        }

        return view('admin/teacherNotification', compact('invalidTeacher'));
		

    } // getTeacherNotification()

    /**
     * Metodo que Valida los profesores y que admin lo ha validado
     * @return  view        redireccion a la vista en la que el admin validara a los profesores
     *
     */
    public function postTeacherNotification(TeacherNotificationRequest $request)
    {
        // Array de los profesor a validar
        $profesor = $request->toArray();

        foreach ($profesor['profesor'] as $id => $value) {

            // Comprobamos si el profesor se encuentra validado o no
            $verifiedTeacher = $this->search->verifiedTeacher($value);

            // Si no esta validado insertamos en la tabla su id junto al del
            // admin que lo ha validado
            if(!$verifiedTeacher){

                \DB::table('verifiedTeachers')->insert([
                    'teacher_id' => $value,
                    'admin_id' => \Auth::user()->id,
                    'created_at' => date('YmdHms')
                ]);

            }

        }

        return \Redirect::to('admin/notificaciones/profesores');

    } // postTeacherNotification()

    /**
     * Metodo que se encarga de filtrar los profesores a validar con un buscador
     * @return view Vista con los profesores a validar filtrados por el buscador
     */
    public function postSearchTeacherNotification()
    {   

        // Obtenemos los profesores filtrados por el buscador
        $invalidTeacher = $this->getTeacherNotification();

        return view('admin/teacherNotification', compact('invalidTeacher'));

    } // postSearchStudentNotification()

    /**
     * Metodo que obtiene todos los profesores validados por los admin
     * y los muestra en una tabla
     * @return view Vista en la que se listan los profesores
     */
    public function getVerifiedTeacher()
    {
        // Obtenemos todos los profesores validados
        $validTeacher = $this->search->validTeacher();

        // Convertimos el objeto devuelto en un array
        $validTeacher = array_column($validTeacher, 'teacher_id');

        // Obtenemos los profesores que estan validados
        $verifiedTeacher = $this->search->invalidOrValidTeacher($validTeacher, $this->request);

        // Si recibimos request es porque queremos filtrar por buscador
        if (!empty($this->request->toArray())) {
            
            return $verifiedTeacher;
        }
        
        return view('admin/verifiedTeacher', compact('verifiedTeacher'));

    } // getVerifiedTeacher()

    /**
     * Metodo que se encarga de filtrar los profesores dados de alta con un buscador
     * @return view Vista con los profesores validados filtrados por el buscador
     */
    public function postSearchVerifiedTeacher()
    {
        $verifiedTeacher = $this->getVerifiedTeacher();

        return view('admin/verifiedTeacher', compact('verifiedTeacher'));

    } // postSearchVerifiedTeacher()

    /**
     * Metodo que obtiene los estudiantes
     * @return  view        vista en la que el admin validara a los estudiantes
     * @return  estudiante  Todos los datos de los estudiantes no validados
     */
    public function getStudentNotification()
    {

        // Obtenemos todos los estudiantes validados
        $validStudent = $this->search->validStudent();

        // Obtenemos todos los estudiantes que no estan validados
        $notValidateStudents = Student::select('students.id')
                                        ->whereNotIn('students.id', array_column($validStudent, 'student_id'))
                                        ->get();

        // Obtenemos los estudiantes que no estan validados
        $invalidStudent = $this->search->invalidOrValidStudent($notValidateStudents, $this->request);

        // Si recibimos request es porque queremos filtrar por buscador
        if (!empty($this->request->toArray())) {

            return $invalidStudent;
        }

        return view('admin/studentNotification', compact('invalidStudent'));

    } // getNotificationEstudiante()

    /**
     * Metodo que Valida los estudiantes y que admin lo ha validado
     * @return  view        redireccion a la vista en la que el admin validara a los estudiantes
     *
     */
    public function postStudentNotification(StudentNotificationRequest $request)
    {

        Parent::insertValidateStudent($request);

        return \Redirect::to('admin/notificaciones/estudiantes');

    } // postNotificationEstudiante()

    /**
     * Metodo que se encarga de filtrar los estudiantes a validar con un buscador
     * @return view Vista con los estudiantes a validar filtrados por el buscador
     */
    public function postSearchStudentNotification()
    {   

        // Obtenemos los estudiantes filtrados por el buscador
        $invalidStudent = $this->getStudentNotification();

        return view('admin/studentNotification', compact('invalidStudent'));

    } // postSearchStudentNotification()

    /**
     * Metodo que obtiene todos los estudiantes validados, filtrados por la rama
     * profesional del profesor logueado, y los muestra en una tabla
     * @return view Vista en la que se listan los estudiantes
     */
    public function getVerifiedStudent()
    {

        // Obtenemos todos los estudiantes validados
        $validStudent = $this->search->validStudent();

        // Convertimos el objeto devuelto en un array
        $validStudent = array_column($validStudent, 'student_id');

        // Obtenemos los estudiantes que estan validados
        $verifiedStudent = $this->search->invalidOrValidStudent($validStudent, $this->request);

        // Si recibimos request es porque queremos filtrar por buscador
        if (!empty($this->request->toArray())) {
            
            return $verifiedStudent;
        }
        
        return view('admin/verifiedStudent', compact('verifiedStudent'));
        
    } // getVerifiedStudent()

    /**
     * Metodo que se encarga de filtrar los estudiantes dados de alta con un buscador
     * @return view Vista con los estudiantes validados filtrados por el buscador
     */
    public function postSearchVerifiedStudent()
    {
        $verifiedStudent = $this->getVerifiedStudent();

        return view('admin/verifiedStudent', compact('verifiedStudent'));

    } // postSearchVerifiedStudent()

}
