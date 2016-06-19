<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Traits\Search;
use Illuminate\Support\Facades\Session;
use App\Tag;

class TagsController extends Controller
{

	use Search;

	private $rules = null;
	private $request = null;
    protected $route = null;

	public function __construct(Request $request)
    {
        $this->request = $request;
        // Asigno las reglas de validacion
    	$this->rules = [
			'oldBody.*.*'     => 'digits_between:1,10',	
        	'newBody'         => 'between:1,200|regex:/^([a-zA-Z0-9 ñÑáéóíúÁÉÓÍÚ-]+,{0,1})+$/',
        	'subject'     	  => 'required|digits_between:1,10',
        	'cycleId'     	  => 'required|digits_between:1,10',
        	'yearFromId'      => 'required|digits:4',
    	];

    	if(!\Auth::guest()) {
            $this->route = \Auth::user()->rol;
        }
    }

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

	/**
	 * Metodo que actualiza los tags de una asignatura
	 */
	public function store()
    {
    	// Si no existen todos los datos devuelvo un error
        if(isset($_POST['subject']) && isset($_POST['cycleId'])
         && isset($_POST['yearFromId'])) {

        	// Valido los campos con las reglas
        	$this->validate($this->request, $this->rules);

        	// Compruebo si el id de la asignatura le corresponde a ese profesor
        	$subjects = $this->subjectTeachers($this->request['subject'], $this->request['yearFromId'], true)->toArray();

        	// Compruebo si esa asignatura es de ese ciclo
        	$cycleSubject = $this->cycleSubject($this->request['cycleId'], $this->request['subject']);

        	// Si ambos son correctos trato el resto de los datos
        	if(isset($subjects[0]['id']) && !empty($subjects[0]['id'])) {
        		if(isset($cycleSubject[0]['id']) && !empty($cycleSubject[0]['id'])) {

        			// Trato los tags que ya tenia
	        		if(isset($_POST['oldBody'])) {
	        			// Obtengo los tags de esa asignatura
                		$subjectTags = $this->getSubjectTags($cycleSubject[0]['id'], $_POST['yearFromId'])->lists('tag_id')->toArray();
	     				
	        			// Si existe el id en oldBody y corresponde con el de cycleSubjects
	        			if(isset($_POST['oldBody'][$cycleSubject[0]['id']])) {

	        				// Comprobamos cada tag de la base de datos
	        				foreach($subjectTags as $id => $valuedb) {
	        					$check = false;
		        				// Recorremos los tags recibidos
		        				foreach($_POST['oldBody'][$cycleSubject[0]['id']] as $id => $recibido){
		        					if($valuedb == $recibido) {
		        						$check = true;
		        						break;
		        					}
		        				}

		        				// Si no encuentra coincidencias significa que lo ha borrado
		        				if($check == false) {
		        					// Llamamos al metodo de borrado por cada tag
		        					$response = $this->delete($cycleSubject[0]['id'], $_POST['yearFromId'], $valuedb);
		        				
		        					if($response == false) {
		    							// No se ha eliminado un tag correctamente
		        						Session::flash('message_Negative', 'Se ha producido un error al eliminar los tags, intentelo de nuevo más tarde.');
						        		return \Redirect::to($this->route . '/asignaturas?cycle=' . $this->request['cycleId'] . '&yearFrom=' . $this->request['yearFromId']);	
		        					}
		        				}
		        			}

	        			} else {
	        				// No existen ni tags anteriores ni nuevos
			        		Session::flash('message_Negative', 'No se han recibido datos para actualizar.');
			        		return \Redirect::to($this->route . '/asignaturas?cycle=' . $this->request['cycleId'] . '&yearFrom=' . $this->request['yearFromId']);	
	        			}
		        	} else {
		        		// Si no llega nada los borro todos
                		$subjectTags = $this->getSubjectTags($cycleSubject[0]['id'], $_POST['yearFromId'])->lists('tag_id')->toArray();

                		foreach($subjectTags as $id => $value){
							// Llamamos al metodo de borrado por cada tag
		        			$response = $this->delete($cycleSubject[0]['id'], $_POST['yearFromId'], $value);
                			
                			if($response == false) {
    							// No se ha eliminado un tag correctamente
        						Session::flash('message_Negative', 'Se ha producido un error al eliminar los tags, intentelo de nuevo más tarde.');
				        		return \Redirect::to($this->route . '/asignaturas?cycle=' . $this->request['cycleId'] . '&yearFrom=' . $this->request['yearFromId']);	
        					}
                		}
		        	}

		        	if(isset($_POST['newBody']) && !empty(trim($_POST['newBody']))) {
		        		$length = mb_strlen($_POST['newBody']);
		        		
		        		// Si el último carácter es una coma lo eliminamos
		        		if(mb_substr($_POST['newBody'], $length-1, $length) == ',') {
		        			$_POST['newBody'] = rtrim($_POST['newBody'], ',');
		        		}

		        		// Separo los tags recibidos
		        		$tags = explode(',', $_POST['newBody']);

		        		foreach($tags as $id => $tag) {
		        			// Limpio el tag
		        			$tag = strip_tags($tag);
							$tag = trim($tag);
		        			
		        			if(mb_strlen($tag) > 40) {
		        				// La longitud máxima es de 50
			        			Session::flash('message_Negative', 'Por favor, use etiquetas mas breves y descriptivas.');
		        				return \Redirect::to($this->route . '/asignaturas?cycle=' . $this->request['cycleId'] . '&yearFrom=' . $this->request['yearFromId']);
		        			}

		        			// Busco ese tag en la base de datos
		        			try {
			        			$result = Tag::select('tags.id')->where('tag', '=', strtolower($tag))->get()->toArray();
		        			} catch (\PDOException $e){
								//dd($e);
    					        abort(500);
							}
		        			
		        			// Si no lo encuentro lo creo nuevo
		        			if(empty($result)) {
		        				if(trim($tag) != '') {
		        					$insert = $this->insert(strtolower($tag));
		        				}
		        			} else {
		        				// Si lo encuentro compruebo si esta el cycleSubjectTags
		        				try {
		        					$check = Tag::select('cycleSubjectTags.tag_id')
		        										->join('cycleSubjectTags', 'cycleSubjectTags.tag_id', '=', 'tags.id')
		        										->where('cycleSubjectTags.cycleSubject_id', '=', $cycleSubject[0]['id'])
		        										->where('cycleSubjectTags.tag_id', '=', $result[0]['id'])
		        										->where('cycleSubjectTags.dateFrom', '=', $_POST['yearFromId'])
		        										->get()
		        										->toArray();
		        				} catch(\PDOException $e) {
		        					// dd($e);
		        					abort(500);
		        				}

		        				// Si no está lo inserto
		        				if(!isset($check) || empty($check)){
		        					$insert = $result[0]['id'];
		        				}				
		        			}

		        			// Si la insercion ha sido un éxito
		        			if(isset($insert) && $insert != false) {
		        				// Inserto en cycleSubjectTags
		        				$result = $this->insertCycleSubjectTags($cycleSubject[0]['id'], $_POST['yearFromId'], $insert);
		        				
		        				if($result != true) {
		        					// No existen ni tags anteriores ni nuevos
					        		Session::flash('message_Negative', 'No se ha podido llevar a cabo la inserción, intentelo de nuevo más tarde.');
					        		return \Redirect::to($this->route . '/asignaturas?cycle=' . $this->request['cycleId'] . '&yearFrom=' . $this->request['yearFromId']);
		        				}

		        			} else {
		        				// No existen ni tags anteriores ni nuevos
				        		Session::flash('message_Negative', 'No se ha podido llevar a cabo la inserción, intentelo de nuevo más tarde.');
				        		return \Redirect::to($this->route . '/asignaturas?cycle=' . $this->request['cycleId'] . '&yearFrom=' . $this->request['yearFromId']);
		        			}
		        		}
		        	}

		        	if(!isset($_POST['newBody']) && !isset($_POST['oldBody'])) {
		        		// No existen ni tags anteriores ni nuevos
		        		Session::flash('message_Negative', 'No se han recibido datos para actualizar.');
		        		return \Redirect::to($this->route . '/asignaturas?cycle=' . $this->request['cycleId'] . '&yearFrom=' . $this->request['yearFromId']);
		        	}

		        	// Realizado con éxito
	        		Session::flash('message_Success', 'Tags actualizados correctamente.');
			        return \Redirect::to($this->route . '/asignaturas?cycle=' . $this->request['cycleId'] . '&yearFrom=' . $this->request['yearFromId']);

	        	} else {
	        		// No se recibe el ciclo o está vacío
	        		Session::flash('message_Negative', 'Ha ocurrido un problema, intentelo de nuevo más tarde.');
		        	return \Redirect::to($this->route . '/asignaturas');
	        	}
        	} else {
        		// Esta asignatura no le pertenece
        		Session::flash('message_Negative', 'La asignatura recibida no le corresponde.');
	        	return \Redirect::to($this->route . '/asignaturas');
        	}        	
        } else {
			// Faltan los datos básicos
		    Session::flash('message_Negative', 'No se han recibido los datos necesarios.');
        	return \Redirect::to($this->route . '/asignaturas');
        }

    } // update()

