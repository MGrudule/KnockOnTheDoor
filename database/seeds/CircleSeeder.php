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
        $amount = env('SEED_AMOUNT_CIRCLE') ?: 55;
        echo $amount . " circles\n";
        factory(Circle::class, env('SEED_AMOUNT_CIRCLE') ?: 55)->create();
    }

}
