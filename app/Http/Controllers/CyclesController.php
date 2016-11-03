<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProfFamilie;
use App\Http\Traits\Search;
use Illuminate\Support\Facades\Session;
use App\Http\Traits\Functions;

// Utilizamos las siguientes clases
use App\Cycle;

class CyclesController extends Controller
{
    use Search;

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

    public function indexCycle(Request $request)
    {
        $urlDelete = '/administrador/configuración/ciclo/borrar';
        $urlSearch = '/administrador/configuracion/ciclos';
        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.cycles');
        $zona = 'Ciclos activos';
        $modalDelete = '¿Estas seguro de que quieres desactivar el ciclo? Debes tener en cuenta que estos cambios afectarán a otros usuarios de la aplicación';

        $profFamilies = ProfFamilie::get();
        $profFamilies = $this->mapArray($profFamilies);
        $cycles = Cycle::filter($request->get('name'))
                        ->select('cycles.*', 'profFamilies.name as nameProfFamily')
                        ->join('profFamilies', 'profFamilie_id', '=', 'profFamilies.id')
                        ->orderBy('cycles.name')
                        ->paginate(30);

        return view('cycle/index', compact('profFamilies', 'cycles', 'urlDelete', 'urlSearch', 'request', 'filters', 'zona', 'modalDelete'));
    }

    public function createCycle(Request $request)
    {

        $cycle = Cycle::create([
            'name' => $request->name,
            'profFamilie_id' => $request->profFamilies,
            'created_at' => date('YmdHms')
        ]);

        if ($cycle !== false) {

            Session::flash('message_Success', 'Se ha creado el ciclo ' . $cycle->name . ' correctamente.');
            return \Redirect::back();

        }

        Session::flash('message_Negative', 'No se ha podido crear el cyclo');
        return \Redirect::back();
    }

    public function deleteCycle($id)
    {
        // Obtenemos los datos del ciclo
        $destroyCycle = Cycle::findorfail($id);

        if ($destroyCycle->deleted_at == null) {

            // Borramos el ciclo
            $destroyCycle->deleted_at = date('YmdHms');

            $destroyCycle->save();

            // Devolvemos un mensaje a la vista
            $message = 'El ciclo de ha borrado correctamente';
            $status = 'success';

            if($destroyCycle->deleted_at != null){
                return $ajax = [
                    'id'      => $destroyCycle->id,
                    'message' => $message,
                    'status'  => $status
                ];
            }


        } else {

            // Devolvemos un mensaje a la vista
            $message = 'No se ha podido borrar el ciclo, por favor intentelo mas tarde';
            $status = 'fail';


            return $ajax = [
                'id'      => $destroyCycle->id,
                'message' => $message,
                'status'  => $status
            ];


        }
    }

    public function updateCycle($id/*, CycleRequest $request*/)
    {
        $id = $this->parseId($id, 'No se ha podido editar el ciclo');
        if ($id === false) {
            return \Redirect::back();
        }

        $cycle = Cycle::findorfail($id);

        $datos = $this->request->all();
        $datos['profFamilie_id'] = $datos['profFamilies'];

        $cycle->fill($datos);
        $save = $cycle->save();

        if ($save !== false) {

            Session::flash('message_Success', 'Se ha editado el ciclo ' . $cycle->name . ' correctamente.');
            return \Redirect::back();

        }

        Session::flash('message_Negative', 'No se ha podido editar el ciclo');
        return \Redirect::back();
    }

    public function indexCycleInactive(Request $request)
    {
        $urlDelete = '/administrador/configuración/ciclo-inactivo/borrar';
        $urlSearch = '/administrador/configuracion/ciclos-inactivos';
        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.cycles');
        $zona = 'Ciclos inactivos';
        $modalDelete = '¿Estas seguro de que quieres borrar el ciclo? Debes tener en cuenta que estos cambios afectarán a otros usuarios de la aplicación';

        $cycles = Cycle::filter($request->get('name'))
                        ->select('cycles.*', 'profFamilies.name as nameProfFamily')
                        ->join('profFamilies', 'profFamilie_id', '=', 'profFamilies.id')
                        ->orWhereNotNull('cycles.deleted_at')
                        ->orderBy('cycles.name')
                        ->withTrashed()
                        ->paginate(30);

        return view('cycle/inactive', compact('cycles', 'urlDelete', 'urlSearch', 'request', 'filters', 'zona', 'modalDelete'));
    }

    public function restoreCycle(Request $request)
    {
        // Array de los ciclos a validar
        $ciclo = $request->toArray();

        \DB::beginTransaction();
        foreach ($ciclo['ciclo'] as $id => $value) {

            // Comprobamos que el ciclo esta borrado
            $deniedCycle = Cycle::where('id', '=', $value)->withTrashed()->first();

            // Si esta borrado lo restauramos
            if ($deniedCycle) {

                $deniedCycle->deleted_at = null;

                $save = $deniedCycle->save();

                if (!$save) {
                    \DB::rollBack();
                    Session::flash('message_Negative', 'No se han podido restaurar los ciclo');
                    return \Redirect::back();
                }
            }
        }
        \DB::commit();
        Session::flash('message_Success', 'Se han restaurado los ciclos correctamente.');
        return \Redirect::back();
    }

}// final del controlador de
