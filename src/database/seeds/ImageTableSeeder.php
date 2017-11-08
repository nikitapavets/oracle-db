<?php

use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\Notebook;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Notebook::all()->each(function(Notebook $notebook) {
            $notebook->images()->saveMany(factory(Image::class, 5)->make());
        });
    }
}
