<?php

namespace App\Http\Controllers\Enterprise;

use App\Enterprise;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StatesController;
use App\Http\Requests;
use App\User;
use App\EnterpriseResponsable;
use App\WorkCenter;
use App\JobOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CitiesController;
use App\Http\Request\WorkCenterRequest;
use App\Http\Request\WorkCenterCreateRequest;
use App\Http\Request\EnterpriseResponsableRequest;

class EnterprisesController extends UsersController
{
    private $workCenter;
    private $responsables;
	public function __construct(Request $request)
    {
        $roads = implode(',', config('roads.road'));
        Parent::__construct($request);
        $this->rules += [
            'name'              => 'required|between:2,145|regex:/^[A-Za-z0-9 ]+$/',
            'cif'               => 'required|unique:enterprises,cif|cif',
            'web'               => 'between:2,200',
            'description'       => 'required|between:6,225',
            'nameWorkCenter'    => 'required|between:2,200|regex:/^[A-Za-z0-9 ]+$/|unique:workCenters,name',
            'emailContact'      => 'required|between:2,75|email',
            'phone1'            => 'required|digits_between:9,13',
            'phone2'            => 'digits_between:9,13',
            'road'              => 'required|in:'.$roads,
            'address'           => 'required|between:6,225',
            'state'             => 'required|exists:states,id',
            'citie'             => 'required|exists:cities,id',
            'firstName'         => 'required',
            'dni'               => 'required|unique:enterpriseResponsables,dni|allDni',
            'lastName'          => 'required',
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

                if ($insercion !== false) {

                    // Llamo al metodo sendEmail del controlador de las familias profesionales
                    $email = Parent::sendEmail();

                    if($email === true) {
                        \DB::commit();
                        Session::flash('message_Success', 'Se ha registrado correctamente.');
                        return \Redirect::to('confirmacion');
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


    private function createWorkCenter($enterprise, $responsable = true, $principalCenter = true)
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
                'citie_id'          => $data['citie'],
                'principalCenter'   => $principalCenter,
                'created_at'        => date('YmdHms')
            ]);

            if ($responsable = true) {

                foreach ($data['firstName'] as $key => $value) {

                    $insertResponsable = EnterpriseResponsable::create([
                        'firstName'     => $value,
                        'lastName'      => $data['lastName'][$key],
                        'dni'           => $data['dni'][$key],
                        'created_at'    => date('YmdHms')
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
            }

        } catch(\PDOException $e){
            //dd($e);
            abort(500);
        }

        if(isset($insertWorkCenter)){
            return $insertWorkCenter;
        }
        return false; // devuelvo false (temporal) debo devolver los errores
    } // createWorkCenter()

    public function imagenPerfil()
    {
        return view(config('appViews.perfil'));
    } // imagenPerfil()

    public function getWorkCenterEnterprise()
    {
        // Url de buscador
        $urlSearch = config('routes.enterprise.workCenter');

        // Variale de zona
        $zona = config('zona.enterprise.workCenter');

        // Centros de trabajo de la empresa
        $workCenters = $this->getWorkCenter(null, false, $this->request);

        // Todos los responsables de la empresa
        $responsables = $this->getEnterpriseResponsable(null, false, $this->request);

        $request = $this->request;

        // Llamo al metodo getAllStates del controlador de las provincias
        $states = app(StatesController::class)->getAllStates();

        // Obtengo el identificador de la primera provincia
        $stateId = array_keys($states)[0];

        // Obtengo los ciclos de la primera familia
        $cities = app(CitiesController::class)->getAllCities($stateId);

        $allResponsables = null;

        if (isset($workCenters[0])) {
            $allResponsables = $this->allMapResponsableCenter($workCenters[0]->enterprise_id);
        }

        return view('workCenter/workCenterList', compact('workCenters', 'responsables', 'zona', 'urlSearch', 'request', 'states', 'cities', 'allResponsables'));

    } // getWorkCenterEnterprise()

    public function postWorkCenterEdit(WorkCenterRequest $request)
    {
        // Comenzamos la transaccion.
        \DB::beginTransaction();

        $workCenter = WorkCenter::where('id', '=', $request->id)->update([
            'name' => $request->nameWorkCenter,
            'email' => $request->emailContact,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'fax' => $request->fax,
            'road' => $request->road,
            'address' => $request->address,
            'citie_id' => $request->citie,
        ]);

        $responsableDelete = \DB::table('enterpriseCenterResponsables')->where('workCenter_id', '=', $request->id)->delete();

        if (!$workCenter && !$responsableDelete) {
            \DB::rollBack();
            Session::flash('message_Negative', 'No hemos podido actualizar el centro de trabajo, por favor intentelo mas tarde');
            return \Redirect::back();
        }

        foreach ($request->responsable as $key => $value) {

            $responsable = \DB::table('enterpriseCenterResponsables')->insert([
                'workCenter_id' => $request->id,
                'enterpriseResponsable_id' => $value,
                'created_at' => date('YmdHms'),
            ]);

            if (!$responsable) {
                \DB::rollBack();
                Session::flash('message_Negative', 'No hemos podido actualizar el centro de trabajo, por favor intentelo mas tarde');
                return \Redirect::back();
            }

        }

        \DB::commit();
        Session::flash('message_Success', 'El centro de trabajo ha sido editado correctamente');
        return \Redirect::back();

    } // postWorkCenterEdit()

    public function postCreateWorkCenter(WorkCenterCreateRequest $request)
    {
        // Comenzamos la transaccion.
        \DB::beginTransaction();

        $responsable = false;

        if ($request['firstName'] && $request['lastName'] && $request['dni']) {
            $responsable = true;
        }

        $enterprise = Enterprise::where('user_id', '=', \Auth::user()->id)->first();

        $principalCenter = false;

        $insercion = Self::createWorkCenter($enterprise, $responsable, $principalCenter);

        if ($request->responsable) {
            
            foreach ($request->responsable as $key => $value) {

                $responsable = \DB::table('enterpriseCenterResponsables')->insert([
                    'workCenter_id' => $insercion->id,
                    'enterpriseResponsable_id' => $value,
                    'created_at' => date('YmdHms'),
                ]);

                if (!$responsable) {
                    \DB::rollBack();
                    Session::flash('message_Negative', 'No hemos podido crear el centro de trabajo, por favor intentelo mas tarde');
                    return \Redirect::back();
                }

            }

        }

        if ($insercion !== false) {
            \DB::commit();
            Session::flash('message_Success', 'El centro de trabajo ha sido creado correctamente');
            return \Redirect::back();
        }

        \DB::rollBack();
        Session::flash('message_Negative', 'No hemos podido crear el centro de trabajo, por favor intentelo mas tarde');
        return \Redirect::back();

    } // createWorkCenter()

    public function deleteWorkCenter()
    {
        $deleteCenter = WorkCenter::where('id', '=', $this->request->id)->first();

        $deleteCenter->deleted_at = date('YmdHms');
        $delete = $deleteCenter->save();

        if ($delete) {
            Session::flash('message_Success', 'El centro de trabajo ha sido borrado correctamente');
            return \Redirect::back();
        }

        Session::flash('message_Negative', 'No hemos podido borrar el centro de trabajo, por favor intentelo mas tarde');
        return \Redirect::back();

    } // deleteWorkCenter()

    public function getResponsable()
    {
        // Url de buscador
        $urlSearch = config('routes.enterprise.responsable');

        // Url de borrado
        $urlDelete = config('routes.enterprise.responsableDelete');;

        // Variale de zona
        $zona = config('zona.enterprise.responsable');

        // Variable que necesitamos pasarle a la vista para poder ver los fitros
        $filters = config('filters.responsable');

        // Obtenemos los responsables de la empresa
        $responsables = $this->getEnterpriseResponsable(null, true, $this->request);

        // Centros de trabajo de la empresa
        $enterpriseCenters = $this->allMapCenters();

        // Request
        $request = $this->request;

        return view('workCenter/responsableList', compact('workCenters', 'responsables', 'filters', 'zona', 'urlSearch', 'urlDelete', 'request', 'enterpriseCenters'));
    }

    public function editResponsable(EnterpriseResponsableRequest $request)
    {

        $insertResponsable = EnterpriseResponsable::where('id', '=', $request->id)->update([
                'firstName'     => $request['firstName'],
                'lastName'      => $request['lastName'],
                'dni'           => $request['dni'],
        ]);

        if (!$insertResponsable) {
            Session::flash('message_Negative', 'No hemos podido editar el responsable, por favor intentelo mas tarde');
        return \Redirect::back();
        }
        Session::flash('message_Success', 'El responsable ha sido editado correctamente');
        return \Redirect::back();

    } // enterpriseResponsableEdit()

    public function deleteEnterpriseResponsable($idResponsable)
    {
        // Comenzamos la transaccion.
        \DB::beginTransaction();

        $deleteResponsable = EnterpriseResponsable::where('id', '=', $idResponsable)->first();

        $deleteResponsable->deleted_at = date('YmdHms');
        $delete = $deleteResponsable->save();

        $offer = JobOffer::where('enterpriseResponsable_id', '=', $idResponsable)->get();

        if (!$offer->isEmpty() && $offer[0]) {
        
            foreach ($offer as $key => $value) {

                $value->deleted_at = date('YmdHms');
                $value->save();

                if ($value->deleted_at == null) {
                    \DB::rollBack();
                    $message = 'No hemos podido borrar el responsable, por favor intentelo mas tarde';
                    $status = 'fail';

                    return $ajax = [
                            'id'      => $deleteResponsable->id,
                            'message' => $message,
                            'status'  => $status
                    ];
                }

            }
        }

        if ($deleteResponsable->deleted_at != null) {
            \DB::commit();
            $message = 'El responsable ha sido borrado correctamente';
            $status = 'success';

            return $ajax = [
                'id'      => $deleteResponsable->id,
                'message' => $message,
                'status'  => $status
            ];
        }

        \DB::rollBack();
        $message = 'No hemos podido borrar el responsable, por favor intentelo mas tarde';
        $status = 'fail';

        return $ajax = [
                'id'      => $deleteResponsable->id,
                'message' => $message,
                'status'  => $status
        ];
    } // deleteEnterpriseResponsable()

    public function createEnterpriseResponsable(EnterpriseResponsableRequest $request)
    {
        // Comenzamos la transaccion.
        \DB::beginTransaction();

        foreach ($request['firstName'] as $key => $value) {


            $insertResponsable = EnterpriseResponsable::create([
                    'firstName'     => $value,
                    'lastName'      => $request['lastName'][$key],
                    'dni'           => $request['dni'][$key],
                    'created_at'    => date('YmdHms')
            ]);

            $insertResponsableCenter = \DB::table('enterpriseCenterResponsables')->insert([
                'workCenter_id' => $request->idWorkCenter,
                'enterpriseResponsable_id' => $insertResponsable->id,
                'created_at'    => date('YmdHms')
            ]);

            if (!$insertResponsable && !$insertResponsableCenter) {
                \DB::rollBack();
                Session::flash('message_Negative', 'No hemos podido crear el responsable, por favor intentelo mas tarde');
                return \Redirect::back();
            }
        }

        \DB::commit();
        Session::flash('message_Success', 'El responsable ha sido creado correctamente');
        return \Redirect::back();
    } // createEnterpriseResponsable()


}
