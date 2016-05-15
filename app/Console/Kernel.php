<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Llamada diaria al procedimiento de borrado de ofertas sin actualizar
        // mas de 4 meses
        $schedule->call(function () {
            \DB::select("call fechaExpiracion(" . date('Ymd') . ")");
        })->daily();

        // Llamada diaria al precedimiento de borrado de estudiantes sin actualizar
        // mas de 5 años
        $schedule->call(function () {
            \DB::select("call updateAlumno(" . date('Ymd') . ")");
        })->daily();

        // Llamada diaria al procedimiento de borrado de estudiantes sin validar
        // por un profesor mas de 3 meses
        $schedule->call(function () {
            \DB::select("call updateAlumno(" . date('Ymd') . ")");
        })->daily();
    }
}
