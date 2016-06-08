<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Response;
use App\State;

class StatesController extends Controller
{
	/**
	 * Metodo que devuelve todas las provincias activas.
	 * @return Array Devuelve un array asociativo 'id' => 'provincia'
	 */
    public function getAllStates()
    {
    	try {
			// Añadimos a la caché los resultados de las provincias por 24h
			$statesDB = \Cache::remember('statesDB', 1440, function(){
				// Los resultados de la consulta se almacenan en la variable
			    return State::orderBy('name', 'ASC')->lists('name', 'id')->toArray();
		    });
    	} catch(\PDOException $e) {
    		//dd($e);
            abort(500);
    	}

    	return $statesDB;
    }// getAllStates()

	/**
	 * Método que genera las provincias por Ajax respondiendo JSON
	 * @return JSON Devuelve el resultado en formato JSON
	 */
	public function getAllStatesJSON(){
		try{
			// Añadimos a la caché los resultados de las provincias por 24h
			$states = \Cache::remember('states', 1440, function(){
			    return State::select('*')->orderBy('name', 'ASC')->lists('name', 'id');
		    });
			// Formamos un array con las familias validas
	        $valid_states = [];
	        foreach ($states as $id => $state) {
	            $valid_states[] = ['id' => $id, 'provincia' => $state];
	        }

	        return \Response::json($valid_states);
		} catch (\PDOException $e){
			//dd($e);
            abort(500);
		}
	}// getAllStatesJSON()
}
