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
        foreach (User::all() as $user) {
            foreach (UserResourceCategory::all() as $userResourceCategory) {
                $this->addResources($user, $userResourceCategory);
            }
        }
    }

    private function addResources($user, $userResourceCategory)
    {
        // randomly add 3 to 8 resources
        $resources = Resource::inRandomOrder()
            ->limit(rand(3,8))
            ->pluck('id');
        foreach ($resources as $resourceId) {
            UserResource::create([
                'user_id' => $user->id,
                'category_id' => $userResourceCategory->id,
                'resource_id' => $resourceId,
            ]);
        }

        // should work? but doesn't
        // $resources = Resource::inRandomOrder()
        //     ->limit(rand(3,8))
        //     ->pluck('id')
        //     ->map(function ($id) use ($userResourceCategory) {
        //         return [ $id => ['category_id' => $userResourceCategory->id] ];
        //     });
        // $user->resources()->sync($resources);
    }

}
