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
        // $this->call(CircleSeeder::class);
        $this->call(BigBuildingCircleSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(UserSeeder::class);

        $this->call(ResourceSeeder::class);
        $this->call(UserResourceCategorySeeder::class);
        $this->call(UserResourceSeeder::class);

        $this->call(SubjectSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(CommentSeeder::class);

        $this->call(MailSeeder::class);
    }

}
