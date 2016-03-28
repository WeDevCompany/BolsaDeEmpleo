<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Model::unguard();
        $this->call(OurUsersSeeder::class);
        $this->call(VerifiedSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(CitySeeder::class);
    	Model::reguard();
    }
}
