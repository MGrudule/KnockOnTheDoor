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
            "color" => "#44b2e5",
        ]);
        Category::create([
            "name" => "Music",
            "color" => "#73c48f",
        ]);
        Category::create([
            "name" => "Business",
            "color" => "#c51883",
        ]);
        Category::create([
            "name" => "Gardening",
            "color" => "#485daa",
        ]);
        Category::create([
            "name" => "Art",
            "color" => "#ede82d",
        ]);
    }

}
