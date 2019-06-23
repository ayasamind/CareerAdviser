<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewMeetingMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($adviser, $user)
    {
        $this->adviser = $adviser;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
          ->subject('【キャリアアドバイザー.com】面談の申し込みがありました')
          ->view('emails.user.newMeeting')
          ->with([
              'adviser' => $this->adviser,
              'user' => $this->user
          ]);
    }
}
