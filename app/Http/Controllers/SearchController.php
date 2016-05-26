<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobOffer;
use App\Teacher;
use App\Student;
use App\User;
use App\Enterprise;
use App\Tag;

use App\Http\Requests;

class SearchController extends Controller
{

    /*==============================
     *                              *
     *           U S E R            *
     *                              *
     *==============================*/

    /**
     * Método que obtiene los datos del usuario pasado como parámetro
     * @param   $idUser Id del usuario
     * @param   $rol    Rol del usuario
     */
    public function getUser($idUser, $rol)
    {
        if ($rol == 'student') {
            
            $param = Student::where('id', '=', $idUser)->withTrashed()->first();

        } else if ($rol == 'teacher'){

            $param = Teacher::where('id', '=', $idUser)->withTrashed()->first();

        } else if ($rol == 'enterprise'){

            $param = Enterprise::where('id', '=', $idUser)->withTrashed()->first();

        }

        $user = User::where('id', '=', $param['user_id'])->withTrashed()->first();

        return $user;

    } // getUser()


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
     *
     * @param  array  $invalidOrValidStudent Estudiantes Válidos o inválidos
     * @param  object $request               Filtro para el buscador
     * @param  array  $profFamilyValidate    Familia profesional del profesor si hubiera
     * @return object                        Todos los estudiantes inválidos o válidos segun los parametro recibidos
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

    /**
     * Metodo que obtiene todos los estudiantes validados
     */
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
     * Método que obtiene todos los estudiantes borrados en la aplicacion a la hora de ser validados,
     * filtrados por una familia profesional si es un profesor o todos si es un admin
     * 
     * @param  array  $profFamilyValidate  Familia profesional del profesor si hubiera
     * @param  object $request             Filtro para el buscador
     */
    public function deniedStudent($request, $profFamilyValidate = null)
    {
        $deniedStudent = Student::name($request->get('name'))
                                    ->profFamilyTeacher($profFamilyValidate) // Scope que compara las familias profesionales del profesor y el alumno
                                    ->select('users.*', 'profFamilies.name', 'students.*')
                                    ->join('users', 'users.id', '=', 'user_id')
                                    ->join('studentCycles', 'studentCycles.student_id', '=', 'students.id')
                                    ->join('cycles', 'cycles.id', '=', 'studentCycles.cycle_id')
                                    ->join('profFamilies', 'profFamilies.id', '=', 'cycles.profFamilie_id')
                                    ->whereNotNull('students.deleted_at')
                                    ->withTrashed() // Omitimos el softdeletes por defecto
                                    ->paginate();

        return $deniedStudent;

    } // deniedStudent()

    /**
     * Método que comprueba segun el id del estudiante pasado si esta borrado en la aplicacion
     * @param  $idStudent Id del estudiante a comprobar
     */
    public function deniedOneStudent($idStudent)
    {
        $deniedOneStudent = Student::where('id', '=', $idStudent)->withTrashed()->first();

        return $deniedOneStudent;

    } // deniedOneStudent()


    /*==============================
	 *								*
	 *		  T E A C H E R         *
	 *	 							*
	 *==============================*/

    /**
     * Metodo que devuelve la familia del profesor logueado
     */
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

    /**
     * Metodo que obtiene todos los profesores validados
     */
    public function validTeacher()
    {
    	// Obtenemos todos los profesores validados
    	$validTeacher = \DB::table('verifiedTeachers')->select('teacher_id')->get();

    	return $validTeacher;

    } // validTeacher()

    /**
     * Metodo que obtiene los profesores que no han sido dados de alta
     * o si segun los parametros recibidos a validar por un administrador
     *
     * @param  array  $invalidOrValidTeacher Profesores Válidos o Inválidos
     * @param  object $request               Filtro para la busqueda
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

    /**
     * Método que obtiene todos los profesores borrados en la aplicacion a la hora de ser validados
     *
     * @param  object $request             Filtro para el buscador
     */
    public function deniedTeacher($request)
    {
        $deniedTeacher = Teacher::name($request->get('name'))
                                    ->select('profFamilies.*', 'users.*', 'teachers.*')
                                    ->join('users', 'users.id', '=', 'user_id')
                                    ->join('teacherProfFamilies', 'teacherProfFamilies.teacher_id', '=', 'teachers.id')
                                    ->join('profFamilies', 'profFamilies.id', '=', 'teacherProfFamilies.profFamilie_id')
                                    ->whereNotNull('teachers.deleted_at')
                                    ->withTrashed()
                                    ->paginate();

        return $deniedTeacher;

    } // deniedTeacher()

    /**
     * Método que comprueba segun el id del profesor pasado si esta borrado en la aplicacion
     * @param  $idStudent Id del profesor a comprobar
     */
    public function deniedOneTeacher($idTeacher)
    {
        $deniedOneTeacher = Teacher::where('id', '=', $idTeacher)->withTrashed()->first();

        return $deniedOneTeacher;

    } // deniedOneTeacher()


    /*==============================
	 *								*
	 *		   O F F E R S          *
	 *	 							*
	 *==============================*/

    /**
     * Metodo que obtiene todas las ofertas de trabajo validadas
     */
    public function validOffer()
    {
    	// Obtenemos todos los profesores validados
    	$validTeacher = \DB::table('verifiedOffers')->select('jobOffer_id')->get();

    	return $validTeacher;

    } // validOffer()

