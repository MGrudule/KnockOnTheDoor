<?php

use App\ProfileResource;
use Illuminate\Database\Seeder;

class ProfileResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<50; $i++) {
            factory(ProfileResource::class)->create();
        }
    }
}
