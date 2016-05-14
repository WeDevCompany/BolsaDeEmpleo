<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Teacher\TeachersController;
use App\Teacher;
use App\User;
use App\Http\Requests;
use App\Http\Requests\TeacherNotificationRequest;
use App\Http\Controllers\Controller;

//use Datatables;

class AdminsController extends TeachersController
{

	public function index(){
        return view('admin/index');
	} // index()

	/**
     * Metodo que obtiene los profesores
     * @return  view        vista en la que el profesor validara a los profesores
     * @return  estudiante  Todos los datos de los profesores no validados
     */
    public function getTeacherNotification()
    {

        // Obtenemos todos los profesores validados
        $validTeacher = \DB::table('verifiedTeachers')->select('teacher_id')->get();

        // Obtenemos los profesores que no estan validados
        $invalidTeacher = Teacher::select('*')->whereNotIn('teachers.id', array_column($validTeacher, 'teacher_id'))->join('users', 'users.id', '=', 'user_id')->paginate();
        return view('admin/notification', compact('invalidTeacher'));
		

    } // getTeacherNotification()

    /**
     * Metodo que Valida los profesores y que admin lo ha validado
     * @return  view        redireccion a la vista en la que el admin validara a los profesores
     *
     */
    public function postTeacherNotification(TeacherNotificationRequest $request)
    {
        // Array de los profesor a validar
        $profesor = $request->toArray();

        foreach ($profesor['profesor'] as $id => $value) {

            // Comprobamos si el profesor se encuentra validado o no
            $verifiedTeacher = Teacher::where('verifiedTeachers.teacher_id', '=', $value)
                                        ->join('verifiedTeachers', 'verifiedTeachers.teacher_id', '=', 'teachers.id')
                                        ->first();

            // Obtenemos el id del admin logueado actualmente
            $authTeacher = Teacher::where('user_id', '=', \Auth::user()->id)->first();

            // Si no esta validado insertamos en la tabla su id junto al del
            // admin que lo ha validado
            if(!$verifiedTeacher){

                \DB::table('verifiedTeachers')->insert([
                    'teacher_id' => $value,
                    'admin_id' => $authTeacher['id'],
                    'created_at' => date('YmdHms')
                ]);

            }

        }

        return \Redirect::to('admin/notificacion');

    } // postTeacherNotification()

}
