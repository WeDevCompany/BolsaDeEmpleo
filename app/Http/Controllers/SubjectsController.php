<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Subject;
use Illuminate\Support\Facades\Session;
use App\Http\Traits\Search;

class SubjectsController extends Controller
{
    use Search;
    
	protected $request = null;          // Inicializada a null
	protected $rules = null;          // Inicializada a null
    protected $route = null;

    public function __construct(Request $request)
    {
        $this->rules = [
            'cycleId' => 'required|digits_between:1,10',
            'yearFromId' => 'required|digits:4',
            'allSubjects.*' => 'digits_between:1,10',
            'mySubjects.*' => 'digits_between:1,10',
        ];

        $this->request = $request;
        $this->route = \Auth::user()->rol;
    }

	public function index()
    {
        // Variale de zona
        $zona = config('zona.configuracion.subjects');

        // Obtenemos los años en los que se ha impartido una asignatura.
        for ($i = date('Y'); $i >= 1990; $i--) {
            $j = $i+1;
            $years[$i] = $i . '-' . $j;
        }

        // Obtenemos los ciclos a los que pertenece un profesor.
        $cycles = $this->teacherCycles()->lists('name', 'id')->toArray();

        // Obtengo el primer año seleccionado o, si existe, el valor de $_GET
        if($_GET && isset($_GET['yearFrom'])){
            // Si el año no es valido lo redirijo
            if($_GET['yearFrom'] < 1990 || $_GET['yearFrom'] > date('Y')+5) {
                Session::flash('message_Negative', 'Introduce un año válido.');
                return \Redirect::to($this->route . '/asignaturas');
            } else {
                $subjectYear = (int) $_GET['yearFrom'];
            }
        } else {
            $subjectYear = array_keys($years)[0];
        }

        // Obtengo el identificador del primer ciclo o, si existe, el valor de $_GET
        if($_GET && isset($_GET['cycle'])){
            // Compruebo si el ciclo es suyo
            $result = $this->teacherCycleId($_GET['cycle'])->toArray();

            // Si no es suyo lo redirijo
            if(empty($result)) {
                Session::flash('message_Negative', 'Escoje ciclos a los que tengas acceso.');
                return \Redirect::to($this->route . '/asignaturas');
            } else {        
                $cycleId = (int) $_GET['cycle'];
            }
        } else {
            $cycleId = array_keys($cycles)[0];
        }

        // Obtengo las asignaturas de un profesor
        $mySubjects = $this->cycleSubjectsYear($cycleId, $subjectYear, true)->lists('name', 'id')->toArray();

        // Obtenemos las asignaturas que no ha impartido
        $allSubjects = $this->cycleFreeSubjects($cycleId, $subjectYear)->lists('name', 'id')->toArray();

        // Obtenemos las asignaturas cogidas
        $takedSubjects = $this->cycleSubjectsYearTaked($cycleId, $subjectYear)->lists('id')->toArray();
        
        return view('subject/subjects', compact('zona', 'cycles', 'years', 'allSubjects', 'mySubjects', 'subjectYear', 'cycleId', 'takedSubjects'));

    } // index()

