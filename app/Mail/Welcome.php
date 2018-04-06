<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Welcome extends Mail
{
    use Queueable, SerializesModels;

    public $user;
    public $registrar;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $registrar)
    {
        $this->title = 'Welcome';
        $this->user = $user;
        $this->registrar = $registrar;
        // if (is_null($registrar)) {
        //     $registrar = User::where(['name' =>'system'])->get();
        // }
    }
}
