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
            try {
                factory(ProfileResource::class)->create();
            } catch (PDOException $e) {
                // ignore unique key contraint exceptions
                if ($e->errorInfo[1] != 1062) {
                    throw $e;
                }
            }
        }
    }
}
