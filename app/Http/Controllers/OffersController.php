<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\JobOffer;
use App\Tag;
use App\ProfFamilie;
use App\Enterprise;
use App\User;
use App\Teacher;
use App\WorkCenter;
use App\Http\Requests;
use App\Http\Requests\DeniedOfferRequest;
use App\Http\Requests\OfferNotificationRequest;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\OfferEditRequest;

class OffersController extends UsersController
{
    // =====================================
    // Variables
    // =====================================

	public function __construct(Request $request)
    {
        Parent::__construct($request);
    }

    public function dueDate($time = '+4 month')
    {
         $nuevafecha = strtotime($time  , strtotime(date('YmdHms')));
         // Generamos una fecha nueva con 4 meses más
         $nuevafecha = date( 'YmdHms' , $nuevafecha );
         return $nuevafecha;
    }

    /**
     * Método que actualiza un comentario
     */
    public function getCommentEdit()
    {
        // Validamos los campos que nos llegan desde el formulario en el controlador
        // ya que los errores del comentario los mostraremos con un session flash
        $validator = \Validator::make($this->request->all(), [
            'idComment' => 'required|integer|validCommentUser',
            'title'     => 'required',
            'body'      => 'required'
        ]);

        // Si hay errores los mandamos a la vista
        if ($validator->fails()) {

            Session::flash('message_Negative', 'No se ha podido editar el comentario, titulo o comentario inválido');
            return \Redirect::back();
        }

        // Actualizamos el comentario con los datos que hemos recibido
        $comment = \DB::table('comments')
                            ->where('comments.id', '=', $this->request['idComment'])
                            ->update(['title' => $this->request['title'], 'body' => $this->request['body']]);

        Session::flash('message_Success', 'El comentario se ha editado correctamente');
        return \Redirect::back();

    } // getCommentEdit()

    /**
     * Método que borra un comentario con softDeletes
     * @param   $idComment  Id del comentario a borrar
     */
    public function getCommentDelete()
    {
        // Validamos los campos que nos llegan desde el formulario en el controlador
        // ya que los errores del comentario los mostraremos con un session flash
        $validator = \Validator::make($this->request->all(), [
            'idComment' => 'required|integer|validCommentUser',
        ]);

        // Si hay errores los mandamos a la vista
        if ($validator->fails()) {

            Session::flash('message_Negative', 'No se ha podido borrar el comentario, titulo o comentario inválido');
            return \Redirect::back();
        }

        // Borramos el comentario con softDeletes
        $comment = \DB::table('comments')
                            ->where('comments.id', '=', $this->request['idComment'])
                            ->delete();

        Session::flash('message_Success', 'El comentario se ha borrado correctamente');
        return \Redirect::back();

    } // getCommentDelete()

    /**
     * Método para crear un nuevo comentario
     */
    public function getCommentCreate()
    {
        // Validamos los campos que nos llegan desde el formulario en el controlador
        // ya que los errores del comentario los mostraremos con un session flash
        $validator = \Validator::make($this->request->all(), [
            'idOffer'   => 'required|integer|validOfferUser',
            'title'     => 'required',
            'body'      => 'required'
        ]);

        // Si hay errores los mandamos a la vista
        if ($validator->fails()) {

            Session::flash('message_Negative', 'No se ha podido crear el comentario, titulo o comentario inválido');
            return \Redirect::back();
        }

        // Insertamos el nuevo comentario
        $comment = \DB::table('comments')->insert([
            'title'       => $this->request['title'],
            'body'        => $this->request['body'],
            'jobOffer_id' => $this->request['idOffer'],
            'teacher_id'  => \Auth::user()->id,
            'created_at'  => date('YmdHms')
        ]);

        Session::flash('message_Success', 'El comentario se ha creado correctamente');
        return \Redirect::back();

    } // getCommentCreate()

