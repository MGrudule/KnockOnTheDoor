<?php

use App\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = factory(Comment::class);
        for ($i=0; $i<50; $i++) {
            $factory->create();
        }
    }
}
