<?php
namespace App\Http\Traits;

trait Functions {
	public function parseId($id, $mensaje) {
		// Evitamos tirarlo contra la base de datos
		if (isset($id)) {
			$id = (int) $id;
			if ($id === 0) {
				Session::flash('message_Negative', $mensaje);
				return false;
			} else {
				return $id;
			}
		} else {
			Session::flash('message_Negative', $mensaje);
			return false;
		}
	}

	public function idToArray($object) {
		$emty_array = [];
		foreach ($object as $key => $value) {
			$emty_array[] = $value->id;
		}
		return $emty_array;
	}
}
