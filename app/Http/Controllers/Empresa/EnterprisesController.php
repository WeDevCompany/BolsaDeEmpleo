<?php

namespace App\Http\Controllers\Empresa;

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
            'firstName' => 'required',
            'lastName' => 'required',
            'dni' => 'required',
            'phone' => 'required',
        ];
        $this->rol = 'enterprise';
        $this->redirectTo = "/empresa";
    }

    public function index(){
        return view('home');
    } // index()

}