    /**
     * [getOfferEdit description]
     * @param  [type] $idOffer [description]
     */
    public function getOfferEdit($idOffer)
    {
        // Saneamos el id que se nos pasa como parametro
        $idOffer = (int) $idOffer;
        $aux = [$idOffer];
        try {
            // Llamamos al Search para obtener la oferta seleccionada
            $offer = $this->invalidOrValidOffer($aux, $this->request);

            if (isset($offer[0])) {
                $offer = $offer[0];
            }

            $tag = $this->offerTag($idOffer);

            $offer = $this->arrayMap($offer, $tag, 'tag', true);

            $allTags = $this->allMapTags();

            $allProfFamilies = $this->allMapProfFamilies();

            $zona = (isset($offer->title) && isset($offer->enterpriseName)) ? $offer->title ." - " . $offer->enterpriseName : "Oferta de empleo";

            return view('offer/editForm', compact('offer','zona', 'allTags', 'allProfFamilies'));
        } catch(Exception $e){
            //dd($e);
            abort('500');
        }


    } // getOfferEdit()

    /**
     * Método que se encarga de editar la oferta y sus tags, el método insertara los tags de la siguiente forma:
     * primero insertaremos las posibles tags nuevas que el usuario haya introducido obviando las que haya podido
     * borrar, a continuación una vez insertadas las obtenemos y las comparamos con las tags recibidas, si una de ellas
     * no se encuentra en las recibidas por post la borraremos;
     *
     * @param   OfferEditRequest        Validación de los parámetros recibidos por post
     */
    public function postOfferEdit(OfferEditRequest $request)
    {

        // Validamos los campos que nos llegan desde el formulario en el controlador
        // ya que los errores del comentario los mostraremos con un session flash
        $validator = \Validator::make($this->request->all(), [
            'id'   => 'required|integer|validOfferEnterprise',
        ]);

        // Si hay errores los mandamos a la vista
        if ($validator->fails()) {

            Session::flash('message_Negative', 'La oferta que intenta editar es inválida');
            return \Redirect::back();
        }

        // Comenzamos la transaccion.
        \DB::beginTransaction();

        // Comprobamos que el id de la oferta
        $offer = JobOffer::findOrFail($this->request->id);

        // Obtenemos el id de la familia profesional
        $profFamily = ProfFamilie::where('name', '=', $this->request->name)->first();

        // Actualizamos todos los datos de la oferta que hemos recibido
        $insertOffer = JobOffer::where('id', '=', $this->request->id)->update([
            'title'          => $this->request->title,
            'duration'       => $this->request->duration,
            'level'          => $this->request->level,
            'experience'     => $this->request->experience,
            'kind'           => $this->request->kind,
            'wanted'         => $this->request->wanted,
            'description'    => $this->request->description,
            'others'         => $this->request->others,
            'dueDate'        => $this->dueDate(),
            'workCenter_id'  => $this->request->workcenter,
            'enterpriseResponsable_id' => $this->request->enterpriseResponsable,
            'profFamilie_id' => $profFamily->id,
        ]);

        if (!$insertOffer) {
            \DB::rollBack();
            Session::flash('message_Negative', 'Ha ocurrido un error durante la actualización de la oferta, por favor intentelo mas tarde');
            return \Redirect::back();
        }

        foreach ($this->request['tagCount'] as $key => $value) {

            // Comprobamos si la oferta tenia ya en la base de datos esa oferta, si ya estaba
            // continuara con la siguiente, si no esta la insertará
            $tag = Tag::select('*')->where('tag', '=', $value)->first();

            $offerTag = \DB::table('offerTags')->where('jobOffer_id', '=', $this->request->id)
                                                ->where('tag_id', '=', $tag->id)
                                                ->first();

            if (!$offerTag) {

                // Insertamos las nuevas ofertas
                $insertTags = \DB::table('offerTags')->insert([
                    'jobOffer_id' => $this->request->id,
                    'tag_id'      => $tag->id,
                    'created_at'  => date('YmdHms'),
                ]);


                if (!$insertTags) {
                    \DB::rollBack();
                    Session::flash('message_Negative', 'Ha ocurrido un error durante la actualización de la oferta, por favor intentelo mas tarde');
                    return \Redirect::back();
                }
            }
        }

        // Obtenemos todas las tags de la oferta
        $newTag = $this->allMapOfferTags($this->request->id);

        foreach ($newTag as $key => $value) {

            // Si el valor en la base de datos no se encuentra entre los valores recibidos del formulario
            // borraremos de la base de datos los sobrantes para que sea igual al del cliente
            if (!in_array($value, $this->request['tagCount'])) {

                $deleteTags = \DB::table('offerTags')->where('jobOffer_id', '=', $this->request->id)
                                        ->where('tag_id', '=', $key)
                                        ->delete();

                if (!$deleteTags) {
                    \DB::rollBack();
                    Session::flash('message_Negative', 'Ha ocurrido un error durante la actualización de la oferta, por favor intentelo mas tarde');
                    return \Redirect::back();
                }

            }


        }

        \DB::commit();
        Session::flash('message_Success', 'La oferta se ha actualizado correctamente');
        return \Redirect::to(\Auth::user()->rol . '/oferta/' . $this->request->id);

    } // postOfferEdit()

