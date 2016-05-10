<?php

use App\Joc;
use App\User;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class JocsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $cuantos= User::all()->count();


// Creamos un bucle para cubrir 5 Jocs:
        for ($i=0; $i<4; $i++) {
            // Cuando llamamos al método create del Modelo Joc
            // se está creando una nueva fila en la tabla.
            Joc::create(
                [
                    'nom' => $faker->word(),
                    'imatge' => $faker->url(),
                    'URL' => $faker->url(),
                    'categoria' => $faker->word(),
                    'user_id'=>$faker->numberBetween(1,$cuantos)

                ]
            );
        }
    }
}
