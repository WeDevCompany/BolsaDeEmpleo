<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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
}
