<?php

use Illuminate\Database\Seeder;


class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('states')->insert(['id' => 2, 'name' => 'Albacete', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 3, 'name' => 'Alicante', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 4, 'name' => 'Almería', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 1, 'name' => 'Araba/Álava', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 33, 'name' => 'Asturias', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 5, 'name' => 'Ávila', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 6, 'name' => 'Badajoz', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 7, 'name' => 'Balears, Illes', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 8, 'name' => 'Barcelona', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 48, 'name' => 'Bizkaia', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 9, 'name' => 'Burgos', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 10, 'name' => 'Cáceres', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 11, 'name' => 'Cádiz', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 39, 'name' => 'Cantabria', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 12, 'name' => 'Castellón', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 13, 'name' => 'Ciudad Real', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 14, 'name' => 'Córdoba', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 15, 'name' => 'A Coruña', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 16, 'name' => 'Cuenca', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 20, 'name' => 'Gipuzkoa', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 17, 'name' => 'Girona', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 18, 'name' => 'Granada', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 19, 'name' => 'Guadalajara', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 21, 'name' => 'Huelva', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 22, 'name' => 'Huesca', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 23, 'name' => 'Jaén', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 24, 'name' => 'León', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 25, 'name' => 'Lleida', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 27, 'name' => 'Lugo', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 28, 'name' => 'Madrid', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 29, 'name' => 'Málaga', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 30, 'name' => 'Murcia', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 31, 'name' => 'Navarra', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 32, 'name' => 'Ourense', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 34, 'name' => 'Palencia', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 35, 'name' => 'Las Palmas', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 36, 'name' => 'Pontevedra', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 26, 'name' => 'La Rioja', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 37, 'name' => 'Salamanca', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 38, 'name' => 'Santa Cruz de Tenerife', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 40, 'name' => 'Segovia', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 41, 'name' => 'Sevilla', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 42, 'name' => 'Soria', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 43, 'name' => 'Tarragona', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 44, 'name' => 'Teruel', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 45, 'name' => 'Toledo', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 46, 'name' => 'Valencia', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 47, 'name' => 'Valladolid', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 49, 'name' => 'Zamora', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 50, 'name' => 'Zaragoza', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 51, 'name' => 'Ceuta', 'created_at' => date('YmdHms')]);
        \DB::table('states')->insert(['id' => 52, 'name' => 'Melilla', 'created_at' => date('YmdHms')]);
    }
}
