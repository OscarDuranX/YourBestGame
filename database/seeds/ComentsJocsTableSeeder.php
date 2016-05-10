<?php

use App\Comentari;
use App\Joc;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class ComentsJocsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $cuantos= Joc::all()->count();

        // Creamos un bucle para cubrir 5 Comentaris:
        for ($i=0; $i<4; $i++)
        {
            // Cuando llamamos al método create del Modelo Comentaris
            // se está creando una nueva fila en la tabla.
            Comentari::create(
                [
                    'nomuser'=>$faker->userName(),
                    'comentari'=>$faker->text(100),
                    'joc_id'=>$faker->numberBetween(1,$cuantos)
                ]
            );
        }
    }
}
