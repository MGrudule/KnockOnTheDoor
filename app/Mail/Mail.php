<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Mail extends Mailable
{
    use Queueable, SerializesModels;

    private $viewName;
    public $title;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->getMail()) {
            return $this->markdown($this->viewName);
        }
    }

    private function getMail()
    {
        $mail = \App\Mail::where('title', $this->title)->first();
        if (! $mail) {
            return false;
        }
        $this->viewName = $mail->view;
        if ($mail->from_address && $mail->from_name) {
            $this->from($mail->from_address, $mail->from_name);
        }
        $this->subject = $mail->subject ?: $this->title;
        return true;
    }
}
