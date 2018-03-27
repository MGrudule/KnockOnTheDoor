<?php

use App\Category;
use App\User;
use App\UserCategory;
use Illuminate\Database\Seeder;

class UserCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // add 3 to 5 categories for all users
        foreach (User::all() as $user) {
            $categories = Category::inRandomOrder()->get();
            for ($i=0; $i<rand(3,5); $i++) {
                $category = $categories->pop();
                UserCategory::create([
                    'user_id' => $user->id,
                    'category_id' => $category->id,
                ]);
            }
        }
    }

}
