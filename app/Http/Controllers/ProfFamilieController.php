<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProfFamilie;
use App\Http\Requests;
use Response;

class ProfFamilieController extends Controller
{
	/**
	 * Metodo que devuelve todas las familias profesionales activas.
	 * @return Array Devuelve un array asociativo 'id' => 'familia'
	 */
    public function getAllProfFamilies()
    {
    	try {
            // Añado la opcion por defecto
            $profFamilies = ['0' => 'Selecciona una familia profesional'];

            // Obtengo las familias activas
        	$profFamiliesDB = ProfFamilie::where('active', '=', 1)->lists('name', 'id')->toArray();

			// Le "añadimos" a las familias profesionales una hecha
			// por nosotros
            $profFamilies = $profFamilies + $profFamiliesDB;

    	} catch(\PDOException $e) {
    		//dd($e);
            abort(500);
    	}
    	return $profFamilies;
    }// getAllProfFamilies()

	/**
	 * Método que genera las familias profesionales por Ajax respondiendo JSON
	 * [En la ruta no se debe utilizar un namespace JSON este archivo no está
	 * en la carpeta Json]
	 * @return JSON devuelve el resultado de la consulta en formato JSON
	 */
	public function getAllProfFamiliesJSON(){
		// Bloque try catch en el que realizaremos la consulta
		// de todas las familias profecionales activas
		// y las devolveremos en formato JSON
		try{
			// resultados de la consulta
			$profFamilies = ProfFamilie::where('active', '=', '1')->lists('name', 'id');

			// Formamos un array con las familias validas
	        $valid_profFamilies = [];
	        foreach ($profFamilies as $id => $profFamilie) {
	            $valid_profFamilies[] = ['id' => $id, 'familia' => $profFamilie];
	        }
	        return \Response::json($valid_profFamilies);
		} catch (\PDOException $e){
			//dd($e);
            abort(500);
		}

	}
}
