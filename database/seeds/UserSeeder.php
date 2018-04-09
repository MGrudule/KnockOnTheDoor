<?php

use App\Category;
use App\Circle;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    private $storage = 'users';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = $this->images;
        if (env('SEED_TEST_USERS')) {
            echo "Test users\n";
            factory(User::class)->create([
                'email' => 't@e.st',
                'image' => $this->storage . '/' . array_pop($images),
            ]);
            factory(User::class)->create([
                'email' => 't2@e.st',
                'image' => $this->storage . '/' . array_pop($images),
            ]);
            factory(User::class)->create([
                'email' => 't3@e.st',
                'image' => $this->storage . '/' . array_pop($images),
            ]);
            factory(User::class)->create([
                'email' => 'ad@m.in',
                'is_administrator' => true,
                'image' => $this->storage . '/' . array_pop($images),
            ]);
        }

        $n = env('SEED_AMOUNT_USERS') ?: 50;
        echo $n . " users\n";

        for ($i=0; $i<$n; $i++) {
            $user = factory(User::class)->create();
            if (!sizeof($images)) {
                $images = $this->images;
            }

            // set circle
            $user->update([
                'circle_id' => Circle::inRandomOrder()->first()->id,
                'image' => $this->storage . '/' . array_pop($images),
            ]);

            // add 1 to 3 categories
            $categories = Category::inRandomOrder()->
                select('id')->
                limit(rand(1,3))->
                get()->all();
            $user->categories()->sync(array_column($categories, 'id'));
        }
    }

    private $images = [
        'Karen.jpg',
        'Frank.jpg',
        'Annamarie.jpg',
        'Dennis.jpg',
        'Hannah.jpg',
        'Sander.jpg',
        'Annamarie_02.jpg',
        'Tim.jpg',
    ];
}