    /**
     * Metodo que se encarga de insertar nuevos tags
     * @param  String $tag_name Nombre del nuevo tag
     * @return Integer | Boolean | Abort Devuelve el
     *                   		id de la ultima inserción |
     *                   		false si ha habido fallos |
     *                   		Abort 500 en caso de excepción
     */
    private function insert($tag_name)
    {
   		$tag_name = (string) $tag_name;

    	try {
    		$insert = Tag::insertGetId(['tag' => $tag_name, 'created_at' => date('YmdHis')]);		
    	} catch (\PDOException $e){
			//dd($e);
            abort(500);
		}

		if(isset($insert) && !empty($insert) && is_numeric($insert)) {
			return $insert;
		} else {
			return false;
		}
    } // insert()

    /**
     * Metodo que inserta los tags de una asignatura de un ciclo
     * @param  Integer $cycleSubject_id Identificador de la asignatura
     *                                  del ciclo
     * @param  Integer $year            Año en que se ha cursado
     * @param  Integer $tag_id          Identificador del tag
     * @return Boolean | Abort          True si se ha realizado correctamente |
     *                   				false si ha habido errores | Abort en
     *                   				caso de excepción
     */
    private function insertCycleSubjectTags($cycleSubject_id, $year, $tag_id)
    {
   		$cycleSubject_id = (int) $cycleSubject_id;
   		$year = (int) $year;
   		$tag_id = (int) $tag_id;

    	try {
    		$insert = \DB::table('cycleSubjectTags')->insert([
    			'cycleSubject_id' => $cycleSubject_id,
    			'tag_id' => $tag_id,
    			'dateFrom' => $year,
    			'created_at' => date('YmdHis')
    		]);

    	} catch (\PDOException $e){
			//dd($e);
            abort(500);
		}

		if(isset($insert) && $insert == true) {
			return true;
		} else {
			return false;
		}
    } // insertCycleSubjectTags()

