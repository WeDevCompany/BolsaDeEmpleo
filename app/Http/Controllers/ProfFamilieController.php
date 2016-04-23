<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProfFamilie;
use App\Http\Requests;

class ProfFamilieController extends Controller
{
	/**
	 * Metodo que devuelve todas las familias profesionales activas.
	 * @return Array Devuelve un array asociativo 'id' => 'familia'
	 */
    public function getAllProfFamilies()
    {
    	try {
    		// Obtengo las familias activas
        	$profFamilies = ProfFamilie::where('active', '=', 1)->lists('name', 'id');
    	} catch(\PDOException $e) {
    		//dd($e);
            abort(500);
    	}
    	return $profFamilies;
    }
}
