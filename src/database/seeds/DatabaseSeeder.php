<?php

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
        $this->call(CountryTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(ProviderTableSeeder::class);
        $this->call(ImageTableSeeder::class);
        $this->call(BasketTableSeeder::class);
    }
}