    /**
     * Método que actualiza la fecha de expiracion de la oferta
     */
    public function getOfferUpdate($idOffer)
    {
        // Comprobamos que el id de la oferta
        $offer = JobOffer::findOrFail($idOffer);

        // Fecha dentro de 4 meses donde se deberá borrar
        // de la base de datos
        $nuevafecha = strtotime( '+4 month' , strtotime(date( 'YmdHms')));

        // Generamos una fecha nueva con 4 meses más
        $nuevafecha = date( 'YmdHms' , $nuevafecha );

        $offer->dueDate = $nuevafecha;

        $offer->save();

        Session::flash('message_Success', 'La oferta se ha actualizado correctamente.');

        return \Redirect::back();

    } // getOfferUpdate()

    /**
     * método que muestra todas las ofertas de una empresa
     * @param  boolean $truncate Si queremos truncar la oferta o no, por defecto se trunca
     */
    public function getEnterpriseOffers($truncate = true){
        $idUser = \Auth::user()->id;
        // comprobamos obtenemos el id de la empresa
       $enterprise = $this->getEnterpriseId($idUser);
        if(isset($enterprise) && isset($enterprise[0]->id)) {
            $idEnterprise = $enterprise[0]->id;
            $request = $this->request;
            $verifiedOffer = $this->validOfferEnterprise($idEnterprise, $request, false);
            $urlSearch = config('routes.offerEnterprise.allOffers');
            $idOffer = [];
            foreach ($verifiedOffer as $key => $value) {
                $idOffer[] = $value->idJobOffer;
            }
            //dd($verifiedOffer);
            $tag = $this->offerTag($idOffer);

            $verifiedOffer = $this->arrayMap($verifiedOffer, $tag, 'tag');

            $allTags = $this->allMapTags();

            if ($truncate) {

            $descriptionLength = 250;

            foreach ($verifiedOffer as $key => $value) {
                //dd(mb_strlen($value->description));

                if (mb_strlen($value->description) > $descriptionLength) {

                    $value->description = mb_substr($value->description, 0, $descriptionLength) . '...';

                }
                // llamamos al método que nos seteará las otras etiquetas en caso de haberlas
                $this->cleanOtherTags($value);

            }
        } else {
            $this->setOtherTags($verifiedOffer);
        }
            // Variable que necesitamos pasarle a la vista para poder ver los fitros
            $filters = config('filters.verifiedOffers');

            // Variale de zona
            $zona = config('zona.admitidos.empresa');

            return view('generic.verified.verifiedOffer', compact('verifiedOffer', 'filters', 'zona','urlSearch' , 'request'));
        }

        // sino eres una empresa, desconfiamos
        $error = true;
        return view('errors.404', compact('error'));
    }// getEnterpriseOffers()

    /**
     * Método que muestra una oferta perteneciente a una empresa
     * @param  Integer $idOffer ID de la ofeta a vere
     */
    public function getOneEnterpriseOffer($idOffer){
        $request = $this->request;
        //
        return Parent::getOfferByIdEnterprise($idOffer, $request);
    }
    /**
     * método que
     * @param  Integer $idOffer ID de la oferta
     */
    public function getOneEnterpriseOfferEdit($idOffer){
        $request = $this->request;
        // Llamamos al método en modo de edición
        return Parent::getOfferByIdEnterprise($idOffer, $request, $edit = true);
    }
    /**
     * Método que muestra el formulario para crear una nueva ofertas
     */
    public function getNewOffer() {
        //obtenemos todas las familias profesionales
        $allProfFamilies = $this->allMapProfFamilies();
        //obtenemos todas las tags, mapeadas como array
        $allTags = $this->allMapTags();
        // obtenemos los centros de trabajo
        $workCenters = $this->getWorkCenter();
        // convertimos los centros de trabajo  en arrays
        $workCenters = $this->mapArray($workCenters);

        $enterpriseResponsable = $this->getEnterpriseResponsable();

        $enterpriseResponsable = $this->mapArray($enterpriseResponsable);

        return view('offer.registerForm', compact('allProfFamilies', 'allTags', 'workCenters', 'enterpriseResponsable'));
    }

