<?php

namespace App\Http\Controllers\Enterprise;

use App\Enterprise;
use App\Http\Controllers\UsersController;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EnterprisesController extends UsersController
{

	public function __construct(Request $request)
    {
        Parent::__construct($request);
        $this->rules += [
            'name' => 'required',
            'cif' => 'required',
            'web' => 'required',
            'description' => 'required',
        ];
        $this->rol = 'empresa';
        $this->redirectTo = "/empresa";
    }

    public function index(){
        return view('enterprise.registerForm');
    } // index()

}
