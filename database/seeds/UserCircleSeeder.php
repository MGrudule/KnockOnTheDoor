<?php

use App\UserCircle;
use Illuminate\Database\Seeder;

class UserCircleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<25; $i++) {
            try {
                factory(UserCircle::class)->create();
            } catch (PDOException $e) {
                // ignore unique key contraint exceptions
                if ($e->errorInfo[1] != 1062) {
                    throw $e;
                }
            }
        }
    }

}
