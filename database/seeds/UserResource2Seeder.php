<?php

use App\Resource;
use App\User;
use App\UserResource2;
use Illuminate\Database\Seeder;

class UserResource2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // add 3 to 10 resources for all users
        foreach (User::all() as $user) {
            $this->addResources($user);
        }
    }

    private function addResources($user)
    {
        $resources = Resource::inRandomOrder()->get();
        for ($i=0; $i<rand(3,10); $i++) {
            $resource = $resources->pop();
            UserResource2::create([
                'user_id' => $user->id,
                'resource_id' => $resource->id,
            ]);
        }
    }

}