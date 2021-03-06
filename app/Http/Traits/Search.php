<?php

namespace App\Http\Traits;

use App\Cycle;
use App\Enterprise;
use App\EnterpriseResponsable;
use App\JobOffer;
use App\ProfFamilie;
use App\Student;
use App\Subject;
use App\Tag;
use App\Teacher;
use App\User;
use App\WorkCenter;
use Illuminate\Http\Request;

trait Search {

	/*==============================
		     *                              *
		     *           U S E R            *
		     *                              *
	*/

	/**
	 * Método que obtiene los datos del usuario pasado como parámetro
	 * @param   $idUser Id del usuario
	 * @param   $rol    Rol del usuario
	 */
	public function getUser($idUser, $rol) {
		if ($rol == 'student') {

			$param = Student::where('id', '=', $idUser)->withTrashed()->first();

		} else if ($rol == 'teacher') {

			$param = Teacher::where('id', '=', $idUser)->withTrashed()->first();

		} else if ($rol == 'enterprise') {

			$param = Enterprise::where('id', '=', $idUser)->withTrashed()->first();

		}

		$user = User::where('id', '=', $param['user_id'])->withTrashed()->first();

		return $user;

	} // getUser()

	/*==============================
		     *                              *
		     *        S T U D E N T         *
		     *                              *
	*/

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
	public function invalidOrValidStudent($invalidOrValidStudent, $request, $profFamilyValidate = null) {

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
		$invalidOrValidStudent = Student::filter($request->get('filtros'), $request->get('name'))
			->profFamilyTeacher($profFamilyValidate) // Scope que compara las familias profesionales del profesor y el alumno
			->select('students.id', 'students.firstName', 'students.lastName', 'students.dni', 'users.email', 'users.carpeta', 'users.image', 'profFamilies.name')
			->join('users', 'users.id', '=', 'user_id')
			->join('studentCycles', 'studentCycles.student_id', '=', 'students.id')
			->join('cycles', 'cycles.id', '=', 'studentCycles.cycle_id')
			->join('profFamilies', 'profFamilies.id', '=', 'cycles.profFamilie_id')
		//->whereIn('profFamilies.name', $profFamilyValidate)
			->whereIn('students.id', $invalidOrValidStudent)
			->groupBy('students.id')
			->paginate();

		return $invalidOrValidStudent;

	} // invalidOrValidStudent()

	/**
	 * Metodo que obtiene los ids de estudiantes sin verificar
	 */
	public function notVerifiedStudents($profFamilyValidate = null) {
		$validStudent = Self::validStudent();
		return Student::select('students.id')
			->profFamilyTeacher($profFamilyValidate)
			->join('studentCycles', 'studentCycles.student_id', '=', 'students.id')
			->join('cycles', 'cycles.id', '=', 'studentCycles.cycle_id')
			->join('profFamilies', 'profFamilies.id', '=', 'cycles.profFamilie_id')
			->whereNotIn('students.id', array_column($validStudent, 'student_id'))
			->get();
	} // notVerifiedStudents()

