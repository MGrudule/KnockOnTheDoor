<?php

use App\Resource;
use App\User;
use App\UserResource;
use App\UserResourceCategory;
use Illuminate\Database\Seeder;

class UserResourceSeeder extends Seeder
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
            foreach (UserResourceCategory::all() as $userResourceCategory) {
                $this->addResources($user, $userResourceCategory);
            }
        }
    }

    private function addResources($user, $userResourceCategory)
    {
        $resources = Resource::inRandomOrder()->get();
        for ($i=0; $i<rand(3,10); $i++) {
            $resource = $resources->pop();
            UserResource::create([
                'user_id' => $user->id,
                'category_id' => $userResourceCategory->id,
                'resource_id' => $resource->id,
            ]);
        }
    }

}
