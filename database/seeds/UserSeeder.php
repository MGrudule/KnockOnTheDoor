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
        if (env('SEED_TEST_USERS')) {
            echo "Test users\n";
            factory(User::class)->create([
                'email' => 't@e.st'
            ]);
            factory(User::class)->create([
                'email' => 't2@e.st'
            ]);
            factory(User::class)->create([
                'email' => 't3@e.st'
            ]);
            factory(User::class)->create([
                'email' => 'ad@m.in',
                'is_administrator' => true,
            ]);
        }

        $n = env('SEED_AMOUNT_USERS') ?: 50;
        echo $n . " users\n";
        factory(User::class, $n+0)->create();

        foreach (User::all() as $user) {
            // set circle
            $user->circle_id = Circle::inRandomOrder()->first()->id;

            // add 1 to 3 categories
            $categories = Category::inRandomOrder()->
                select('id')->
                limit(rand(1,3))->
                get()->all();
            $user->categories()->sync(array_column($categories, 'id'));
        }
    }

}
