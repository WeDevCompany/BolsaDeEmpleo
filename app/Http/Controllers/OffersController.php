<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\JobOffer;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\SearchController;
use App\Http\Requests\DeniedOfferRequest;
use App\Http\Requests\OfferNotificationRequest;
use Illuminate\Support\Facades\Session;

class OffersController extends UsersController
{
    // =====================================
    // Variables
    // =====================================
    protected $request = null;          // Inicializada a null
    protected $search = null;           // Buscador

	public function __construct(Request $request)
    {
        // Almacenamos la petición realizada
        // en una variable de clase
        $this->request = $request;
        $this->search = new SearchController();

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
     * @return [type]          [description]
     */
    public function getOfferEdit($idOffer)
    {
        // Saneamos el id que se nos pasa como parametro
        $idOffer = (int) $idOffer;
        $aux = [$idOffer];

        // Obtenemos las familias profesionales del usuario logueado
        $profFamilie = $this->search->profFamilyTeacher();

        // Llamamos al Search para obtener la oferta seleccionada
        $offer = $this->search->invalidOrValidOffer($aux, $this->request,$profFamilie);

        if (isset($offer[0])) {
            $offer = $offer[0];
        }

        $zona = (isset($offer->title) && isset($offer->enterpriseName)) ? $offer->title ." - " . $offer->enterpriseName : "Oferta de empleo";

        return view('offer/editForm', compact('offer','zona'));

    } // getOfferEdit()

    /**
     * Método que se encarga de editar la oferta y sus tags, el método insertara los tags de la siguiente forma:
     * primero insertaremos las posibles tags nuevas que el usuario haya introducido obviando las que haya podido
     * borrar, a continuación una vez insertadas las obtenemos y las comparamos con las tags recibidas, si una de ellas
     * no se encuentra en las recibidas por post la borraremos;
     *
     * @param   $idOffer                Id de la oferta de trabajo
     * @param   OfferEditRequest        Validación de los parámetros recibidos por post
     */
    public function postOfferEdit($idOffer, OfferEditRequest $request)
    {
        // Comprobamos que el id de la oferta
        $offer = JobOffer::findOrFail($idOffer);

        // Actualizamos todos los datos de la oferta que hemos recibido
        $insertOffer = JobOffer::update($this->request->all());

        foreach ($request['tagCount'] as $key => $value) {
            
            // Comprobamos si la oferta tenia ya en la base de datos esa oferta, si ya estaba
            // continuara con la siguiente, si no esta la insertará
            $tag = Tag::where('name', '=', $value)->get();
            $offerTag = \DB::table('offerTags')->where('jobOffer_id', '=', $offer->id)
                                                ->where('tag_id', '=', $tag->id)
                                                ->get();

            if (!$offerTag) {

                // Insertamos las nuevas ofertas
                \DB::table('offerTags')->insert([
                    'jobOffer_id' => $offer->id,
                    'tag_id'      => $tag->id,
                ]);
            }
        }

        // Obtenemos todas las tags
        $newTag = Tag::select('*')
                        ->join('offerTags', 'offerTags.tag_id', '=', 'tags.id')
                        ->get();

        foreach ($newTag as $key => $value) {
            
            // Si el valor en la base de datos no se encuentra entre los valores recibidos del formulario
            // borraremos de la base de datos los sobrantes para que sea igual al del cliente
            if (!in_array($value->id, $request['tagCount'])) {
                
                \DB::table('offerTags')->where('jobOffer_id', '=', $offer->id)
                                        ->where('tag_id', '=', $value->id)
                                        ->delete();

            }


        }



        return \Redirect::to('');

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

    public function prueba()
    {
        return view('offer.registerForm');
    }
    
}
