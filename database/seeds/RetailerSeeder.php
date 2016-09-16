<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RetailerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1,100) as $index){

            \App\Models\Retailer::create([
                'name'      => $faker->company,
                'location'  => $faker->address,
                'email'     => $faker->companyEmail,
                'secret'    => $faker->password(4,4)
            ]);

        }
    }
}
