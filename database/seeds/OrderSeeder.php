<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$faker = Faker::create();

        foreach(range(1,10000) as $index){
            \App\Models\Order::create([
                'userId'    => rand(1, 1000),   // because user seeder creating 1000 users
                'retailerId'=> rand(1, 100),    // because retailer seeder creating 100 retailers
                'status'    => rand(1, 5),      // accepted, rejected, cancelled, pending, shipped ?
                'total'     => rand(5, 500)     // £_£
            ]);
        }
    }
}
