<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Teacher\TeachersController;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class AdminsController extends TeachersController
{
	public function index(){
        return view('admin/index');
	} // index()

}
