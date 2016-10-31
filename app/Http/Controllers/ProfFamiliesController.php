<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProfFamilie;
use App\Http\Requests;
use Response;
use Illuminate\Support\Facades\Session;
use App\Http\Traits\Functions;
//use App\Http\Requests\ProfFamilieRequest;

class ProfFamiliesController extends Controller
{
    use Functions;
	/**
	 * Metodo que devuelve todas las familias profesionales activas.
	 * @return Array Devuelve un array asociativo 'id' => 'familia'
	 */
    public function getAllProfFamilies($paginate = null, $inactives = null)
    {
        // Si la cache da problemas debemos resetear
         \Cache::flush();
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
                    $profFamiliesDB = ProfFamilie::where('active', '=', '1')->orderBy('name', 'ASC')->paginate();
                } else {
                  $profFamiliesDB = ProfFamilie::where('active', '=', '0')->orderBy('name', 'ASC')->paginate();
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

	public function getAllProfFamiliesViewActives()
	{
		// esta consulta tiene caché
        $paginate = true; //método ->get() o ->paginate()
		$profFamilies = $this->getAllProfFamilies($paginate);

		// Zona en la que se encuentra la web
		$zona = 'Familias profesionales activas';
        $urlDelete = config('routes.admin.profFamiliesDelete');
        $modalDelete = "¿Estas seguro de que quieres desactivar la familia profesional? Debes tener en cuenta que estos cambios afectaran a otros usuarios de la aplicación.";
		return view('admin.profFamilies.actives', compact('profFamilies','zona', 'urlDelete', 'modalDelete'));
	}

    public function getAllProfFamiliesViewInactives()
    {
        // esta consulta tiene caché
        $paginate = false; //método ->get() o ->paginate()
        $inactives = true;
        $profFamiliesInactives = $this->getAllProfFamilies($paginate, $inactives);

        // Zona en la que se encuentra la web
        $zona = 'Familias profesionales inactivas';
        $urlDelete = config('routes.admin.profFamiliesDelete');
        return view('admin.profFamilies.list', compact('profFamiliesInactives','zona', 'urlDelete'));
    }

    public function create(Request $request){
        // Realizamos las validaciones personal
         $validator = \Validator::make($request->all(), [
            'name'      => 'required|regex:/^[a-zA-ZñÑÁÉÍÓÚáéíóú -]+$/|between:1,75|unique:profFamilies,name',
            'active'    => 'sometimes|required',
        ]);

        // Si hay errores los mandamos a la vista
        if ($validator->fails()) {
            Session::flash('message_Negative', 'El nombre de la familia profesional no es valido');
            return \Redirect::back();
        }

        try {
            // Creamos el registro
            $data = $request->all();
            $insercion = ProfFamilie::create([
                'name' => $data['name'],
                'active' => '1',
                'created_at' => date('YmdHms')
            ]);
            if ($insercion) {
               Session::flash('message_Success', 'La familia profesional fue creda correctamente');
            } else {
                Session::flash('message_Negative', 'Lo sentimos ha sucedido un error intentelo más tarde si el error persiste comuniquese con el equipo de desarrollo');
            }
            return \Redirect::back();

        } catch (Exception $e) {
            Session::flash('message_Negative', 'Lo sentimos ha sucedido un error inexperado más tarde');
            abort(500);
        }
    }

     public function edit(Request $request, $id = null){
        $id = $this->parseId($id, 'La familia profesional que intenta editar no existe');
        if($id === false){
            return \Redirect::back();
        }

        // Comprobamos que la familia profesional que se desea editar existe en la base de datos
        try {
            $profFamilie = ProfFamilie::findOrFail($id);

            if(isset($profFamilie->id)){

                // Realizamos las validaciones personal
                 $validator = \Validator::make($request->all(), [
                    'name'      => 'required|regex:/^[a-zA-ZñÑÁÉÍÓÚáéíóú -]+$/|between:1,75',
                    'active'    => 'sometimes|required',
                    'profFamilieId' => 'sometimes'
                ]);

                // Si hay errores los mandamos a la vista
                if ($validator->fails()) {
                    Session::flash('message_Negative', 'El nombre de la familia profesional no es valido');
                    return \Redirect::back();
                }

                $name = $request->name;

                $result = ProfFamilie::where('name', '=', $name)->where('id', '<>', $profFamilie->id)->get();

                if (isset($result[0])) {
                    Session::flash('message_Negative', 'La familia profesional no a sido editada');
                } else {
                    // Editamos la familia profesional
                    $status = $profFamilie->update(['name' => $request->name]);
                    if ($status) {
                       Session::flash('message_Success', 'La familia profesional fue editada correctamente');
                    } else {
                        Session::flash('message_Negative', 'La familia profesional no a sido editada');
                    }
                }

                return \Redirect::back();
            } else {
                Session::flash('message_Negative', 'La familia profesional que intenta editar no existe');
                return \Redirect::back();
            }
        } catch (Exception $e) {
            abort(500);
        }
    }

    public function delete(Request $request,$id = null)
    {
        dd("sdadsf");
    }

}