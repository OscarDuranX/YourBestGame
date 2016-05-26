<?php

use App\User;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Creamos un bucle para cubrir 5 Jocs:
        for ($i=0; $i<4; $i++) {
            // Cuando llamamos al método create del Modelo Joc
            // se está creando una nueva fila en la tabla.
            User::create(
                [
                    'name' => $faker->name,
                    'email' => $faker->safeEmail,
                    'password'=>$faker->password(),
                    'api_token'=>md5(uniqid(rand(), true)),
                ]
            );
        }
    }
}