<?php

use App\ProfileResourceQualifier;
use Illuminate\Database\Seeder;

class ProfileResourceQualifierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfileResourceQualifier::create(['title' => "I have"]);
        ProfileResourceQualifier::create(['title' => "I can help with"]);
        ProfileResourceQualifier::create(['title' => "I'm interested in"]);
    }
}
