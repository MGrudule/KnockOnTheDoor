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
        $this->call(UserSeeder::class);
        $this->call(CircleSeeder::class);
        $this->call(UserCircleSeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(ResourceSeeder::class);
        $this->call(ProfileResourceSeeder::class);
    }
}