    /**
     * Método que obtiene todas las ofertas de trabajo ya sea filtradas por una familia profesional para un profesor
     * o todas para un administrador para validar o para mostrar las ya validadas según el parámetro recibido, 
     * ademas de cortar el texto de la descripción de la oferta de trabajo
     * @param  array    $invalidOrValidOffer   Oferta Válida o inválida
     * @param  object   $request               Filtro de búsqueda
     * @param  array    $profFamilyValidate    Familia profesional del profesor si hubiera
     * @param  int      $truncate              Extensión máxima de la descripción
     */
    public function invalidOrValidOffer($invalidOrValidOffer, $request, $profFamilyValidate = null, $truncate = null)
    {

    	$invalidOrValidOffer = JobOffer::name($request->get('name'))
    									->profFamilyTeacher($profFamilyValidate) // Scope que compara las familias profesionales del profesor y las ofertas
    									->select('jobOffers.id as idJobOffer', 'states.name as stateName', 'cities.name as cityName', 'workCenters.name as workCenterName', 'workCenters.email as workCenterEmail', 'enterprises.name as enterpriseName', 'states.*', 'cities.*', 'workCenters.*', 'enterprises.*', 'profFamilies.*', 'users.*', 'jobOffers.*')
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

    /**
     * Método que obtiene todos los tags de las ofertas de trabajo pasadas como parámetro
     * @param  array $idJobOffer Ofertas de trabajo de las que se quiere obtener sus tags
     */
    public function offerTag($idJobOffer)
    {
        $tag = Tag::select('tags.tag as nameTag', 'jobOffer_id as idAdd')
                    ->join('offerTags', 'offerTags.tag_id', '=', 'tags.id')
                    ->join('jobOffers', 'jobOffers.id', '=', 'offerTags.jobOffer_id')
                    ->whereIn('jobOffers.id', $idJobOffer)
                    ->get();

        return $tag;

    } // offerTag()

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

    /**
     * Método que obtiene el número de suscripciones de las oferta de trabajo pasada como parámetro
     * @param  array $idJobOffer Ofertas de trabajo de las que se quiere
     *                           obtener el numero de suscripciones
     */
    public function studentsSubscriptions($idJobOffer)
    {
        $studentsSubcriptions = \DB::table('subcriptions')->select(\DB::raw('count(subcriptions.jobOffer_id) as subcriptionCount'), 'jobOffer_id as idAdd')
                                        ->whereIn('subcriptions.jobOffer_id', $idJobOffer)
                                        ->groupBy('jobOffer_id')
                                        ->get();

        return $studentsSubcriptions;
    }

    /**
     * Método auxiliar que recibe como parámetro ofertas de trabajo, suscripciones y tags,
     * uniendo cada suscripcion y tag con su oferta de trabajo correspondiente
     * @param  object $query   Oferta de trabajo
     * @param  object $add     Suscripcion o tag a introducir
     * @param  string $nameKey Señalamos si es una suscripción o un tag
     */
    public function arrayMap($query, $add, $nameKey)
    {
        $tag = 'tag';
        $subcription = 'subcription';

        foreach ($query as $key => $value) {

            $tagCount = null;

            foreach ($add as $keys => $id) {

                if ($value->idJobOffer == $id->idAdd) {

                    if ($nameKey === $tag) {

                        $tagCount[] = $id->nameTag;

                    } elseif ($nameKey === $subcription) {

                        $value->subcriptionCount = $id->subcriptionCount;

                    }

                }

            }

            $value->tagCount = $tagCount;
        }

        return $query;

    } // arrayMap()

    /**
     * [deniedOffer description]
     * @return [type] [description]
     */
    public function deniedOffer($request, $profFamilyValidate = null)
    {
        $deniedOffer = JobOffer::name($request->get('name'))
                                    ->profFamilyTeacher($profFamilyValidate) // Scope que compara las familias profesionales del profesor y las ofertas
                                    ->select('jobOffers.id as idJobOffer', 'states.name as stateName', 'cities.name as cityName', 'workCenters.name as workCenterName', 'workCenters.email as workCenterEmail', 'enterprises.name as enterpriseName', 'states.*', 'cities.*', 'workCenters.*', 'enterprises.*', 'profFamilies.*', 'users.*', 'jobOffers.*')
                                    ->join('profFamilies', 'profFamilies.id', '=', 'jobOffers.profFamilie_id')
                                    ->join('workCenters', 'workCenters.id', '=', 'jobOffers.workCenter_id')
                                    ->join('enterprises', 'enterprises.id', '=', 'workCenters.enterprise_id')
                                    ->join('users', 'users.id', '=', 'user_id')
                                    ->join('cities', 'cities.id', '=','workCenters.citie_id')
                                    ->join('states', 'states.id', '=','cities.state_id')
                                    ->whereNotNull('jobOffers.deleted_at')
                                    ->withTrashed() // Omitimos el softdeletes por defecto
                                    ->paginate();

        return $deniedOffer;

    } // deniedOffer()

    /**
     * Método que comprueba segun el id de la oferta pasada si esta borrada en la aplicacion
     * @param  $idOffer Id de la oferta a comprobar
     */
    public function deniedOneOffer($idOffer)
    {
        $deniedOneOffer = JobOffer::where('id', '=', $idOffer)->withTrashed()->first();

        return $deniedOneOffer;

    } // deniedOneOffer()

} // END Class SearchController
