<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Student;

use App\Http\Requests;

class SearchController extends Controller
{

    // Metodo que devuelve la familia del profesor logueado
    public function profFamilyTeacher()
    {
        // Obtenemos las familias profesionales del profesor
        $profFamilyTeacher = Teacher::select('profFamilies.name')
                                        ->where('user_id', '=', \Auth::user()->id)
                                        ->join('teacherProfFamilies', 'teacherProfFamilies.teacher_id', '=', 'teachers.id')
                                        ->join('profFamilies', 'profFamilies.id', '=', 'teacherProfFamilies.profFamilie_id')
                                        ->get();

        return $profFamilyTeacher;

    } // profFamilyTeacher()

    /**
     * Metodo que obtiene los estudiantes que no han sido dados de alta
     * o si segun los parametros recibidos, en base
     * a la familia profesional del profesor a validar
     * o por un administrador sin restriccion de familia profesional
     */
    public function invalidOrValidStudent($invalidOrValidStudent, $request = null, $profFamilyValidate = null)
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

        // Obtenemos los estudiantes que no estan validados o validados
        // en base a los parametros recibidos, solo sacamos los datos
        // que nos interesan debido a la forma que tiene laravel de gestionar el distinct,
        // que necesita estar el campo en la select
        $invalidOrValidStudent = Student::name($request->get('name'))
        							->profFamilyTeacher($profFamilyValidate) // Scope que compara las familias profesionales del profesor y el alumno
                                    ->select('students.id', 'students.firstName', 'students.lastName','students.dni', 'users.email', 'users.carpeta', 'users.image','profFamilies.name')
                                    ->join('users', 'users.id', '=', 'user_id')
                                    ->join('studentCycles', 'studentCycles.student_id', '=', 'students.id')
                                    ->join('cycles', 'cycles.id', '=', 'studentCycles.cycle_id')
                                    ->join('profFamilies', 'profFamilies.id', '=', 'cycles.profFamilie_id')
                                    //->whereIn('profFamilies.name', $profFamilyValidate)
                                    ->whereIn('students.id', $invalidOrValidStudent)
                                    ->distinct('students.id')
                                    ->paginate();

        return $invalidOrValidStudent;

    } // invalidOrValidStudent()

    // Metodo que obtiene todos los estudiantes validados
    public function validStudent()
    {

        // Obtenemos todos los estudiantes validados
        $validStudent = \DB::table('verifiedStudents')->select('student_id')->get();

        return $validStudent;

    } // validStudent()

    /**
     * Metodo que comprueba si el estudiante pasado como parametro esta
     * dado de alta en la aplicacion
     * @param  $idStudent Id del estudiante a comprobar
     * @return            Devolvemos los datos del estudiante
     */
    public function verifiedStudent($idStudent)
    {
        // Obtenemos el estudiantes dado de alta en la aplicacion
        $verifiedStudent = Student::where('verifiedStudents.student_id', '=', $idStudent)
                                        ->join('verifiedStudents', 'verifiedStudents.student_id', '=', 'students.id')
                                        ->first();

        return $verifiedStudent;

    } // verifiedStudent()

    /**
     * Metodo que comprueba si el profesor pasado como parametro esta
     * dado de alta en la aplicacion
     * @param  $idStudent Id del profesor a comprobar
     * @return            Devolvemos los datos del profesor
     */
    public function verifiedTeacher($idTeacher)
    {
    	// Obtenemos el profesor dado de alta en la aplicacion
    	$verifiedTeacher = Teacher::where('verifiedTeachers.teacher_id', '=', $idTeacher)
                                        ->join('verifiedTeachers', 'verifiedTeachers.teacher_id', '=', 'teachers.id')
                                        ->first();

        return $verifiedTeacher;
                                       
    } // verifiedTeacher()

    // Metodo que obtiene todos los profesores validados
    public function validTeacher()
    {
    	// Obtenemos todos los profesores validados
    	$validTeacher = \DB::table('verifiedTeachers')->select('teacher_id')->get();

    	return $validTeacher;
    }

    /**
     * [invalidOrValidTeacher description]
     * @return [type] [description]
     */
    public function invalidOrValidTeacher($invalidOrValidTeacher, $request)
    {
    	// Obtenemos los profesores que no estan validados
    	// o si lo estan segun los parametros recibidos
        $invalidOrValidTeacher = Teacher::name($request->get('name'))
                                    ->select('*')
                                    ->join('users', 'users.id', '=', 'user_id')
                                    ->join('teacherProfFamilies', 'teacherProfFamilies.teacher_id', '=', 'teachers.id')
                                    ->join('profFamilies', 'profFamilies.id', '=', 'teacherProfFamilies.profFamilie_id')
                                    ->whereIn('teachers.id', $invalidOrValidTeacher)
                                    ->paginate();

        return $invalidOrValidTeacher;

    } // invalidOrValidTeacher()
}
