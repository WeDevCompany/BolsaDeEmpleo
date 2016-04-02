<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class TeachersController extends Controller
{
	public function index(){
        return view('admin/index');
	} // index()

}
