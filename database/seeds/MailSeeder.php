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
        if (!env('SELECT_MAILS') || env('CREATE_WELCOME_MAIL')) {
            $viewName = 'mail.welcome';
            $view = app('view.finder')->find($viewName);
            Mail::create([
                'title' => 'Welcome',
                'view' => $viewName,
                'body' => file_get_contents($view),
                'subject' => 'Welcome',
            ]);
        }

        if (!env('SELECT_MAILS') || env('CREATE_NEW_COMMENT_MAIL')) {
            $viewName = 'mail.new_comment';
            $view = app('view.finder')->find($viewName);
            Mail::create([
                'title' => 'New Comment',
                'view' => $viewName,
                'body' => file_get_contents($view),
                'subject' => 'New Comment',
            ]);
        }
    }
}
