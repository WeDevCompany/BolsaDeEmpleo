<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TagsController extends Controller
{
	/**
	 * Método que genera los tags de un ciclo
	 * @return JSON devuelve el resultado de la consulta en formato JSON
	 */
	public function getCycleTagsJSON($cycleId){
		try{

			Tag::where('active', '=', '1')->orderBy('name', 'ASC')->lists('name', 'id');

	        return \Response::json($valid_profFamilies);
		} catch (\PDOException $e){
			//dd($e);
            abort(500);
		}

	}// getCycleTags()
}