	/**
	 * Metodo que obtiene todos los estudiantes validados
	 */
	public function validStudent() {

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
	public function verifiedStudent($idStudent) {
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
	public function deniedStudent($request, $profFamilyValidate = null) {
		$deniedStudent = Student::filter($request->get('filtros'), $request->get('name'))
			->profFamilyTeacher($profFamilyValidate) // Scope que compara las familias profesionales del profesor y el alumno
			->select('users.*', 'profFamilies.name', 'students.*')
			->join('users', 'users.id', '=', 'user_id')
			->join('studentCycles', 'studentCycles.student_id', '=', 'students.id')
			->join('cycles', 'cycles.id', '=', 'studentCycles.cycle_id')
			->join('profFamilies', 'profFamilies.id', '=', 'cycles.profFamilie_id')
			->whereNotNull('students.deleted_at')
			->distinct('students.id')
			->withTrashed() // Omitimos el softdeletes por defecto
			->paginate();

		return $deniedStudent;

	} // deniedStudent()

	/**
	 * Método que comprueba segun el id del estudiante pasado si esta borrado en la aplicacion
	 * @param  $idStudent Id del estudiante a comprobar
	 */
	public function deniedOneStudent($idStudent) {
		$deniedOneStudent = Student::where('id', '=', $idStudent)->withTrashed()->first();

		return $deniedOneStudent;

	} // deniedOneStudent()

	/**
	 * Metodo que devuelve la familia del estudiante logueado
	 */
	public function profFamilyStudent() {
		// Obtenemos las familias profesionales del estudiante por nombre
		$profFamilyStudent = Student::select('profFamilies.name')
			->where('user_id', '=', \Auth::user()->id)
			->join('studentCycles', 'studentCycles.student_id', '=', 'students.id')
			->join('cycles', 'cycles.id', '=', 'studentCycles.cycle_id')
			->join('profFamilies', 'profFamilies.id', '=', 'cycles.profFamilie_id')
			->get();

		return $profFamilyStudent;

	} // profFamilyStudent()

	/*==============================
		     *                              *
		     *        T E A C H E R         *
		     *                              *
	*/

	/**
	 * Metodo que devuelve la familia del profesor logueado
	 */
	public function profFamilyTeacher($ids = false) {
		if ($ids == false) {
			// Obtenemos las familias profesionales del profesor por nombre
			$profFamilyTeacher = Teacher::select('profFamilies.name')
				->where('user_id', '=', \Auth::user()->id)
				->where('profFamilies.active', '=', 1)
				->join('teacherProfFamilies', 'teacherProfFamilies.teacher_id', '=', 'teachers.id')
				->join('profFamilies', 'profFamilies.id', '=', 'teacherProfFamilies.profFamilie_id')
				->get();
		} else {
			// Obtenemos las familias profesionales del profesor por id
			$profFamilyTeacher = Teacher::select('profFamilies.id')
				->where('user_id', '=', \Auth::user()->id)
				->where('profFamilies.active', '=', 1)
				->join('teacherProfFamilies', 'teacherProfFamilies.teacher_id', '=', 'teachers.id')
				->join('profFamilies', 'profFamilies.id', '=', 'teacherProfFamilies.profFamilie_id')
				->get();
		}

		return $profFamilyTeacher;

	} // profFamilyTeacher()

	/**
	 * Metodo que comprueba si el profesor pasado como parametro esta
	 * dado de alta en la aplicacion
	 * @param  $idTeacher Id del profesor a comprobar
	 * @return            Devolvemos los datos del profesor
	 */
	public function verifiedTeacher($idTeacher) {
		// Obtenemos el profesor dado de alta en la aplicacion
		$verifiedTeacher = Teacher::where('verifiedTeachers.teacher_id', '=', $idTeacher)
			->join('verifiedTeachers', 'verifiedTeachers.teacher_id', '=', 'teachers.id')
			->first();

		return $verifiedTeacher;

	} // verifiedTeacher()

	/**
	 * Metodo que obtiene los ids de profesores sin verificar
	 */
	public function notVerifiedTeachers() {
		$validTeacher = Self::validTeacher();
		return Teacher::select('teachers.id')
			->whereNotIn('teachers.id', array_column($validTeacher, 'teacher_id'))
			->get();
	} // notVerifiedTeachers()

	/**
	 * Metodo que obtiene todos los profesores validados
	 */
	public function validTeacher() {
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
	public function invalidOrValidTeacher($invalidOrValidTeacher, $request) {
		// Obtenemos los profesores que no estan validados
		// o si lo estan segun los parametros recibidos
		$invalidOrValidTeacher = Teacher::filter($request->get('filtros'), $request->get('name'))
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
	public function deniedTeacher($request) {
		$deniedTeacher = Teacher::filter($request->get('filtros'), $request->get('name'))
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
	public function deniedOneTeacher($idTeacher) {
		$deniedOneTeacher = Teacher::where('id', '=', $idTeacher)->withTrashed()->first();

		return $deniedOneTeacher;

	} // deniedOneTeacher()

	/**
	 * Método que obtiene todos los administradores
	 */
	public function admin() {
		// Obtenemos los administradores
		$admin = Teacher::select('users.email', 'teachers.*')
			->join('users', 'users.id', '=', 'teachers.user_id')
			->where('users.rol', '=', 'administrador')
			->get();

		return $admin;
	}

	/**
	 * Metodo que devuelve el id y el nombre de los ciclos pertenecientes
	 * a las familias profesionales de un profesor
	 */
	public function teacherCycles($onlyId = false) {
		// Obtenemos los ids de las familias profesionales del profesor
		$profFamilies = Self::profFamilyTeacher(true);
		// Obtenemos las familias profesionales del profesor

		if ($onlyId === true) {
			$cycles = Cycle::select('id')
				->where('cycles.active', '=', '1')
				->whereIn('profFamilie_id', $profFamilies)
				->orderBy('name', 'asc')
				->get();
		} else {
			$cycles = Cycle::select('id', 'name')
				->where('cycles.active', '=', '1')
				->whereIn('profFamilie_id', $profFamilies)
				->orderBy('name', 'asc')
				->get();
		}

		return $cycles;

	} // teacherCycles()

	/**
	 * Metodo que devuelve una asignatura de un profesor cualquiera que se este cursando el año indicado
	 */
	public function subjectTeachers($subjectId, $year, $user_id = false) {
		$subjectId = (int) $subjectId;
		$year = (int) $year;

		if ($user_id === true) {
			$subjects = Subject::select('subjects.id')
				->join('subjectTeachers', 'subjectTeachers.subject_id', '=', 'subjects.id')
				->join('teachers', 'teachers.id', '=', 'subjectTeachers.teacher_id')
				->where('subjectTeachers.subject_id', '=', $subjectId)
				->where('dateFrom', $year)
				->where('user_id', '=', \Auth::user()->id)
				->get();
		} else {
			$subjects = Subject::select('subjects.id')
				->join('subjectTeachers', 'subjectTeachers.subject_id', '=', 'subjects.id')
				->where('subjectTeachers.subject_id', '=', $subjectId)
				->where('dateFrom', $year)
				->get();
		}

		return $subjects;

	} // subjectTeachers()

	/**
	 * Metodo que obtiene el id de un profesor a traves de su id de usuario
	 */
	public function getTeacherId() {

		$teacherId = Teacher::select('id')->where('user_id', '=', \Auth::user()->id)->get();

		return $teacherId;

	} // getTeacherId()

	/*==============================*
		     *                              *
		     *         C Y C L E S          *
		     *                              *
	*/

	/**
	 * Metodo que devuelve las asignaturas de un ciclo
	 */
	public function cycleSubjects($cycle_id) {
		$cycle_id = (int) $cycle_id;

		// Obtenemos las familias profesionales del profesor
		$subjects = Subject::select('subjects.id', 'subjects.name')
			->join('cycleSubjects', 'cycleSubjects.subject_id', '=', 'subjects.id')
			->join('cycles', 'cycles.id', '=', 'cycleSubjects.cycle_id')
			->where('cycles.active', '=', 1)
			->where('cycle_id', '=', $cycle_id)
			->orderBy('name', 'asc')
			->get();

		return $subjects;

	} // cycleSubjects()

	/**
	 * Metodo que comprueba si el id de la asignatura corresponde a ese ciclo
	 */
	public function cycleSubject($cycle_id, $subject_id) {
		$cycle_id = (int) $cycle_id;
		$subject_id = (int) $subject_id;

		$subject = Subject::select('subjects.id')
			->join('cycleSubjects', 'cycleSubjects.subject_id', '=', 'subjects.id')
			->join('cycles', 'cycles.id', '=', 'cycleSubjects.cycle_id')
			->where('cycles.active', '=', 1)
			->where('cycle_id', '=', $cycle_id)
			->where('subject_id', '=', $subject_id)
			->get();

		return $subject;

	} // cycleSubject()

	/**
	 * Metodo que devuelve las asignaturas que un profesor no cursa
	 */
	public function cycleFreeSubjects($cycle_id, $year) {
		$cycle_id = (int) $cycle_id;
		$year = (int) $year;

		$noSubjects = self::cycleSubjectsYear($cycle_id, $year);

		// Obtenemos las familias profesionales del profesor
		$subjects = Subject::select('subjects.id', 'subjects.name')
			->join('cycleSubjects', 'cycleSubjects.subject_id', '=', 'subjects.id')
			->join('cycles', 'cycles.id', '=', 'cycleSubjects.cycle_id')
			->where('cycles.active', '=', 1)
			->where('cycle_id', '=', $cycle_id)
			->whereNotIn('subjects.id', $noSubjects)
			->orderBy('name', 'asc')
			->get();

		return $subjects;

	} // cycleFreeSubjects()

	/**
	 * Metodo que devuelve las asignaturas de un ciclo en un año concreto
	 */
	public function cycleSubjectsYear($cycle_id, $year, $name = false) {
		$cycle_id = (int) $cycle_id;
		$year = (int) $year;
		$select[0] = 'subjects.id';

		if ($name) {
			$select[1] = 'subjects.name';
		}

		// Obtenemos las familias profesionales del profesor
		$subjects = Subject::select($select)
			->join('cycleSubjects', 'cycleSubjects.subject_id', '=', 'subjects.id')
			->join('subjectTeachers', 'subjectTeachers.subject_id', '=', 'subjects.id')
			->join('teachers', 'teachers.id', '=', 'subjectTeachers.teacher_id')
			->join('cycles', 'cycles.id', '=', 'cycleSubjects.cycle_id')
			->where('cycles.active', '=', 1)
			->where('cycle_id', '=', $cycle_id)
			->where('dateFrom', '=', $year)
			->where('user_id', '=', \Auth::user()->id)
			->orderBy('subjects.name', 'asc')
			->get();

		return $subjects;

	} // cycleSubjectsYear()

	/**
	 * Metodo que devuelve las asignaturas de un ciclo en un año concreto que
	 * no haya cursado el profesor actual pero si otro profesor
	 */
	public function cycleSubjectsYearTaked($cycle_id, $year) {
		$cycle_id = (int) $cycle_id;
		$year = (int) $year;

		// Obtenemos las familias profesionales del profesor
		$subjects = Subject::select('subjects.id')
			->join('cycleSubjects', 'cycleSubjects.subject_id', '=', 'subjects.id')
			->join('subjectTeachers', 'subjectTeachers.subject_id', '=', 'subjects.id')
			->join('teachers', 'teachers.id', '=', 'subjectTeachers.teacher_id')
			->join('cycles', 'cycles.id', '=', 'cycleSubjects.cycle_id')
			->where('cycles.active', '=', 1)
			->where('cycle_id', '=', $cycle_id)
			->where('dateFrom', '=', $year)
			->where('user_id', '!=', \Auth::user()->id)
			->get();

		return $subjects;

	} // cycleSubjectsYearTaked()

	/**
	 * Metodo que devuelve el id del ciclo si lo imparte ese profesor
	 */
	public function teacherCycleId($cycle_id, $register = false) {
		$cycle_id = (int) $cycle_id;

		if ($register) {
			$cycles = Cycle::select('id')
				->where('cycles.active', '=', '1')
				->where('cycles.id', '=', $cycle_id)
				->get()->toArray();
		} else {

			$idTeacherCycles = self::teacherCycles(true);

			$cycles = Cycle::select('id')
				->where('cycles.active', '=', '1')
				->where('cycles.id', '=', $cycle_id)
				->whereIn('cycles.id', $idTeacherCycles)
				->get();
		}

		return $cycles;

	} // teacherCycleId()

	/*==============================
		     *                              *
		     *         O F F E R S          *
		     *                              *
	*/

	/**
	 * Metodo que obtiene todas las ofertas de trabajo validadas
	 */
	public function validOffer($id = null) {
		// Obtenemos todas las ofertas validadas
		$validOffer = \DB::table('verifiedOffers')->select('jobOffer_id');

		// Si recibimos el id filtramos por el
		if ($id != null) {
			$id = [$id];
			$validOffer = $validOffer->whereIn('jobOffer_id', $id);
		}

		return $validOffer->get();

	} // validOffer()

	public function getEnterpriseId($idUser) {
		$enterprise = Enterprise::select('enterprises.id')
			->join('users as u', 'u.id', '=', 'user_id')
			->where('u.id', $idUser)
			->get();
		return $enterprise;
	}

	/**
	 * Metodo que obtiene todas las ofertas de trabajo validadas
	 */
	public function validOfferEnterprise($id, $request, $idOffer = false) {
		// Obtenemos todas las ofertas validadas
		$validOffer = Enterprise::filter($request->get('filtros'), $request->get('name'))
			->select('jo.id as idJobOffer', 'states.name as stateName', 'cities.name as cityName', 'wc.name as workCenterName', 'wc.email as workCenterEmail', 'enterprises.name as enterpriseName', 'states.*', 'cities.*', 'wc.*', 'enterprises.*', 'pf.*', 'users.*', 'jo.*')
			->join('workCenters as wc', 'wc.enterprise_id', '=', 'enterprises.id')
			->join('jobOffers as jo', 'jo.workCenter_id', '=', 'wc.id')
			->join('verifiedOffers as vo', 'vo.jobOffer_id', '=', 'jo.id')
			->join('profFamilies as pf', 'pf.id', '=', 'jo.profFamilie_id')
			->join('users', 'users.id', '=', 'user_id')
			->join('cities', 'cities.id', '=', 'wc.citie_id')
			->join('states', 'states.id', '=', 'cities.state_id')
			->whereNull('jo.deleted_at');
		if (!$idOffer) {
			$validOffer = $validOffer->where('enterprises.id', $id);
		} else {
			$validOffer = $validOffer->where('jo.id', $id);
		}
		return $validOffer->paginate();

	} // validOffer()

	public function existsProfFamily($idProfFamily) {
		$profFamilies = ProfFamilie::where('id', '=', $idProfFamily)->first();

		return $profFamilies;

	} // existsProfFamily()

	public function existsCycle($idCycle) {
		$Cycles = Cycle::where('id', '=', $idCycle)->first();

		return $Cycles;

	} // existsCycle()

	/**
	 * Método que obtiene todas las ofertas de trabajo ya sea filtradas por una familia profesional para un profesor
	 * o todas para un administrador para validar o para mostrar las ya validadas según el parámetro recibido,
	 * ademas de cortar el texto de la descripción de la oferta de trabajo
	 * @param  array    $invalidOrValidOffer   Oferta Válida o inválida
	 * @param  object   $request               Filtro de búsqueda
	 * @param  array    $profFamilyValidate    Familia profesional del profesor si hubiera
	 * @param  int      $truncate              Extensión máxima de la descripción
	 */
	public function invalidOrValidOffer($invalidOrValidOffer, $request, $profFamilyValidate = null, $truncate = null, $studentId = null) {
		//dd($studentId);//18
		//dd($invalidOrValidOffer);// 1,3,4,5,6,7,8,9,10,11,13,14,15
		//dd($profFamilyValidate);// 0 Informática y Comunicaciones

		$invalidOrValidOffer = JobOffer::filter($request->get('filtros'), $request->get('name'))
			->profFamilyTeacher($profFamilyValidate) // Scope que compara las familias profesionales del profesor y las ofertas
			->select('jobOffers.id as idJobOffer', 'states.name as stateName', 'cities.name as cityName', 'workCenters.name as workCenterName', 'workCenters.email as workCenterEmail', 'enterprises.name as enterpriseName', 'states.*', 'cities.*', 'workCenters.*', 'enterprises.*', 'profFamilies.*', 'users.*', 'jobOffers.*')
			->join('profFamilies', 'profFamilies.id', '=', 'jobOffers.profFamilie_id')
			->join('workCenters', 'workCenters.id', '=', 'jobOffers.workCenter_id')
			->join('enterprises', 'enterprises.id', '=', 'workCenters.enterprise_id')
			->join('users', 'users.id', '=', 'user_id')
			->join('cities', 'cities.id', '=', 'workCenters.citie_id')
			->join('states', 'states.id', '=', 'cities.state_id')
			->whereIn('jobOffers.id', $invalidOrValidOffer);
		if (isset($studentId)) {
			$invalidOrValidOffer = $invalidOrValidOffer->join('subcriptions', 'jobOffer_id', '=', 'jobOffers.id')
				->where('student_id', '=', $studentId);
		}
		$invalidOrValidOffer = $invalidOrValidOffer->paginate();

		//dd($invalidOrValidOffer->toSql());
		if ($truncate) {

			$descriptionLength = 250;

			foreach ($invalidOrValidOffer as $key => $value) {
				//dd(mb_strlen($value->description));

				if (mb_strlen($value->description) > $descriptionLength) {

					$value->description = mb_substr($value->description, 0, $descriptionLength) . '...';

				}
				// llamamos al método que nos seteará las otras etiquetas en caso de haberlas
				$this->cleanOtherTags($value);

			}
		} else {
			//dd($invalidOrValidOffer);
			$this->setOtherTags($invalidOrValidOffer);

		}
		return $invalidOrValidOffer;
	} // invalidOrValidOffer()

	public function allMapCenters() {
		$enterpriseCenters = WorkCenter::select('workCenters.id', 'workCenters.name')->join('enterprises', 'enterprises.id', '=', 'workCenters.enterprise_id')
			->where('enterprises.user_id', '=', \Auth::user()->id)
			->get();

		foreach ($enterpriseCenters as $key => $value) {
			$allEnterpriseCenters[$value->id] = $value->name;
		}

		return $allEnterpriseCenters;
	}

	// Funcion que obtiene todas las tags
	public function allMapTags() {
		$tag = Tag::select('tag')->get();

		foreach ($tag as $key => $value) {
			$allTags[$value->tag] = $value->tag;
		}

		return $allTags;

	} // allTags()

	// Funcion que obtiene todas las ProfFamilies
	public function allMapProfFamilies() {
		$profFamilie = ProfFamilie::select('name')->where('active', '=', 1)->get();

		foreach ($profFamilie as $key => $value) {
			$allProfFamilies[$value->name] = $value->name;
		}

		return $allProfFamilies;

	} // allProfFamilies()

	public function getDeniedProfFamilie($idProfFamily) {

		$deniedProfFamilie = ProfFamilie::where('id', '=', $idProfFamily)->withTrashed()->first();

		return $deniedProfFamilie;

	} // getDeniedProfFamilie()

	/**
	 * Método que extrae todos los comentarios de una oferta
	 * @param  Integer $idOffer Id de la oferta que queremos obtener
	 * @return Resultados
	 */
	public function getComments($idOffer) {
		// sino es un array lo convierto
		if (!is_array($idOffer)) {
			$idOffer = [$idOffer];
		}

		$comments = JobOffer::select('comments.*', 'image', 'carpeta', 'teachers.firstName', 'teachers.lastName', 'users.id as idUser')
			->join('comments', 'jobOffer_id', '=', 'jobOffers.id')
			->join('teachers', 'teachers.id', "=", 'comments.teacher_id')
			->join('users', 'users.id', '=', 'teachers.user_id')
			->whereIn('jobOffers.id', $idOffer)
			->get();

		return $comments;
	}

	/**
	 * Método que limpia las etiqujetas
	 * @param  Object $value Resultado de la consulta que obtiene las otras etiquetas puestas por la empresas
	 * @return Object $value Con un nuevo parametro
	 */
	public function cleanOtherTags($value) {
		// por cada registro que tenga el campo other
		// se generará un array el cual contendrá
		// las otras etiquetas
		//dd($value);
		if ($value->others) {
			$aux = explode(",", $value->others);
			foreach ($aux as $key1 => $value1) {
				# Limpiamos los espacios detrás
				$aux[$key1] = trim($value1);
			}

			// creamos un atributo al vuelo
			return $value->newOthers = $aux;
		}
	} // cleanOtherTags()

	public function setOtherTags($queryResults) {
		foreach ($queryResults as $key => $value) {
			$this->cleanOtherTags($value);
		}
	}

	/**
	 * Método que obtiene todos los tags de las ofertas de trabajo pasadas como parámetro
	 * @param  array $idJobOffer Ofertas de trabajo de las que se quiere obtener sus tags
	 */
	public function offerTag($idJobOffer) {
		if (!is_array($idJobOffer)) {
			$idJobOffer = [$idJobOffer];
		}

		$tag = Tag::select('tags.tag as nameTag', 'jobOffer_id as idAdd')
			->join('offerTags', 'offerTags.tag_id', '=', 'tags.id')
			->join('jobOffers', 'jobOffers.id', '=', 'offerTags.jobOffer_id')
			->whereIn('jobOffers.id', $idJobOffer)
			->get();

		return $tag;

	} // offerTag()

	/**
	 * Metodo que obtiene los ids de ofertas sin verificar
	 */
	public function notVerifiedOffers($profFamilyValidate = null) {
		$validOffer = Self::validOffer();
		return JobOffer::select('jobOffers.id')
			->profFamilyTeacher($profFamilyValidate)
			->join('profFamilies', 'profFamilies.id', '=', 'profFamilie_id')
			->whereNotIn('jobOffers.id', array_column($validOffer, 'jobOffer_id'))
			->get();
	} // notVerifiedOffers()

	/**
	 * Metodo que comprueba si la oferta pasada como parametro esta
	 * dada de alta en la aplicacion
	 * @param  $idOffer   Id de la oferta a comprobar
	 * @return            Devolvemos los datos de la oferta
	 */
	public function verifiedOffer($idOffer) {
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
	public function studentsSubscriptions($idJobOffer) {
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
	public function arrayMap($query, $add, $nameKey, $onlyOne = null) {
		$tag = 'tag';
		$subcription = 'subcription';
		$comment = 'comment';
		// si es solamente una oferta, al intentar acceder a varios objetos
		// en el primer bucle foreach daba un error, para solucionarlo
		// hemos permitido que se le pase un parametro más el cúal se encargará
		// de controlar si viene una sola oferta o no
		// este método es llamado desde otros métodos los cuales nos dan una abstracción al uso de este método
		if (isset($onlyOne)) {
			$tagCount = null;
			$comments = null;
			//dd($query);
			foreach ($add as $keys => $id) {
				if ($query->idJobOffer == $id->idAdd) {

					if ($nameKey === $tag) {

						$tagCount[] = $id->nameTag;

					} elseif ($nameKey === $subcription) {

						$query->subcriptionCount = $id->subcriptionCount;

					} elseif ($nameKey === $comment) {
						$comments[] = $id->idComment;
					}

				}

			}

			$query->tagCount = $tagCount;

			$query->coments = $comments;
		} else {
			foreach ($query as $key => $value) {

				$tagCount = null;
				$comments = null;
				foreach ($add as $keys => $id) {
					if ($value->idJobOffer == $id->idAdd) {

						if ($nameKey === $tag) {

							$tagCount[] = $id->nameTag;

						} elseif ($nameKey === $subcription) {

							$value->subcriptionCount = $id->subcriptionCount;

						} elseif ($nameKey === $comment) {
							$comments[] = $id->idComment;
						}

					}

				}

				$value->tagCount = $tagCount;

				$value->comments = $comments;
			}
		}

		return $query;

	} // arrayMap()

	/**
	 * Método que obtiene todas las ofertas borradas de la aplicacion con softDeletes
	 * @param  object $request            Filtro para las búsquedas
	 * @param  array  $profFamilyValidate Familias profesionales del profesor si hubiera
	 */
	public function deniedOffer($request, $profFamilyValidate = null) {
		$deniedOffer = JobOffer::filter($request->get('filtros'), $request->get('name'))
			->profFamilyTeacher($profFamilyValidate) // Scope que compara las familias profesionales del profesor y las ofertas
			->select('jobOffers.id as idJobOffer', 'states.name as stateName', 'cities.name as cityName', 'workCenters.name as workCenterName', 'workCenters.email as workCenterEmail', 'enterprises.name as enterpriseName', 'states.*', 'cities.*', 'workCenters.*', 'enterprises.*', 'profFamilies.*', 'users.*', 'jobOffers.*')
			->join('profFamilies', 'profFamilies.id', '=', 'jobOffers.profFamilie_id')
			->join('workCenters', 'workCenters.id', '=', 'jobOffers.workCenter_id')
			->join('enterprises', 'enterprises.id', '=', 'workCenters.enterprise_id')
			->join('users', 'users.id', '=', 'user_id')
			->join('cities', 'cities.id', '=', 'workCenters.citie_id')
			->join('states', 'states.id', '=', 'cities.state_id')
			->whereNotNull('jobOffers.deleted_at')
			->withTrashed() // Omitimos el softdeletes por defecto
			->paginate();

		return $deniedOffer;

	} // deniedOffer()

	/**
	 * Método que comprueba segun el id de la oferta pasada si esta borrada en la aplicacion
	 * @param  $idOffer Id de la oferta a comprobar
	 */
	public function deniedOneOffer($idOffer) {
		$deniedOneOffer = JobOffer::where('id', '=', $idOffer)->withTrashed()->first();

		return $deniedOneOffer;

	} // deniedOneOffer()

	/*==============================
		     *                              *
		     *     E N T E R P R I S E      *
		     *                              *
	*/

	/**
	 * Método que muestra todas las empresas dadas de alta en la aplicacion
	 * @param  object $request Filtro de búsqueda
	 */
	public function verifiedEnterprise($request) {
		$verifiedEnterprise = Enterprise::filter($request->get('filtros'), $request->get('name'))
			->select('workCenters.name as workCenterName', 'workCenters.*', 'users.*', 'enterprises.*')
			->join('users', 'users.id', '=', 'enterprises.user_id')
			->join('workCenters', 'workCenters.enterprise_id', '=', 'enterprises.id')
			->where('workCenters.principalCenter', '=', '1')
			->paginate();

		return $verifiedEnterprise;

	} // verifiedEnterprise()

	public function deniedEnterprise($request) {
		$verifiedEnterprise = Enterprise::filter($request->get('filtros'), $request->get('name'))
			->select('workCenters.name as workCenterName', 'workCenters.*', 'users.*', 'enterprises.*')
			->join('users', 'users.id', '=', 'enterprises.user_id')
			->join('workCenters', 'workCenters.enterprise_id', '=', 'enterprises.id')
			->where('workCenters.principalCenter', '=', '1')
			->whereNotNull('enterprises.deleted_at')
			->withTrashed() // Omitimos el softdeletes por defecto
			->paginate();

		return $verifiedEnterprise;

	} // deniedEnterprise()

	/**
	 * Método que comprueba segun el id de la empresa pasada si esta borrada en la aplicacion
	 * @param  $idEnterprise Id de la oferta a comprobar
	 */
	public function deniedOneEnterprise($idEnterprise) {
		$deniedOneEnterprise = Enterprise::where('id', '=', $idEnterprise)->withTrashed()->first();

		return $deniedOneEnterprise;

	} // deniedOneEnterprise()

	// Funcion que obtiene todlos responsables de un centro de trabajo
	public function allMapResponsableCenter($idEnterprise) {
		$responsables = EnterpriseResponsable::select('enterpriseResponsables.*')
			->join('enterpriseCenterResponsables', 'enterpriseCenterResponsables.enterpriseResponsable_id', '=', 'enterpriseResponsables.id')
			->join('workCenters', 'workCenters.id', '=', 'enterpriseCenterResponsables.workCenter_id')
			->join('enterprises', 'enterprises.id', '=', 'workCenters.enterprise_id')
			->where('enterprises.id', '=', $idEnterprise)
			->get();

		foreach ($responsables as $key => $value) {
			$allResponsables[$value->id] = $value->firstName . $value->lastName;
		}

		return $allResponsables;

	} // allMapOfferTags()

	// Funcion que obtiene todas las tags de una oferta en concreto
	public function allMapOfferTags($idOffer) {
		$tag = Tag::select('*')
			->join('offerTags', 'offerTags.tag_id', '=', 'tags.id')
			->where('jobOffer_id', '=', $idOffer)
			->get();

		foreach ($tag as $key => $value) {
			$allTags[$value->tag_id] = $value->tag;
		}

		return $allTags;

	} // allMapOfferTags()

	/**
	 * Método que obtiene el centro de trabajo tanto para empresas, como para administradores
	 * @param  Integer $id Id del botón
	 * @return [type]     [description]
	 */
	public function getWorkCenter($id = null, $paginate = false) {

		// Hacemo que este método pueda funcionar con empresas y con Administradores
		// Si el parametro se le envia es porque eres administrador
		// sino es porque eres empresa
		if (!isset($id)) {
			$idAux = \Auth::user()->id;
			try {
				$id = Enterprise::select('id')->where('user_id', '=', $idAux)->get();
				if (!$id->isEmpty() && $id[0]) {
					$id = $id[0]->id;
				} else {
					abort('500');
				}
			} catch (Exception $e) {
				abort('500');
			}

		} else {
			$id = (int) $id;
		}
		try {
			$workCenters = WorkCenter::select('enterprises.name as enterpriseName', 'enterprises.*', 'cities.name as cityName', 'workCenters.*')
				->join('enterprises', 'workCenters.enterprise_id', '=', 'enterprises.id')
				->join('cities', 'cities.id', '=', 'workCenters.citie_id')
				->where('enterprise_id', '=', $id);
			// si se quiere
			// con pagionación o toda de golpe
			if (isset($paginate) && $paginate === true) {
				$workCenters = $workCenters->paginate();
			} else {
				$workCenters = $workCenters->get();
			}
			return $workCenters;
		} catch (Exception $e) {
			abort('500');
		}
	} // getWorkCenter()

	/**
	 * Método que mapea los centros de trabajo como arrays
	 * @param  Array $queryResults Resultados de la consulta
	 */
	public function mapArray($queryResults) {
		$result = [];
		foreach ($queryResults as $key => $value) {
			$result[$value->id] = $value->name;
		}
		return $result;
	} // mapWorCenters()

	/**
	 * Método que obtiene el centro de trabajo tanto para empresas, como para administradores
	 * @param  Integer $id Id del botón
	 */
	public function getEnterpriseResponsable($id = null, $paginate = false, $request = null) {

		// Hacemo que este método pueda funcionar con empresas y con Administradores
		// Si el parametro se le envia es porque eres administrador
		// sino es porque eres empresa
		if (!isset($id)) {
			$idAux = \Auth::user()->id;
			try {
				$id = Enterprise::select('id')->where('user_id', '=', $idAux)->get();
				if (!$id->isEmpty() && $id[0]) {
					$id = $id[0]->id;
				} else {
					abort('500');
				}
			} catch (Exception $e) {
				abort('500');
			}

		} else {
			$id = (int) $id;
		}
		try {
			$enterpriseResponsable = EnterpriseResponsable::select('enterpriseResponsables.*', 'wc.id as idWorkCenter', 'wc.name as nameWc')
				->join('enterpriseCenterResponsables as ecr', 'ecr.enterpriseResponsable_id', '=', 'enterpriseResponsables.id')
				->join('workCenters as wc', 'wc.id', '=', 'ecr.workCenter_id')
				->where('wc.enterprise_id', '=', $id);

			// Si recibimos request para filtrar por buscador
			if (isset($request)) {
				$enterpriseResponsable = $enterpriseResponsable->filter($request->get('filtros'), $request->get('name'));
			}

			// si se quiere
			// con pagionación o toda de golpe
			if (isset($paginate) && $paginate === true) {
				$enterpriseResponsable = $enterpriseResponsable->paginate();
			} else {
				$enterpriseResponsable = $enterpriseResponsable->get();
			}
			$enterpriseResponsable = $this->addName($enterpriseResponsable);
			return $enterpriseResponsable;
		} catch (Exception $e) {
			abort('500');
		}
	} // getWorkCenter()
	/**
	 * Métyodo que le añade un nombre completo al responsable de trabajo
	 * @param [type] $object [description]
	 */
	public function addName($object) {
		foreach ($object as $key => $value) {
			$value->name = $value->firstName . " " . $value->lastName;
		}
		return $object;
	}

} // END Class SearchController