<?php

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\City;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Customer::class, 250)->make()->each(function(Customer $customer) {
            $customer->city()->associate(City::inRandomOrder()->first());
            $customer->save();
        });
    }
}
