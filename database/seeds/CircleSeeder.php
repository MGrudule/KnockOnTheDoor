<?php

use App\Circle;
use Illuminate\Database\Seeder;

class CircleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<5; $i++) {
            factory(Circle::class)->create();
        }
    }

}
