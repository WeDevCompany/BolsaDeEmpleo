<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobOffer;
use App\Teacher;
use App\Student;
use App\Tag;

use App\Http\Requests;

class SearchController extends Controller
{
	/*==============================
	 *								*
	 *		  S T U D E N T         *
	 *	 							*
	 *==============================*/

    /**
     * Metodo que obtiene los estudiantes que no han sido dados de alta
     * o si segun los parametros recibidos, en base
     * a la familia profesional del profesor a validar
     * o por un administrador sin restriccion de familia profesional
     */
    public function invalidOrValidStudent($invalidOrValidStudent, $request, $profFamilyValidate = null)
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

    public function deniedStudent()
    {
        $deniedStudent = Student::select('*')
                                    ->join('users', 'users.id', '=', 'user_id')
                                    ->whereNotNull('delete_at')
                                    ->paginate();

        return $deniedStudent;
    }


    /*==============================
	 *								*
	 *		  T E A C H E R         *
	 *	 							*
	 *==============================*/

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
     * Metodo que comprueba si el profesor pasado como parametro esta
     * dado de alta en la aplicacion
     * @param  $idTeacher Id del profesor a comprobar
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

    } // validTeacher()

    /**
     * Metodo que obtiene los profesores que no han sido dados de alta
     * o si segun los parametros recibidos a validar por un administrador
     */
    public function invalidOrValidTeacher($invalidOrValidTeacher, $request)
    {
    	// Obtenemos los profesores que no estan validados
    	// o si lo estan segun los parametros recibidos
        $invalidOrValidTeacher = Teacher::name($request->get('name'))
                                    ->select('profFamilies.*', 'users.*', 'teachers.*')
                                    ->join('users', 'users.id', '=', 'user_id')
                                    ->join('teacherProfFamilies', 'teacherProfFamilies.teacher_id', '=', 'teachers.id')
                                    ->join('profFamilies', 'profFamilies.id', '=', 'teacherProfFamilies.profFamilie_id')
                                    ->whereIn('teachers.id', $invalidOrValidTeacher)
                                    ->paginate();

        return $invalidOrValidTeacher;

    } // invalidOrValidTeacher()


    /*==============================
	 *								*
	 *		   O F F E R S          *
	 *	 							*
	 *==============================*/

    // Metodo que obtiene todas las ofertas de trabajo validadas
    public function validOffer()
    {
    	// Obtenemos todos los profesores validados
    	$validTeacher = \DB::table('verifiedOffers')->select('jobOffer_id')->get();

    	return $validTeacher;

    } // validOffer()

    public function invalidOrValidOffer($invalidOrValidOffer, $request, $profFamilyValidate = null, $truncate = null)
    {

    	$invalidOrValidOffer = JobOffer::name($request->get('name'))
    									->profFamilyTeacher($profFamilyValidate) // Scope que compara las familias profesionales del profesor y las ofertas
    									->select('states.name as stateName', 'cities.name as cityName', 'workCenters.name as workCenterName', 'workCenters.email as workCenterEmail', 'enterprises.name as enterpriseName', 'states.*', 'cities.*', 'workCenters.*', 'enterprises.*', 'profFamilies.*', 'users.*', 'jobOffers.*')
    									->join('profFamilies', 'profFamilies.id', '=', 'jobOffers.profFamilie_id')
    									->join('workCenters', 'workCenters.id', '=', 'jobOffers.workCenter_id')
    									->join('enterprises', 'enterprises.id', '=', 'workCenters.enterprise_id')
    									->join('users', 'users.id', '=', 'user_id')
                                        ->join('cities', 'cities.id', '=','workCenters.citie_id')
                                        ->join('states', 'states.id', '=','cities.state_id')
                                    	->whereIn('jobOffers.id', $invalidOrValidOffer)
                                    	->paginate();

        if ($truncate) {

            $descriptionLength = 250;

            foreach ($invalidOrValidOffer as $key => $value) {
                //dd(mb_strlen($value->description));

                if (mb_strlen($value->description) > $descriptionLength) {

                    $value->description = mb_substr($value->description, 0, $descriptionLength) . '...';

                }

            }
        }

        return $invalidOrValidOffer;

    } // invalidOrValidOffer()

    public function offerTag($idJobOffer)
    {
        $tag = Tag::select('tags.tag', 'jobOffers.id')
                    ->join('offerTags', 'offerTags.tag_id', '=', 'tags.id')
                    ->join('jobOffers', 'jobOffers.id', '=', 'offerTags.jobOffer_id')
                    ->whereIn('jobOffers.id', $idJobOffer)
                    ->get();

        return $tag;
    }

    /**
     * Metodo que comprueba si la oferta pasada como parametro esta
     * dada de alta en la aplicacion
     * @param  $idOffer   Id de la oferta a comprobar
     * @return            Devolvemos los datos de la oferta
     */
    public function verifiedOffer($idOffer)
    {
    	// Obtenemos el profesor dado de alta en la aplicacion
    	$verifiedOffer = JobOffer::where('verifiedOffers.jobOffer_id', '=', $idOffer)
                                        ->join('verifiedOffers', 'verifiedOffers.jobOffer_id', '=', 'jobOffers.id')
                                        ->first();

        return $verifiedOffer;

    } // verifiedOffer()

    public function studentsSubscriptions($idJobOffer)
    {
        $studentsSubscriptions = \DB::table('subcriptions')->select('jobOffer_id', 'id')
                                        ->whereIn('subcriptions.jobOffer_id', $idJobOffer)
                                        ->get();

        return $studentsSubscriptions;
    }

}