    private function delete($cycleSubject_id, $dateFrom, $tag_id)
    {
    	$cycleSubject_id = (int) $cycleSubject_id;
   		$dateFrom = (int) $dateFrom;
   		$tag_id = (int) $tag_id;

    	try {
	    	$delete = \DB::table('cycleSubjectTags')
	    							->where('cycleSubjectTags.cycleSubject_id', '=', $cycleSubject_id)
	    							->where('dateFrom', '=', $dateFrom)
	    							->where('cycleSubjectTags.tag_id', '=', $tag_id)
	    							->delete();
    	} catch (\PDOException $e){
			//dd($e);
            abort(500);
		}

		if(isset($delete) && $delete == 1) {
			return true;
		} else {
			return false;
		}

    } // delete()

    public function getSubjectTags($cycleSubjectId, $year)
    {
    	$cycleSubjectId = (int) $cycleSubjectId;
    	$year = (int) $year;

        try{
        	// Obtengo el id de la tabla cycleSubjects
			$tags = Tag::select('tag_id', 'tag')->join('cycleSubjectTags', 'cycleSubjectTags.tag_id', '=', 'tags.id')
									->where('dateFrom', '=', $year)
									->where('cycleSubjectTags.cycleSubject_id', '=', $cycleSubjectId)
									->orderBy('tag', 'ASC')
									->get();
			
			return $tags;
									
		} catch (\PDOException $e){
			//dd($e);
            abort(500);
		}

    } // getSubjectTags()
}
