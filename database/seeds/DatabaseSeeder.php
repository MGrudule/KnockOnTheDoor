<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CircleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UserCircleSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(UserCategorySeeder::class);

        $this->call(ResourceSeeder::class);
        $this->call(UserResourceCategorySeeder::class);
        // $this->call(UserResourceSeeder::class);
        $this->call(UserResource1Seeder::class);
        $this->call(UserResource2Seeder::class);
        $this->call(UserResource3Seeder::class);

        // $this->call(ProfileSeeder::class);
        // $this->call(ProfileResourceQualifierSeeder::class);
        // $this->call(ProfileResourceSeeder::class);
    }
}
