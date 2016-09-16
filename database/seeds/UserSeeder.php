<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 1000) as $index){
            \App\Models\User::create([
                'firstName' => $faker->firstName,
                'lastName'  => $faker->lastName,
                'email'     => $faker->email,
                'password'  => $faker->password(),
                'roleId'   => $index < 3 ? 1 : 2,
            ]);
        }
    }
}
