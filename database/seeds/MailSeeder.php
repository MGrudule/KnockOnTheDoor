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
        $viewName = 'mail.welcome';
        $view = app('view.finder')->find($viewName);

        Mail::create([
            'title' => 'Welcome',
            'view' => $viewName,
            'body' => file_get_contents($view),
            'subject' => 'Welcome',
        ]);
    }
}
