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
            $title = 'Welcome';
            echo "Seeding mail: " . $title . "\n";
            $viewName = 'mail.welcome';
            $view = app('view.finder')->find($viewName);
            Mail::create([
                'title' => $title,
                'view' => $viewName,
                'body' => file_get_contents($view),
                'subject' => $title,
            ]);
        }

        if (!env('SELECT_MAILS') || env('CREATE_NEW_COMMENT_MAIL')) {
            $title = 'New Comment';
            echo "Seeding mail: " . $title . "\n";
            $viewName = 'mail.new_comment';
            $view = app('view.finder')->find($viewName);
            Mail::create([
                'title' => $title,
                'view' => $viewName,
                'body' => file_get_contents($view),
                'subject' => $title,
            ]);
        }
    }
}
