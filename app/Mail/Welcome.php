<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $registrar;
    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $registrar)
    {
        $this->user = $user;
        $this->registrar = $registrar;
        // if (is_null($registrar)) {
        //     $registrar = User::where(['name' =>'system'])->get();
        // }
        $this->getMail();
    }

    private function getMail()
    {
        $this->body = 'mail.welcome';
        $this->from('example@example.com', config('app.web_name', 'System'));
        $this->subject = 'Welcome';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown($this->body);
    }

}
