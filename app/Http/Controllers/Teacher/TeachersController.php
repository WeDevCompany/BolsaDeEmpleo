<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;

class TeachersController extends Controller
{

	public function index(){
        return view('teacher/form');
	}

    public function store(Request $request){
    	$validator = Validator::make($request->all(), [
            'firstName' => 'required|min:3|max:20',
            'lastName' => 'required|min:3|max:20',
            'dni' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('profesor.index')
                ->withErrors($validator)
                ->withInput();

             }

         $all = $request->all();
        //$email = $all['email'];
          //  $ldate = date('Y-m-d H:i:s');
        //$user = \DB::table('contacts')->where('email', $email)->first();

        //if($user){
          //  Session::flash('message','Este email ya existe');
            //return view('contacts.fail');
        //};

            \DB::table('teachers')->insert([
                'firstName' => $all['firstName'],
                'lastName' => $all['lastName'],
                'dni' => $all['dni'],
                'phone' => $all['phone'],
                
            ]);
            {
                Session::flash('message','El registro fue añadido');
                return view('contacts.sucesful');
            }

        }
}
