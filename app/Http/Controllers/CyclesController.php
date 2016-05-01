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
     * Método que obtiene los ciclos por Ajax y devuelve los resultados
     * en formato JSON
     * @param  Integer $familyId ID de la familia profesional
     * @return JSON | abort      JSON con la información de la consulta
     *                           Abort en caso de que el ID no sea valido
     */
    public function getCiclesJSON($familyId){
        // Tratamos el ID
        $familyId = (int) $familyId;
        // coprobamos que el id es valido
        if(is_numeric($familyId) && $familyId > 0){
            // Añadimos a la caché los resultados de los ciclos
			// la caché dura 24 horas o 1440 minutos
			// La unica forma de pasar como parametro a esta función anonima
			// una variable es [use ($variable)]
			$cycles = \Cache::remember('cycles', 1440, function() use ($familyId){
				// Los resultados de la consulta se almacenan en la variable
			    return Cycle::where('active', '=', '1')->where('profFamilie_id', '=', $familyId)->get();

		    });
            
            // devolvemos el resultado de la consulta en formato JSON
            return \Response::json($cycles);
        }

        // Si el id de la familia profesional ha sido modificado
        abort('404');
    }// getCiclesJSON()

}
