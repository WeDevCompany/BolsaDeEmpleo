<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UsoController extends Controller
{
    

    public function __construct()
    {
        
    }

    /**
     * Muestra la vista que explica el funcionamiento de la Web.
     */
    public function index()
    {
        return view('globals/uso');
    }

}
