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
            // Añado la opcion por defecto
            $profFamilies = ['0' => 'Selecciona una familia profesional'];
    		
            // Obtengo las familias activas 
        	$profFamiliesDB = ProfFamilie::where('active', '=', 1)->lists('name', 'id')->toArray();

            $profFamilies = $profFamilies + $profFamiliesDB;

    	} catch(\PDOException $e) {
    		//dd($e);
            abort(500);
    	}
    	return $profFamilies;
    }
}
