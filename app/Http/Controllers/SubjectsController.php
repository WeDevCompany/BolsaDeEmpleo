<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class SubjectsController extends Controller
{
	protected $request = null;          // Inicializada a null
	protected $rules = null;          // Inicializada a null
    protected $search = null;           // Buscador

    public function __construct(Request $request)
    {
        $this->rules = [
            'allSubjects' => 'required',
        ];
        $this->search = new SearchController();
        $this->request = $request;
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
        $cycles = $this->search->teacherCycles()->lists('name', 'id')->toArray();

        // Obtengo el primer año seleccionado o, si existe, el valor de $_GET
        if($_GET && isset($_GET['yearFrom'])){
        	$subjectYear = (int) $_GET['yearFrom'];
        } else {
	        $subjectYear = array_keys($years)[0];
	    }

        // Obtengo el identificador del primer ciclo o, si existe, el valor de $_GET
        if($_GET && isset($_GET['cycle'])){
        	$cycle_id = (int) $_GET['cycle'];
        } else {
        	$cycle_id = array_keys($cycles)[0];
        }

        // Obtengo las asignaturas de un profesor
        $mySubjects = $this->search->cycleSubjectsYear($cycle_id, $subjectYear, true)->lists('name', 'id')->toArray();

        // Obtenemos las asignaturas que no ha impartido
        $allSubjects = $this->search->cycleFreeSubjects($cycle_id, $subjectYear)->lists('name', 'id')->toArray();

        return view('subject/subjects', compact('zona', 'cycles', 'years', 'allSubjects', 'mySubjects'));

    } // index()

    public function store()
    {
        dd($this->request);
    } // store()

}
