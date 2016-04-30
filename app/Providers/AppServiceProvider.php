<?php

namespace App\Providers;

use Validator;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
        Validator::extend('dni', function($attribute, $dni, $parameters) {

            // Separacion de la letra y los numeros
            $letra = strtoupper(substr($dni, -1));
            $numero = substr($dni, 0, -1);

            // Generamos la letra y comprobamos que coincida
            if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numero % 23, 1) == $letra && strlen($letra) == 1 && strlen ($numero) == 8){

                return true;

            }

            return false;


        }); // Validator dni fin

        /**
        *   Validacion para las fechas de los ciclos cursados
        *   Recibe como parametro el atributo a validar, su valor y request
        *   Devuelve si es valido o no
        */
        Validator::extend('cycleYearFrom', function($attribute, $value, $parameters, $form) {

            // Variable para la fecha actual
            $date = date('Y');
            $fechaActual = (int)$date;

            // Obtenemos toda la informacion mandada en el formulario
            $field = $form->getData();

            // Recorremos todas las fechas
            for ($a = 0; $a < count($value) ; $a++) { 
                
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
            return true;

        });// Validator cycleYearFrom fin

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
