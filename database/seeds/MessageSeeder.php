<?php

use App\Category;
use App\Message;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = factory(Message::class);
        foreach (User::all() as $user) {
            $message = $factory->create([
                "user_id" => $user->id,
            ]);

            // add 1 to 3 random categories
            $categories = Category::inRandomOrder()->
                select('id')->
                take(rand(1,3))->
                get()->all();
            $message->categories()->sync(array_column($categories, 'id'));

            // add 1 to 3 random tags
            $tags = Tag::inRandomOrder()->
                select('id')->
                take(rand(1,3))->
                get()->all();
            $message->tags()->sync(array_column($tags, 'id'));
        }
    }

}
