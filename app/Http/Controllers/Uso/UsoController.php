<?php

namespace App\Http\Controllers\Uso;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('partials/globals/uso');
    }

}
