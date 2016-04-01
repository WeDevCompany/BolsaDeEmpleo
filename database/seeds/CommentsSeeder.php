<?php

use Illuminate\Database\Seeder;

// Incluimos la librería faker
use Faker\Factory as Faker;


class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
 		for ($i=0; $i < 10; $i++) {
 			$id = \DB::table('Comments')->insert(
            ['title'=> $faker->realText($maxNbChars = 50, $indexSize = 1),
            'body'=> $faker->realText($maxNbChars = 200, $indexSize = 2),
 			'teacher_id' => $faker->numberBetween($min = 7, $max = 12),
 			'jobOffer_id' => $faker->numberBetween($min = 1, $max = 15)
			]
            );
        }
    }
}
