<?php

use Illuminate\Database\Seeder;
use App\Models\Provider;
use App\Models\Notebook;
use App\Models\Brand;

class ProviderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Provider::class, 50)->create()->each(function(Provider $provider) {
            $provider->notebooks()->saveMany(factory(Notebook::class, 15)->make()->each(function(Notebook $notebook) {
                $notebook->brand()->associate(Brand::inRandomOrder()->first());
            }));
        });
    }
}