    public function store()
    {
        // 3- Compruebo si alguna de allSubjects esta insertada
        // 3.1- Si lo está le añado el dateTo que seria como borrarla
        // 3.2- Si no esta no hago nada

        $this->validate($this->request, $this->rules);

        // Compruebo que el ciclo recibido es valido
        $cycle = $this->teacherCycleId($this->request['cycleId'])->toArray();

        if(!empty($cycle)) {
            // Compruebo el año
            if($this->request['yearFromId'] <= 1990 || $this->request['yearFromId'] > date('Y')+5) {
                // Redireccionamos en caso de no ser un año valido.
                return \Redirect::to($this->route . '/asignaturas?cycle=' . $this->request['cycleId'] . '&yearFrom=' . date('Y'));
            } else {
                // Obtengo las asignaturas de ese ciclo
                $subjects = $this->cycleSubjects($this->request['cycleId'])->lists('id')->toArray();

                // Declaro algunas variables
                $bien = 0;
                $mySubjects = false;
                $allSubjects = false;

                // Compruebo que todas las asignaturas pertenezcan al ciclo
                if(isset($this->request['mySubjects'])) {
                    $mySubjects = true;
                    foreach($subjects as $key => $id) {
                        foreach($this->request['mySubjects'] as $pos => $subjectId){
                            if($id == $subjectId) {
                                $bien++;
                            }
                        }
                    }

                    $cont = count($this->request['mySubjects']);

                    if ($cont != $bien) {
                        // Redireccionamos en caso de no encontrar la asignatura.
                        return \Redirect::to($this->route . '/asignaturas');
                    } else {
                        $bien = 0;
                        $cont = 0;
                    }
                }
                
                // Compruebo que todas las asignaturas pertenezcan al ciclo
                if(isset($this->request['allSubjects'])) {
                    $allSubjects = true;
                    foreach($subjects as $key => $id) {
                        foreach($this->request['allSubjects'] as $pos => $subjectId){
                            if($id == $subjectId) {
                                $bien++;
                            }
                        }
                    }

                    $cont = count($this->request['allSubjects']);

                    if ($cont != $bien) {
                        // Redireccionamos en caso de no encontrar la asignatura.
                        return \Redirect::to($this->route . '/asignaturas?cycle=' . $this->request['cycleId'] . '&yearFrom=' . $this->request['yearFromId']);
                    }
                }

                if($mySubjects === false && $allSubjects === false) {
                    // Redireccionamos en caso de no ninguna asignatura.
                    return \Redirect::to($this->route . '/asignaturas');
                } else {
                    $insercion = [];
                    $borrado = [];
                    
                    // Obtengo el id del profesor que usaré como pivote
                    $teacherId = $this->getTeacherId()->toArray();
                    $teacherId = $teacherId[0]['id'];

                    if($mySubjects === true) {
                        // Compuebo si las asignaturas que se quieren insertar están ya insertadas
                        foreach($this->request['mySubjects'] as $index => $id) {
                            // Comprueba si cualquier otro profesor la tiene
                            $subject = $this->subjectTeachers($id, $this->request['yearFromId'])->toArray();
                            if(empty($subject)) {
                                $insercion[$index] = $id;
                            }
                        }

                        // Si hay datos que insertar los inserto uno a uno
                        if(count($insercion) > 0) {
                            foreach($insercion as $index => $id) {
                                // Llamo al metodo para borrar la asignatura.
                                $insert = Self::create($id, $teacherId);

                                if($insert === false) {
                                    Session::flash('message_Negative', 'Algunas asignaturas no han podido añadirse, intentelo de nuevo más tarde.');
                                    return \Redirect::to($this->route . '/asignaturas?cycle=' . $this->request['cycleId'] . '&yearFrom=' . $this->request['yearFromId']);
                                }
                            } 
                        } else {
                            $mySubjects = false;
                        }
                        
                    }

                    if($allSubjects === true) {
                        // Compuebo si las asignaturas que se quieren insertar están ya insertadas, en este caso para borrarlas
                        foreach($this->request['allSubjects'] as $index => $id) {
                            // Comprueba que sea de ese profesor exclusivamente
                            $subject = $this->subjectTeachers($id, $this->request['yearFromId'], true)->toArray();
                            if(!empty($subject)) {
                                $borrado[$index] = $id;
                            }
                        }

                        // Si hay datos que borrar los borro uno a uno
                        if(count($borrado) > 0) {
                            foreach($borrado as $index => $id) {
                                // Llamo al metodo para crear la asignatura.
                                $delete = Self::delete($id, $teacherId);

                                if($delete === false) {
                                    Session::flash('message_Negative', 'Algunas asignaturas no han podido eliminarse, intentelo de nuevo más tarde.');
                                    return \Redirect::to($this->route . '/asignaturas?cycle=' . $this->request['cycleId'] . '&yearFrom=' . $this->request['yearFromId']); 
                                }
                            } 
                        } else {
                            $allSubjects = false;
                        }
                    }

                    // No se ha alterado nada
                    if($mySubjects === false && $allSubjects === false) {
                        Session::flash('message_Negative', 'No se ha actualizado ninguna asignatura.');
                    }
                }
            }
        } else {
            Session::flash('message_Negative', 'No tienes acceso a ese ciclo.');
            return \Redirect::to($this->route . '/asignaturas');
        }

        // Redireccionamos en caso de no ser un ciclo valido.
        return \Redirect::to($this->route . '/asignaturas?cycle=' . $this->request['cycleId'] . '&yearFrom=' . $this->request['yearFromId']);

    } // store()

    private function create($id, $teacherId)
    {
        $id = (int) $id;

        try {

            // Obtengo la asignatura
            $subject = Subject::find($id);

            // Hago la inserción
            $subject->teachers()->attach($teacherId, [
                'dateTo' => $this->request['yearFromId']+1,
                'dateFrom' => $this->request['yearFromId'],
                'subject_id' => $id,
                'created_at' => date('YmdHms'),
            ]);

            // Comprobamos si la inserción ha sido correcta
            $insert = $subject->teachers()
                                        ->select(['subjectTeachers.id'])
                                        ->where('subject_id', '=', $id)
                                        ->where('teacher_id', '=', $teacherId)
                                        ->get()
                                        ->toArray();

        } catch(\PDOException $e){
            //dd($e);
            abort(500);
        }

        if(isset($insert) && !empty($insert)){
            return true;
        }
        return false;
    } // create()

    private function delete($id, $teacherId)
    {
        $id = (int) $id;

        try {

            // Obtengo la asignatura
            $subject = Subject::find($id);

            // Hago la inserción
            $subject->teachers()->detach($teacherId);

            // Comprobamos si la inserción ha sido correcta
            $delete = $subject->teachers()
                                        ->select(['subjectTeachers.id'])
                                        ->where('subject_id', '=', $id)
                                        ->where('teacher_id', '=', $teacherId)
                                        ->where('dateFrom', '=', $this->request['yearFromId'])
                                        ->get()
                                        ->toArray();

        } catch(\PDOException $e){
            //dd($e);
            abort(500);
        }

        if(isset($delete) && !empty($delete)){
            return false;
        }
        return true;
    } // delete()

}
