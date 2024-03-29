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
    public function __construct($meetingRequest, $user, $adviser)
    {
        $this->meetingRequest = $meetingRequest;
        $this->user = $user;
        $this->adviser = $adviser;
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
              'meetingRequest' => $this->meetingRequest,
              'user' => $this->user,
              'adviser' => $this->adviser
          ]);
    }
}
