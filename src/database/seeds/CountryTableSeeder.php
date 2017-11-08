<?php

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\City;
use App\Models\Brand;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Country::class, 50)->create()->each(function(Country $country) {
            $country->cities()->saveMany(factory(City::class, 15)->make());
            $country->brands()->saveMany(factory(Brand::class, 15)->make());
        });
    }
}
