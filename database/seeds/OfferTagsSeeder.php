<?php

use Illuminate\Database\Seeder;
// Incluimos la librería faker
use Faker\Factory as Faker;

class OfferTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Tomamos los identificadores de los tags correspondientes a los dos tipos de ofertas
    	$prog = [203, 202, 201, 212, 207, 213, 214, 215,
    	 216, 247, 248, 249, 250, 251, 252, 253,
    	 254, 255, 256, 257, 258, 259, 260, 261, 262, 204, 205, 206, 219, 217, 218];
    	$red = [1, 38, 14, 76, 75, 77, 78, 79, 80, 2,
    	 3, 4, 5, 6, 7, 8, 9, 10, 11, 12,
    	 13, 14, 118, 121, 119, 120, 122, 123, 124, 125];

    	// Creamos una instancia de Faker
        $faker = Faker::create('es_ES');

        // Recorreremos las 15 ofertas
		for($j = 1; $j < 16; $j++){
			// Estos ids son de las ofertas de redes, el resto son de programacion
			if($j == 2 || $j == 5 || $j == 6 || $j == 7){
				$elements = $red;
			} else {
				$elements = $prog;
			}

			// Declaramos un array para no repetir los tags e insertamos el primero
			$inserted = [];
			$inserted[0] = $faker->randomElement($elements);
			\DB::table('offerTags')->insert([
				'jobOffer_id' => $j,
				'tag_id' => $inserted[0],
				'created_at' => date('YmdHms')
			]);

			// El resto de tags iran con un bucle
	        for($i = 1; $i < 12; $i++){
	        	$option = $faker->randomElement($elements);
				foreach($inserted as $key => $idTag){ // Recorro los ids ya usados
				    if($idTag === $option){ // Si coincide con el generado repito el proceso
				    	$found = true;
				    	$i--;
	                    break;
				    } else {
				        $found = false;
				    }
				}
			    if($found === false){ // Si no coincide lo inserto
			    	\DB::table('offerTags')->insert([
						'jobOffer_id' => $j,
						'tag_id' => $option,
						'created_at' => date('YmdHms')
					]);

					// Almaceno el nuevo id insertado.
                    $inserted[$i] = $option;
                    unset($option);
                }
	        }
	        // Reinicio la variable para volver a usarla.
	        unset($inserted);
	    }
    }
}
