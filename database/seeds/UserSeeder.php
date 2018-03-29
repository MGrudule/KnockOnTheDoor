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
        factory(User::class)->create([
            'email' => 't@e.st'
        ]);

        factory(User::class)->create([
            'email' => 'ad@m.in',
            'is_administrator' => true,
        ]);

        factory(User::class, 3)->create();

        foreach (User::all() as $user) {
            // set circle
            $user->circle_id = Circle::inRandomOrder()->first()->id;

            // add 3 to 5 categories
            $categories = Category::inRandomOrder()->
                select('id')->
                limit(rand(3,5))->
                get()->all();
            $user->categories()->sync(array_column($categories, 'id'));
        }
    }

}
