<?php

namespace App\Http\Controllers\Enterprise;

use App\Enterprise;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StatesController;
use App\Http\Requests;
use App\User;
use App\EnterpriseResponsable;
use App\WorkCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EnterprisesController extends UsersController
{

	public function __construct(Request $request)
    {
        $roads = implode(',', config('roads.road'));
        Parent::__construct($request);
        $this->rules += [
            'name'              => 'required|between:2,145|regex:/^[A-Za-z0-9 ]+$/',
            'cif'               => 'required',
            'web'               => 'between:2,200',
            'description'       => 'required|between:6,225',
            'nameWorkCenter'    => 'required|between:2,200|regex:/^[A-Za-z0-9 ]+$/|unique:workCenters,name',
            'emailContact'      => 'required|between:2,75|email',
            'phone1'            => 'required|digits_between:9,13',
            'phone2'            => 'digits_between:9,13',
            'road'              => 'required|in:'.$roads,
            'address'           => 'required|between:6,225',
            'state'             => 'required',
            'citie'             => 'required',
            'firstName'         => 'required|between:2,45|regex:/^[A-Za-z0-9 ]+$/',
            'dni'               => 'required|min:9|unique:enterpriseResponsables,dni|allDni',
            'lastName'          => 'required|between:2,75|regex:/^[A-Za-z0-9 ]+$/',
        ];
        $this->rol = 'empresa';
        $this->redirectTo = "/empresa";
    }

    protected function store()
    {
        // Comenzamos la transaccion.
        \DB::beginTransaction();

        $user = Parent::store();

        if($user === false){
            \DB::rollBack();
            Session::flash('message_Negative', 'En estos momentos no podemos llevar a cabo su registro. Por favor intentelo de nuevo más tarde.');
        } else {

            // Llamo al metodo para crear el profesor.
            $insercion = Self::create();

            if($insercion !== false){

                $insercion = Self::createWorkCenter($insercion);

                if ($insercion === true) {
                    
                    // Llamo al metodo sendEmail del controlador de las familias profesionales
                    $email = Parent::sendEmail();

                    if($email === true) {
                        \DB::commit();
                        Session::flash('message_Success', 'Se ha registrado correctamente.');
                        return \Redirect::to('login');
                    } else {
                        \DB::rollBack();

                        Session::flash('message_Negative', 'En estos momentos no podemos llevar a cabo su registro. Por favor intentelo de nuevo más tarde.');
                    }

                } else {
                    \DB::rollBack();
                    Session::flash('message_Negative', 'En estos momentos no podemos llevar a cabo su registro. Por favor intentelo de nuevo más tarde.');
                }

            } else {
                \DB::rollBack();
                Session::flash('message_Negative', 'En estos momentos no podemos llevar a cabo su registro. Por favor intentelo de nuevo más tarde.');
            }
        }

        // Redireccionamos a la vista de validacion del email. (index provisional).
        return redirect()->back();
    } // store()

    private function create()
    {
        $data = $this->request->all();

        try {
            $insercion = Enterprise::create([
                'name'          => $data['name'],
                'web'           => $data['web'],
                'cif'           => $data['cif'],
                'description'   => $data['description'],
                'user_id'       => $data['user_id'],
                'created_at'    => date('YmdHms'),
            ]);

        } catch(\PDOException $e){
            //dd($e);
            abort(500);
        }

        if(isset($insercion)){
            return $insercion;
        }
        return false;
    } // create()

    
    private function createWorkCenter($enterprise)
    {
        $data = $this->request->all();

        try {
            
            $insertWorkCenter = WorkCenter::create([
                'road'              => $data['road'],
                'address'           => $data['address'],
                'name'              => $data['nameWorkCenter'],
                'email'             => $data['emailContact'],
                'phone1'            => $data['phone1'],
                'phone2'            => $data['phone2'],
                'fax'               => $data['fax'],
                'enterprise_id'     => $enterprise['id'],
                'citie_id'          => $data['city'][0],
                'principalCenter'   => true,
                'created_at'        => date('YmdHmsY')
            ]);

            foreach ($data['firstName'] as $key => $value) {
               
                $insertResponsable = EnterpriseResponsable::create([
                    'firstName'     => $value,
                    'lastName'      => $data['lastName'][$key],
                    'dni'           => $data['dni'][$key],
                    'created_at'    => date('YmdHmsY')
                ]);

                $insertCenterResponsable = \DB::table('enterpriseCenterResponsables')->insert([
                    'workCenter_id'             => $insertWorkCenter['id'],
                    'enterpriseResponsable_id'  => $insertResponsable['id'],
                    'created_at'                 => date('YmdHms')
                ]);
                
                if (!$insertResponsable && $insertCenterResponsable) {
                    return false;
                }
            }

        } catch(\PDOException $e){
            //dd($e);
            abort(500);
        }

        if(isset($insertWorkCenter)){
            return true;
        }
        return false; // devuelvo false (temporal) debo devolver los errores
    } // createWorkCenter()

    public function imagenPerfil()
    {
        return view(config('appViews.perfil'));
    } // imagenPerfil()

}
