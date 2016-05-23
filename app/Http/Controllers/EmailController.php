<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

class EmailController extends Controller
{
    /**
     * Método que envia un email a un usuario
     * para validar su cuenta
     * @return Boolean false si no se envia el email.
     */
    public function sendEmail($to = null, $subject = null, $from = null, $cuerpo = null, $attach = null)
    {

        try{

            $user = User::where('email', '=', $to)->first();

            // Mandamos el email al usuario con los datos de la vista
            $email = \Mail::send('auth/emails/email', compact('user', 'cuerpo'), function ($m) use ($user, $to, $from, $subject, $attach){

                // Destinatario
                $m->to($to);

                // Asunto
                if ($subject != null) {

                    $m->subject($subject);

                }

                // Quien manda el mensaje
                if ($from != null) {
                        
                    $m->from($from);

                }

                // Adjuntar archivos
                if ($attach != null) {
                        
                    $m->attach($attach);

                }

            });

        } catch(\PDOException $e) {
                //dd($e);
                abort(500);
        }


        if(is_null($email)) {
            return false;
        } elseif ($email !== false) {
            return true;
        } else {
            return false;
        }

    } // sendEmail()

    
}
