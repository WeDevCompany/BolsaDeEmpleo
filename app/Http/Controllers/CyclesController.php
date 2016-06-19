<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Utilizamos las siguientes clases
use App\Cycle;

class CyclesController extends Controller
{
    // Variable con la petición realizada
    private $request;

    /**
     * Método constructor
     * @param Request $request Request recibido de las rutas
     */
    public function __construct(Request $request){
        $this->request = $request;
    }

    /**
     * Metodo que devuelve todas las familias profesionales activas.
     * @return Array Devuelve un array asociativo 'id' => 'familia'
     */
    public function getAllCycles($familyId = 0, $bool=null)
    {
        // Tratamos el ID
        $familyAll = (string) $familyId;
        $familyId = (int) $familyId;
        
        // coprobamos que el id es valido
        if(is_numeric($familyId) && $familyId > 0){
            try {
                // Almaceno el resultado en caché
                $cyclesDB = \Cache::remember('cyclesDB', 1440, function() use ($familyId){
                    // Los resultados de la consulta se almacenan en la variable
                    return Cycle::where('active', '=', '1')->where('profFamilie_id', '=', $familyId)->orderBy('level', 'DESC')->orderBy('name', 'ASC')->get();
                });
            } catch(\PDOException $e) {
                //dd($e);
                abort(500);
            }

            return $cyclesDB;
        } elseif($familyAll === '*' && !is_null($bool) && $bool === true) {
            return Cycle::where('active', '=', '1')->orderBy('level', 'DESC')->orderBy('name', 'ASC')->get();
        } else {
            // Si el id de la familia profesional ha sido alterado
            abort('404');
        }
    }// getAllCycles()

    /**
     * Método que obtiene los ciclos por Ajax y devuelve los resultados
     * en formato JSON
     * @param  Integer $familyId ID de la familia profesional, si no se recibe
     *                           por defecto es 0
     * @return JSON | abort      JSON con la información de la consulta
     *                           Abort en caso de que el ID no sea valido
     */
    public function getCyclesJSON($familyId = 0){
        // Tratamos el ID
        $familyId = (int) $familyId;
        // coprobamos que el id es valido
        if(is_numeric($familyId) && $familyId > 0){
            try{
                // Añadimos a la caché los resultados de los ciclos
    			// la caché dura 24 horas o 1440 minutos
    			// La unica forma de pasar como parametro a esta función anonima
    			// una variable es [use ($variable)]
    			// En la cache se esta guardando un archivo que es identificado como
    			// cycles, esto es un problema porque cada ciclo tiene un id distinto
    			// es decir, necesitamos identificar los ciclos, para ello le concatenaremos el id de la familia.
    		    $cycles = \Cache::remember('cycles_' . $familyId , 1440, function() use ($familyId){
    				// Los resultados de la consulta se almacenan en la variable
    			    return Cycle::where('active', '=', '1')->where('profFamilie_id', '=', $familyId)->orderBy('level', 'DESC')->orderBy('name', 'ASC')->get();

    		    });
            } catch(\PDOException $e) {
                abort('500');
            }

            // devolvemos el resultado de la consulta, si falla la memoria caché, en formato JSON
            return \Response::json($cycles);
        }

        // Si el id de la familia profesional ha sido modificado
        abort('404');
    }// getCyclesJSON()

    /**
     * Método que devuelve los ciclos de los cuales un profesor
     * tiene opción a ser tutor
     * @param  Integer $year     Año de la tutoría
     * @param  Integer $cycle_id Id del ciclo (opcional) busqueda concreta
     * @return Array|false       Devuelve los ciclos encontrados | False
     *                           en el caso de no encontrar ninguno
     */
    public function posibleTutorCycles($year, $cycle_id = false) {
        
        $year = (int) $year;
        $cycle_id = (int) $cycle_id;

        try {

            // Obtengo los posibles ciclos
            if($cycle_id == false) {
                $posibleTutorCycles = Cycle::distinct()
                    ->select('cycles.id', 'cycles.name')
                    ->join('profFamilies', 'profFamilies.id', '=', 'cycles.profFamilie_id')
                    ->join('cycleSubjects', 'cycleSubjects.cycle_id', '=', 'cycles.id')
                    ->join('subjects', 'subjects.id', '=', 'cycleSubjects.subject_id')
                    ->join('subjectTeachers', 'subjectTeachers.subject_id', '=', 'subjects.id')
                    ->join('teachers', 'teachers.id', '=', 'subjectTeachers.teacher_id')
                    ->where('subjectTeachers.dateFrom', '=', $year)
                    ->where('cycles.active', '=', 1)
                    ->where('profFamilies.active', '=', 1)
                    ->where('teachers.user_id', '=', \Auth::user()->id)
                    ->orderBy('cycles.name', 'ASC')->get()->toArray();
            } else {
                $posibleTutorCycles = Cycle::distinct()
                    ->select('cycles.id', 'cycles.name')
                    ->join('profFamilies', 'profFamilies.id', '=', 'cycles.profFamilie_id')
                    ->join('cycleSubjects', 'cycleSubjects.cycle_id', '=', 'cycles.id')
                    ->join('subjects', 'subjects.id', '=', 'cycleSubjects.subject_id')
                    ->join('subjectTeachers', 'subjectTeachers.subject_id', '=', 'subjects.id')
                    ->join('teachers', 'teachers.id', '=', 'subjectTeachers.teacher_id')
                    ->where('subjectTeachers.dateFrom', '=', $year)
                    ->where('cycles.active', '=', 1)
                    ->where('cycles.id', '=', $cycle_id)
                    ->where('profFamilies.active', '=', 1)
                    ->where('teachers.user_id', '=', \Auth::user()->id)
                    ->orderBy('cycles.name', 'ASC')->get()->toArray();
            }    

        } catch(\PDOException $e) {
            //dd($e);
            abort(500);
        }

            if(isset($posibleTutorCycles) && !empty($posibleTutorCycles)) {
                return $posibleTutorCycles;
            } else {
                return false;
            }

    } // posibleTutorCycles()

}// final del controlador de
