<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Citie;

class CitiesController extends Controller
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
    public function getAllCities($stateId = 0, $bool=null)
    {
        // Tratamos el ID
        $stateAll = (string) $stateId;
        $stateId = (int) $stateId;
        
        // coprobamos que el id es valido
        if(is_numeric($stateId) && $stateId > 0){
            try {
                // Almaceno el resultado en caché
                $citiesDB = \Cache::remember('citiesDB', 5, function() use ($stateId){
                    // Los resultados de la consulta se almacenan en la variable
                    return Citie::where('state_id', '=', $stateId)->orderBy('name', 'ASC')->get();
                });
            } catch(\PDOException $e) {
                //dd($e);
                abort(500);
            }

            return $citiesDB;
        } elseif($stateAll === '*' && !is_null($bool) && $bool === true) {
            return Citie::orderBy('name', 'ASC')->get();
        } else {
            // Si el id de la familia profesional ha sido alterado
            abort('404');
        }
    }// getAllCities()

    /**
     * Método que obtiene los ciclos por Ajax y devuelve los resultados
     * en formato JSON
     * @param  Integer $stateId ID de la familia profesional, si no se recibe
     *                           por defecto es 0
     * @return JSON | abort      JSON con la información de la consulta
     *                           Abort en caso de que el ID no sea valido
     */
    public function getCitiesJSON($stateId = 0){
        // Tratamos el ID
        $stateId = (int) $stateId;
        // coprobamos que el id es valido
        if(is_numeric($stateId) && $stateId > 0){
            try{
                // Añadimos a la caché los resultados de los ciclos
    			// la caché dura 24 horas o 1440 minutos
    			// La unica forma de pasar como parametro a esta función anonima
    			// una variable es [use ($variable)]
    			// En la cache se esta guardando un archivo que es identificado como
    			// cycles, esto es un problema porque cada ciclo tiene un id distinto
    			// es decir, necesitamos identificar los ciclos, para ello le concatenaremos el id de la familia.
    		    $cities = \Cache::remember('cities_' . $stateId , 1440, function() use ($stateId){
    				// Los resultados de la consulta se almacenan en la variable
    			    return Citie::where('state_id', '=', $stateId)->orderBy('name', 'ASC')->get();

    		    });
            } catch(\PDOException $e) {
                abort('500');
            }

            // devolvemos el resultado de la consulta, si falla la memoria caché, en formato JSON
            return \Response::json($cities);
        }

        // Si el id de la familia profesional ha sido modificado
        abort('404');
    }// getCyclesJSON()
}