    public function postNewOffer(OfferEditRequest $request) {
        // Comenzamos la transaccion.
        \DB::beginTransaction();

        // Obtenemos el id de la familia profesional
        $profFamily = ProfFamilie::where('name', '=', $this->request->name)->first();

        // Actualizamos todos los datos de la oferta que hemos recibido
        $insertOffer = JobOffer::insertGetId([
            'title'          => $this->request->title,
            'duration'       => $this->request->duration,
            'level'          => $this->request->level,
            'experience'     => $this->request->experience,
            'kind'           => $this->request->kind,
            'wanted'         => $this->request->wanted,
            'description'    => $this->request->description,
            'others'         => $this->request->others,
            'dueDate'        => $this->dueDate(),
            'workCenter_id'  => $this->request->workcenter,
            'enterpriseResponsable_id' => $this->request->enterpriseResponsable,
            'profFamilie_id' => $profFamily->id,
            'created_at'    => date('YmdHms'),
        ]);

        if (!$insertOffer) {
            \DB::rollBack();
            Session::flash('message_Negative', 'Ha ocurrido un error durante la inserción de la oferta, por favor intentelo mas tarde o pongase en contacto con bolsa@iescierva.net');
            return \Redirect::back();
        }

        foreach ($this->request['tagCount'] as $key => $value) {

            // Comprobamos si la oferta tenia ya en la base de datos esa oferta, si ya estaba
            // continuara con la siguiente, si no esta la insertará
            $tag = Tag::select('*')->where('tag', '=', $value)->first();

            $offerTag = \DB::table('offerTags')->where('jobOffer_id', '=', $insertOffer)
                                                ->where('tag_id', '=', $tag->id)
                                                ->first();

            if (!$offerTag) {

                // Insertamos las nuevas ofertas
                $insertTags = \DB::table('offerTags')->insert([
                    'jobOffer_id' => $insertOffer,
                    'tag_id'      => $tag->id,
                    'created_at'  => date('YmdHms'),
                ]);


                if (!$insertTags) {
                    \DB::rollBack();
                    Session::flash('message_Negative', 'Ha ocurrido un error durante la inserción de la oferta, por favor intentelo mas tarde o pongase en contacto con bolsa@iescierva.net');
                    return \Redirect::back();
                }
            }
        }

        // Mandamos un correo a los profesores para que validen la oferta
        $email = $this->sendEmailOffer($insertOffer, $profFamily->id);

        if (!$email) {
            \DB::rollBack();
            Session::flash('message_Negative', 'Ha ocurrido un error durante la inserción de la oferta, por favor intentelo mas tarde o pongase en contacto con bolsa@iescierva.net');
            return \Redirect::back();
        }

        \DB::commit();
        //obtenemos todas las familias profesionales
        $allProfFamilies = $this->allMapProfFamilies();
        //obtenemos todas las tags, mapeadas como array
        $allTags = $this->allMapTags();
        // obtenemos los centros de trabajo
        $workCenters = $this->getWorkCenter();
        // convertimos los centros de trabajo  en arrays
        $workCenters = $this->mapArray($workCenters);

        $enterpriseResponsable = $this->getEnterpriseResponsable();

        $enterpriseResponsable = $this->mapArray($enterpriseResponsable);
        Session::flash('message_Success', 'La oferta se ha creado correctamente, ahora mismo esta pendiente de aprobación');
        return \Redirect::to('ofertas');
    }

    public function postDelete()
    {
        //dd($this->request);
        try {
            $validator = \Validator::make($this->request->all(), [
                'idOffer' => 'required|integer|validDeleteOffer',
            ]);
            if(!$validator->fails()){
                // Actualizamos todos los datos de la oferta que hemos recibido
                $delete = JobOffer::where('id', '=', $this->request->idOffer)->update([
                    'dueDate'        => $this->dueDate(),
                    'deleted_at'     => date('YmdHms'),
                ]);
                if($delete){
                    Session::flash('message_Success', 'La oferta se ha borrado correctamente');
                } else {
                    Session::flash('message_Negative', 'Ha ocurrido un error durante el borrado de la oferta, por favor intentelo mas tarde o pongase en contacto con bolsa@iescierva.net');
                }
            } else {
                abort('404');
            }
        } catch (Exception $e) {
            abort('500');
        }
        if (\Auth::user()->rol === "empresa") {
            return \Redirect::to('ofertas');
        }
        return \Redirect::to(\Auth::user()->rol . '/oferta/verificadas');


    }

