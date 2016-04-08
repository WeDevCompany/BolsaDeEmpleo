<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UploadImageRequest;
use App\User;

class UsersController extends Controller
{

	public function teacherSignUp(){
        return view('teacher/form');
	} // teacherSignUp()

	public function studentSignUp(){
        return view('student/form');
	} // studentSignUp()

	public function enterpriseSignUp(){
        return view('enterprise/form');
	} // enterpriseSignUp()

	public function imagenPerfil()
	{
		return view('globals/uploadimage');
	}

	public function uploadImage(UploadImageRequest $request)
	{
		//obtenemos el campo file definido en el formulario
        $file = $request->file('imagen');
 
        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        //indicamos que queremos guardar un nuevo archivo en el disco local

        $save = $file->move(storage_path() . '/app/public/' . \Auth::user()->email, $nombre);

        if ($save) {

        	$user = new User;
        	$user->where('id', '=', \Auth::user()->id)->update(['image' => \Auth::user()->email . '/' . $nombre]); 
        }
 
        return Redirect::to('/perfil');
	}
}
