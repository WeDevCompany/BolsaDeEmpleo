<?php

namespace App\Providers;

use Validator;
use App\Student;
use App\Teacher;
use App\JobOffer;
use App\Enterprise;
use App\EnterpriseResponsable;
use App\Http\Traits\Search;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    use Search;

    private $year = [];
    /**
     * Este método tiene como pre-requisitos la obtención del id del usuario logueado la cual queremos validar el centro de trabajo
     * este requisito es un entero, y el id del centro de trabajo que queremos validar contra la base de datos
     * este método lanzará una consulta a la base de datos la cual se encargará de comprobar si dicho centro de trabajo perteneciente
     * a dicha empresa, este método devolverá true en caso de que dicho centro de trabajo sea valido y false en caso de que este no sea
     * un centro de trabvajo valido
     * @param  Integer $idUser ID
     * @param  Integer $idWorkCenter ID
     * @return boolean     true | false
     */
    private function validWorkCenter($idUser, $idWorkCenter)
    {
        $workCenter = Enterprise::select('wc.id')
                                ->join('users as u', 'u.id', '=', 'enterprises.user_id')
                                ->join('workCenters as wc', 'wc.enterprise_id', '=','enterprises.id')
                                ->where('u.id', '=', $idUser)
                                ->where('wc.id', '=', $idWorkCenter)
                                ->first();

        //dd($workCenter->id);
        // Realizamos una comprobación del resultado de la consulta.
        if(! empty($workCenter)){
            return true;
        }
        return false;
    }// validWorkCenter()

    /**
     * Método que tiene como pre-requisitos obtener 3 parámetros:
     * el primero será el id del usuario logueado
     * el segundo parametro sería el id del centro de trabajo
     * el cuarto parametro sería el id del responsable que se nos a enviado mediante el formulario
     * todos los parametros son enteros y devuelven true | false
     * @param  integer $idUser  ID
     * @param  integer $idWorkCenter  ID
     * @param  integer $idResponsable ID
     * @return boolean true | false
     */
    private function validateEnterpriseResponsable($idUser,$idWorkCenter,$idResponsable){
        $enterpriseResponsable = EnterpriseResponsable::select('enterpriseResponsables.id')
                                                    ->join('enterpriseCenterResponsables as ecr', 'ecr.enterpriseResponsable_id', '=', 'enterpriseResponsables.id')
                                                    ->join('workCenters as wc', 'wc.id', '=', 'ecr.workCenter_id')
                                                    ->join('enterprises as e', 'e.id', '=', 'wc.enterprise_id')
                                                    ->join('users as u', 'u.id', '=', 'e.user_id')
                                                    ->where('u.id', $idUser)
                                                    ->where('wc.id', $idWorkCenter)
                                                    ->where('enterpriseResponsables.id', $idResponsable)
                                                    ->first();

        // Realizamos una comprobación del resultado de la consulta.
        if(! empty($enterpriseResponsable)){
            return true;
        }
        return false;
    }// validateEnterpriseResponsable()

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        /**
        *   Validacion para el dni
        *   Recibe como parametro el atributo a validar y su valor
        *   Devuelve si es valido o no
        */
        Validator::extend('dni', function($attribute, $dni, $parameters)
        {

            // Separacion de la letra y los numeros
            $dni = strtoupper($dni);
            $letra = substr($dni, -1);
            $numero = substr($dni, 0, -1);

            // Validacion del nie, sustituimos caracteres especiales y el resto de la validacion es como el dni
            if (preg_match('/^[XYZ]{1}/', $numero[0]) && substr("TRWAGMYFPDXBNJZSQVHLCKE", str_replace('Z', '2', str_replace('Y' ,'1', str_replace('X', '0', $numero))) % 23, 1) == $letra && strlen($letra) == 1 && strlen ($numero) == 8) {

                return true;

                // Validacion dni, generamos la letra y comprobamos que coincida
            } else if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numero % 23, 1) == $letra && strlen($letra) == 1 && strlen ($numero) == 8){

                return true;

            }

            return false;


        }); // Validator dni fin

        /**
        *   Validacion para el dni
        *   Recibe como parametro el atributo a validar y su valor
        *   Devuelve si es valido o no
        */
        Validator::extend('allDni', function($attribute, $dni, $parameters)
        {
            foreach ($dni as $key => $value) {

                $valid = false;
                // Separacion de la letra y los numeros
                $dni = strtoupper($value);
                $letra = substr($dni, -1);
                $numero = substr($dni, 0, -1);

                // Validacion del nie, sustituimos caracteres especiales y el resto de la validacion es como el dni
                if (preg_match('/^[XYZ]{1}/', $numero[0]) && substr("TRWAGMYFPDXBNJZSQVHLCKE", str_replace('Z', '2', str_replace('Y' ,'1', str_replace('X', '0', $numero))) % 23, 1) == $letra && strlen($letra) == 1 && strlen ($numero) == 8) {

                    $valid = true;

                    // Validacion dni, generamos la letra y comprobamos que coincida
                } else if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numero % 23, 1) == $letra && strlen($letra) == 1 && strlen ($numero) == 8){

                    $valid = true;

                }

                if ($valid = false) {
                    return false;
                }
            }

            return true;

        }); // Validator allDni fin

        /**
        *   Validacion para el cif
        *   Recibe como parametro el atributo a validar y su valor
        *   Devuelve si es valido o no
        */
        Validator::extend('cif', function($attribute, $cif, $parameters)
        {
            $cif = strtoupper($cif);

            $cifRegEx1 = '/^[ABEH][0-9]{8}$/i';
            $cifRegEx2 = '/^[KPQS][0-9]{7}[A-J]$/i';
            $cifRegEx3 = '/^[CDFGJLMNRUVW][0-9]{7}[0-9A-J]$/i';

            if (preg_match($cifRegEx1, $cif) || preg_match($cifRegEx2, $cif) || preg_match($cifRegEx3, $cif)) {
                $control = $cif[strlen($cif) - 1];
                $suma_A = 0;
                $suma_B = 0;

                for ($i = 1; $i < 8; $i++) {
                    if ($i % 2 == 0) $suma_A += intval($cif[$i]);
                    else {
                        $t = (intval($cif[$i]) * 2);
                        $p = 0;

                        for ($j = 0; $j < strlen($t); $j++) {
                            $p += substr($t, $j, 1);
                        }
                        $suma_B += $p;
                    }
                }

                $suma_C = (intval($suma_A + $suma_B)) . "";
                $suma_D = (10 - intval($suma_C[strlen($suma_C) - 1])) % 10;

                $letras = "JABCDEFGHI";

                if ($control >= "0" && $control <= "9") return ($control == $suma_D);
                else return (strtoupper($control) == $letras[$suma_D]);
            }

            return false;
        });

        /**
        *   Validacion para las fechas de los ciclos cursados
        *   Recibe como parametro el atributo a validar, su valor y request
        *   Devuelve si es valido o no
        */
        Validator::extend('cycleYearFrom', function($attribute, $value, $parameters, $form)
        {
            // Variable para la fecha actual
            $date = date('Y');
            $fechaActual = (int)$date;

            // Obtenemos toda la informacion mandada en el formulario
            $field = $form->getData();

            // Recorremos todas las fechas
            for ($a = 0; $a < count($value) ; $a++) {

                if (isset($field['yearTo'][$a]) && isset($field['yearFrom'][$a])) {

                    $yearTo = (int)$field['yearTo'][$a];
                    $yearFrom = (int)$field['yearFrom'][$a];
                    $z = 0;

                    if ($yearFrom < 1990 || $yearFrom > $fechaActual || $yearTo > $fechaActual || $yearTo == $yearFrom || $yearTo < $yearFrom) {
                        return false;

                    }

                    // Recorremos los años guardados y si coinciden con alguno de
                    // los que el alumno escribio anteriormente dara error la validacion
                    if (count($this->year) != 0) {

                        for ($i = 0; $i < count($this->year); $i++) {

                            if($this->year[$i] == $yearFrom || $this->year[$i] == $yearTo){
                                return false;
                            }
                        }

                    }

                    // Recorremos los años de un ciclo y los guardamos en una variable
                    for ($j = $yearFrom + 1; $j < $yearTo; $j++) {

                        $this->year[$z] = $j;
                        $z++;
                    }
                }
            }
            return true;

        });// Validator cycleYearFrom fin

        /**
         * Validacion en la que comprobamos que es un estudiante
         * para luego validarlo en la aplicacion por un profesor
         */
        Validator::extend('validStudentNotification', function($attribute, $id, $parameters)
        {

            foreach ($id as $key => $value) {

                // Validacion estudiante borrado
                if (implode($parameters) == 'deleted_at') {

                    $student = Student::where('id', '=', $value)->withTrashed()->first();

                // Validacion estudiante normal
                } else {

                    $student = Student::where('id', '=', $value)->first();

                }

                if (!$student) {

                    return false;

                }
            }

            return true;

        });// Validator validStudentNotification fin

        /**
         * Validacion en la que comprobamos que es un profesor
         * para luego validarlo en la aplicacion por un admin
         */
        Validator::extend('validTeacherNotification', function($attribute, $id, $parameters)
        {

            foreach ($id as $key => $value) {

                // Validacion profesor borrado
                if (implode($parameters) == 'deleted_at') {

                    $teacher = Teacher::where('id', '=', $value)->withTrashed()->first();

                // Validacion profesor normal
                } else {

                    $teacher = Teacher::where('id', '=', $value)->first();

                }

                if (!$teacher) {

                    return false;

                }
            }

            return true;

        });// Validator validTeacherNotification fin

        /**
         * Validacion en la que comprobamos que es una oferta
         * para luego validarla en la aplicacion por un admin
         */
        Validator::extend('validOfferNotification', function($attribute, $id, $parameters)
        {

            foreach ($id as $key => $value) {

                // Validacion oferta borrado
                if (implode($parameters) == 'deleted_at') {

                    $offer = JobOffer::where('id', '=', $value)->withTrashed()->first();

                // Validacion oferta normal
                } else {

                    $offer = JobOffer::where('id', '=', $value)->first();

                }

                if (!$offer) {

                    return false;

                }
            }

            return true;

        });// Validator validOfferNotification fin

        /**
         * Validacion en la que comprobamos que es una empresa
         */
        Validator::extend('validEnterpriseNotification', function($attribute, $id, $parameters)
        {

            foreach ($id as $key => $value) {

                // Validacion oferta borrado
                if (implode($parameters) == 'deleted_at') {

                    $Enterprise = Enterprise::where('id', '=', $value)->withTrashed()->first();

                // Validacion oferta normal
                } else {

                    $Enterprise = Enterprise::where('id', '=', $value)->first();

                }

                if (!$Enterprise) {

                    return false;

                }
            }

            return true;

        });// Validator validEnterpriseNotification fin

        /**
         * Validacion en la que comprobamos que es el comentario del usuario
         */
        Validator::extend('validCommentUser', function($attribute, $id, $parameters)
        {
            $comment = Teacher::join('comments', 'comments.teacher_id', '=', 'teachers.id')
                                ->where('comments.id', '=', $id)
                                ->where('teachers.user_id', '=', \Auth::user()->id)
                                ->first();

            if (!$comment){
                return false;
            }

            return true;

        });

        /**
         * Validacion en la que comprobamos que es el comentario del usuario
         */
        Validator::extend('validOfferUser', function($attribute, $id, $parameters)
        {

            if (implode($parameters) == 'estudiante') {
                $profFamily = $this->profFamilyStudent();
            } else {
                $profFamily = $this->profFamilyTeacher();
            }

            $offer = JobOffer::select('jobOffers.id')
                                ->join('profFamilies', 'profFamilies.id', '=', 'jobOffers.profFamilie_id')
                                ->where('jobOffers.id', '=', $id)
                                ->whereIn('profFamilies.name', $profFamily)
                                ->first();

            if (!$offer){
                return false;
            }

            return true;

        });

        /**
         * Validacion en la que comprobamos que es el comentario del usuario
         */
        Validator::extend('validOfferEnterprise', function($attribute, $id, $parameters)
        {
            if (\Auth::user()->rol == 'empresa') {

            $offer = JobOffer::select('jobOffers.id')
                                ->join('workCenters', 'workCenters.id', '=', 'jobOffers.workCenter_id')
                                ->join('enterprises', 'enterprises.id', '=', 'workCenters.enterprise_id')
                                ->where('jobOffers.id', '=', $id)
                                ->where('enterprises.user_id', '=', \Auth::user()->id)
                                ->first();

            } else if (\Auth::user()->rol == 'administrador') {

                $offer = JobOffer::select('jobOffers.id')
                                    ->where('jobOffers.id', '=', $id)
                                    ->first();
            }

            if (!$offer){
                return false;
            }

            return true;

        });

        Validator::extend('validStudentProfFamilies', function($attribute, $id, $parameters)
        {
            foreach ($id as $key => $value) {
                $profFamilies = $this->existsProfFamily($value);

                if (!$profFamilies) {
                    return false;
                }
            }
            return true;
        });

        Validator::extend('validStudentCycles', function($attribute, $id, $parameters)
        {
            foreach ($id as $key => $value) {
                $cycles = $this->existsCycle($value);

                if (!$cycles) {
                    return false;
                }
            }
            return true;
        });

        //método de validación personalizada que valida los centros de trabajo
        Validator::extend('workCenterValid', function($attribute, $value, $parameters, $request){

            // Obtenemos toda la informacion mandada en el formulario
            $field = $request->getData();
            // Devolvemos lo que nos devuelve la consulta de la base de datos directamente a la vista
            return $this->validWorkCenter(\Auth::user()->id, $field['workcenter']);
        });

        // método de validación personalizada que valida los responsables de trabajo
        // pre r
        Validator::extend('enterpriseResponsable', function($attribute, $value, $parameters, $request) {
            // Obtenemos toda la informacion mandada en el formulario
            $field = $request->getData();
            return $this->validateEnterpriseResponsable(\Auth::user()->id, $field['workcenter'],$field['enterpriseResponsable'] );

        });



    }// boot()


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
