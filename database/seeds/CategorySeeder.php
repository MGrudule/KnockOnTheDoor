<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            "name" => "Building",
            "color" => "#ffee4c",
        ]);
        Category::create([
            "name" => "Music",
            "color" => "#aebd38",
        ]);
        Category::create([
            "name" => "Business",
            "color" => "#38bd8a",
        ]);
        Category::create([
            "name" => "Gardening",
            "color" => "#38aebd",
        ]);
        Category::create([
            "name" => "Art",
            "color" => "#ffaebd",
        ]);
    }

}
