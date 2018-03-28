<?php

use App\Category;
use App\Circle;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create();
        $user->email = 't@e.st';
        $user->save();

        $user = factory(User::class)->create();
        $user->email = 'ad@m.in';
        $user->is_administrator = true;
        $user->save();

        for ($i=0; $i<3; $i++) {
            factory(User::class)->create();
        }

        foreach (User::all() as $user) {
            // set circle
            $user->circle_id = Circle::inRandomOrder()->first()->id;

            // add 3 to 5 categories
            $categories = Category::inRandomOrder()->
                select('id')->
                take(rand(3,5))->
                get()->all();
            $user->categories()->sync(array_column($categories, 'id'));
        }
    }

}
