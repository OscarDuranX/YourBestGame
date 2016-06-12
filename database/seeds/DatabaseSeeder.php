<?php

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

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

        //$faker = Faker\Factory::create();

        //$this->SeedUserProva($faker);
        $this->call(UsersTableSeeder::class);
       // $this->call(JocsTableSeeder::class);
        //$this->call(ComentsJocsTableSeeder::class);
    }

    private function SeedUserProva($faker)
    {
        foreach (range(0,10) as $number) {
//              $user= new User();
//            $task= new Task();
//            $task->name = $faker->sentence;
//            $task->done =$faker->boolean;
//            $task->priority= $faker->randomDigit;
//            $task->save();

        }

    }
}
