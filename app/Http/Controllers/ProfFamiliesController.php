<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProfFamilie;
use App\Http\Requests;
use Response;

class ProfFamiliesController extends Controller
{
	/**
	 * Metodo que devuelve todas las familias profesionales activas.
	 * @return Array Devuelve un array asociativo 'id' => 'familia'
	 */
    public function getAllProfFamilies($paginate = null, $inactives = null)
    {
        // Si la cache da problemas debemos resetear
       // \Cache::flush();
		try {
			// Añadimos a la caché los resultados de las familias profesionales
			// la caché dura 24 horas o 1440 minutos
            if(! isset($paginate)) {
                // lo guardamos en caché con un nombre
                $profFamiliesDB = \Cache::remember('profFamiliesDB', 1440, function(){
                    // Los resultados de la consulta se almacenan en la variable
                    return ProfFamilie::where('active', '=', '1')->orderBy('name', 'ASC')->lists('name', 'id')->toArray();
                });
            } else {
                if(! isset($inactives)){
                    // lo guardamos en la caché de base de datos con un nombre distinto
                    $profFamiliesDB = \Cache::remember('profFamiliesDBGet', 1440, function(){
                        // Los resultados de la consulta se almacenan en la variable
                        return ProfFamilie::where('active', '=', '1')->orderBy('name', 'ASC')->get();
                    });
                } else {
                    // lo guardamos en la caché de base de datos con un nombre distinto
                    $profFamiliesDB = \Cache::remember('profFamiliesInactivesDBGet', 1440, function(){
                        // Los resultados de la consulta se almacenan en la variable
                        return ProfFamilie::where('active', '=', '0')->orderBy('name', 'ASC')->get();
                    });
                }

            }
		} catch(\PDOException $e) {
            //dd($e);
            abort(500);
        }
        return  $profFamiliesDB;
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
			// Añadimos a la caché los resultados de las familias profesionales
			// la caché dura 24 horas o 1440 minutos
			$profFamilies = \Cache::remember('profFamilies', 1440, function(){
				// Los resultados de la consulta se almacenan en la variable
			    return ProfFamilie::where('active', '=', '1')->orderBy('name', 'ASC')->lists('name', 'id');
		    });
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

	}// getAllProfFamiliesJSON()

	public function getAllProfFamiliesView()
	{
		// esta consulta tiene caché
        $paginate = true; //método ->get()
        $inactives = true;
		$profFamilies = $this->getAllProfFamilies($paginate);
        $profFamiliesInactives = $this->getAllProfFamilies($paginate, $inactives);
        //dd($profFamiliesInactives);
		// Zona en la que se encuentra la web
		$zona = 'Familias profesionales';
		return view('admin.profFamilies.list', compact('profFamilies','profFamiliesInactives','zona'));
	}
}
