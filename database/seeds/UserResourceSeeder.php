<?php

use App\Resource;
use App\User;
use App\UserResource;
use App\UserResourceCategory;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UserResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $min = env('SEED_AMOUNT_USER_RESOURCE_MIN') ?: 3;
        $max = env('SEED_AMOUNT_USER_RESOURCE_MAX') ?: 8;
        echo $min  . " to " . $max . " resources per user\n";

        foreach (User::all() as $user) {
            foreach (UserResourceCategory::all() as $userResourceCategory) {
                $this->addResources($faker, $user, $userResourceCategory, $min, $max);
            }
        }
    }

    private function addResources($faker, $user, $userResourceCategory, $min, $max)
    {
        $n = -$faker->biasedNumberBetween($min, $max) + $min + $max;

        $resources = Resource::inRandomOrder()
            ->limit($n)
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
        //     ->limit($n)
        //     ->pluck('id')
        //     ->map(function ($id) use ($userResourceCategory) {
        //         return [ $id => ['category_id' => $userResourceCategory->id] ];
        //     });
        // $user->resources()->sync($resources);
    }

}
