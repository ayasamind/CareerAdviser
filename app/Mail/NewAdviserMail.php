<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewAdviserMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($adviser, $pass)
    {
        $this->adviser = $adviser;
        $this->pass = $pass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
          ->subject('【キャリアアドバイザー.com】アドバイザーに招待されました')
          ->view('emails.admin.newAdviser')
          ->with([
              'adviser' => $this->adviser,
              'pass' => $this->pass
          ]);
    }
}
