<?php

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
    }

}
