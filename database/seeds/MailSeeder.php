<?php

use App\Mail;
use Illuminate\Database\Seeder;

class MailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $view = app()->get('view.finder')->find('mail.welcome');

        Mail::create([
            'title' => 'Welcome',
            'view' => 'mail.welcome',
            'body' => file_get_contents($view),
            'subject' => 'Welcome',
        ]);
    }
}