    /**
     * Método que envia correos a todos los profesores con las mismas ramas profesionales
     * que la oferta que se acaba de registrar.
     * @param  object $insert Datos del estudiante nuevo
     */
    public function sendEmailOffer($insertOffer, $idProfFamily)
    {
        // Variables con el contenido del email
        $subject = 'Validar oferta de trabajo';
        $cuerpo = 'La oferta de trabajo con titulo: ' . $this->request['firstName'] . ', cuyos requisitos son: duracion ' . $this->request['duration'] . ', nivel ' . $this->request['level'] . ', tipo ' . $this->request['kind'] . ', y una experiencia mínima de ' . $this->request['experience'] . ', necesita ' . $this->request['wanted'] . ' trabajadores, tiene que ser validada por un profesor para poder entrar en la aplicación.';

        // Obtenemos los profesores validados
        $validTeacher = $this->validTeacher();

        // Convertimos el objeto devuelto en un array
        $validTeacher = array_column($validTeacher, 'teacher_id');

        // Obtenemos los profesores de las mismas ramas profesionales que la oferta
        $teacher = Teacher::select('users.email', 'teachers.id')
                            ->join('users', 'users.id', '=', 'teachers.user_id')
                            ->join('teacherProfFamilies', 'teacherProfFamilies.teacher_id', '=', 'teachers.id')
                            ->join('profFamilies', 'profFamilies.id', '=', 'teacherProfFamilies.profFamilie_id')
                            ->join('subjectTeachers', 'subjectTeachers.teacher_id', '=', 'teachers.id')
                            ->join('subjects', 'subjects.id', '=', 'subjectTeachers.subject_id')
                            ->join('cycleSubjects', 'cycleSubjects.subject_id', '=', 'subjects.id')
                            ->join('cycleSubjectTags', 'cycleSubjectTags.cycleSubject_id', '=', 'cycleSubjects.id')
                            ->join('tags', 'tags.id', '=', 'cycleSubjectTags.tag_id')
                            ->where('profFamilies.id', '=', $idProfFamily)
                            ->whereIn('tags.tag', $this->request['tagCount'])
                            ->whereIn('teachers.id', $validTeacher)
                            ->distinct('teachers.id')
                            ->get();

        // Si hay algun profesor
        if (!$teacher->isEmpty()) {

            foreach ($teacher as $key => $value) {

                // Enviamos el email con los datos declarados antes
                $email = $this->email->sendEmail($value->email, $subject, null, $cuerpo);

                // Si hemos mandado el email registramos quien lo ha hecho y cuando
                if ($email) {

                    $sent = $this->insertSentEmail($insertOffer, $value->id);

                    if (!$sent) {
                        return false;
                    }

                }
            }

        // Si no hay ningun profesor ni tutor por defecto se le enviara al administrador
        } else {

            // Obtenemos los administradores
            $admin = $this->admin();

            foreach ($admin as $key => $value) {

                // Enviamos el email con los datos declarados antes
                $email = $this->email->sendEmail($value->email, $subject, null, $cuerpo);

                // Si hemos mandado el email registramos quien lo ha hecho y cuando
                if ($email) {

                    $sent = $this->insertSentEmail($insertOffer, $value->id);

                    if (!$sent) {
                        return false;
                    }
                }

            }
        }

        return true;

    } // sendEmailTeacher()

    /**
     * Método que registra los correos enviados a los profesores cuando se registra una nueva oferta
     * @param  $idOffer    Id del estudiante
     * @param  $idTeacher    Id del profesor
     * @return boolean       True or false si se ha insertado en la tabla o no
     */
    public function insertSentEmail($idOffer, $idTeacher)
    {
        $sent = \DB::table('sentEmails')->insert([
            'jobOffer_id' => $idOffer,
            'teacher_id' => $idTeacher,
            'sent'       => true,
            'created_at' => date('YmdHms')
        ]);

        return $sent;

    } // insertSentEmail()
}
