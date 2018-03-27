<?php

use App\UserResourceCategory;
use Illuminate\Database\Seeder;

class UserResourceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserResourceCategory::create(['title' => "I have"]);
        UserResourceCategory::create(['title' => "I can help with"]);
        UserResourceCategory::create(['title' => "I'm interested in"]);
    }
}
