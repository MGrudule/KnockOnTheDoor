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
        $n = env('SEED_AMOUNT_CIRCLE') ?: 55;
        echo $n . " circles\n";
        factory(Circle::class, $n)->create();
    }

}
