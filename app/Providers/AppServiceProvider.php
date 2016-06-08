<?php

namespace App\Providers;

use Validator;
use App\Student;
use App\Teacher;
use App\JobOffer;
use App\Enterprise;
use App\Http\Traits\Search;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    use Search;

    private $year = [];


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
                # code...
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
            $profFamilyTeacher = $this->profFamilyTeacher();

            $offer = JobOffer::select('jobOffers.id')
                                ->join('profFamilies', 'profFamilies.id', '=', 'jobOffers.profFamilie_id')
                                ->where('jobOffers.id', '=', $id)
                                ->whereIn('profFamilies.name', $profFamilyTeacher)
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

    }

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
