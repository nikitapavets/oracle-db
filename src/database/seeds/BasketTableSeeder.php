<?php

use Illuminate\Database\Seeder;
use App\Models\Basket;
use App\Models\Notebook;
use App\Models\Customer;

class BasketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Basket::class, 1000)->make()->each(function (Basket $basket) {
           $basket->customer()->associate(Customer::inRandomOrder()->first());
           $basket->notebook()->associate(Notebook::inRandomOrder()->first());
           $basket->save();
        });
    }
}
