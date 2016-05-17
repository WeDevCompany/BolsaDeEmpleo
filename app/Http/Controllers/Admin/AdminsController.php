<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Teacher\TeachersController;
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

	public function index(){
        return view('admin/index');
	} // index()

	/**
     * Metodo que obtiene los profesores
     * @return  view        vista en la que el profesor validara a los profesores
     * @return  estudiante  Todos los datos de los profesores no validados
     */
    public function getTeacherNotification()
    {

        $request = $this->request;

        // Obtenemos todos los profesores validados
        $validTeacher = \DB::table('verifiedTeachers')->select('teacher_id')->get();

        // Obtenemos los profesores que no estan validados
        $invalidTeacher = Teacher::name($request->get('name'))
                                    ->select('*')
                                    ->join('users', 'users.id', '=', 'user_id')
                                    ->join('teacherProfFamilies', 'teacherProfFamilies.teacher_id', '=', 'teachers.id')
                                    ->join('profFamilies', 'profFamilies.id', '=', 'teacherProfFamilies.profFamilie_id')
                                    ->whereNotIn('teachers.id', array_column($validTeacher, 'teacher_id'))
                                    ->paginate();

        return view('admin/teacherNotification', compact('invalidTeacher', 'request'));
		

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
            $verifiedTeacher = Teacher::where('verifiedTeachers.teacher_id', '=', $value)
                                        ->join('verifiedTeachers', 'verifiedTeachers.teacher_id', '=', 'teachers.id')
                                        ->first();

            // Obtenemos el id del admin logueado actualmente
            $authTeacher = Teacher::where('user_id', '=', \Auth::user()->id)->first();

            // Si no esta validado insertamos en la tabla su id junto al del
            // admin que lo ha validado
            if(!$verifiedTeacher){

                \DB::table('verifiedTeachers')->insert([
                    'teacher_id' => $value,
                    'admin_id' => $authTeacher['id'],
                    'created_at' => date('YmdHms')
                ]);

            }

        }

        return \Redirect::to('admin/notificaciones/profesores');

    } // postTeacherNotification()

    /**
     * Metodo que obtiene los estudiantes
     * @return  view        vista en la que el admin validara a los estudiantes
     * @return  estudiante  Todos los datos de los estudiantes no validados
     */
    public function getStudentNotification()
    {

        $request = $this->request;

        // Obtenemos todos los estudiantes validados
        $validStudent = \DB::table('verifiedStudents')->select('student_id')->get();

        // Obtenemos los estudiantes que no estan validados, solo sacamos los datos
        // que nos interesan debido a la forma que tiene laravel de gestionar el distinct,
        // que necesita estar el campo en la select
        $invalidStudent = Student::name($request->get('name'))
                                    ->select('students.id', 'students.firstName', 'students.lastName','students.dni', 'users.email', 'users.carpeta', 'users.image','profFamilies.name')
                                    ->join('users', 'users.id', '=', 'user_id')
                                    ->join('studentCycles', 'studentCycles.student_id', '=', 'students.id')
                                    ->join('cycles', 'cycles.id', '=', 'studentCycles.cycle_id')
                                    ->join('profFamilies', 'profFamilies.id', '=', 'cycles.profFamilie_id')
                                    ->whereNotIn('students.id', array_column($validStudent, 'student_id'))
                                    ->distinct('students.id')
                                    ->paginate();


        //dd($invalidStudent);

        return view('admin/studentNotification', compact('invalidStudent', 'request'));

    } // getNotificationEstudiante()

    /**
     * Metodo que Valida los estudiantes y que admin lo ha validado
     * @return  view        redireccion a la vista en la que el admin validara a los estudiantes
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

            // Obtenemos el id del admin logueado actualmente
            $authTeacher = Teacher::where('user_id', '=', \Auth::user()->id)->first();

            // Si no esta validado insertamos en la tabla su id junto al del
            // admin que lo ha validado
            if(!$verifiedStudent){

                \DB::table('verifiedStudents')->insert([
                    'student_id' => $value,
                    'teacher_id' => $authTeacher['id'],
                    'created_at' => date('YmdHms')
                ]);

            }

        }

        return \Redirect::to('admin/notificaciones/estudiantes');

    } // postNotificationEstudiante()

    public function getVerifiedStudent()
    {

        $request = $this->request;

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
                                    ->whereIn('students.id', array_column($validStudent, 'student_id'))
                                    ->distinct('students.id')
                                    ->paginate();

        //dd($verifiedStudent);
        
        return view('admin/verifiedStudent', compact('verifiedStudent', 'request'));
        
    }

}
