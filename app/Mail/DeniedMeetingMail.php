<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeniedMeetingMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($meetingRequest)
    {
        $this->meetingRequest = $meetingRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
          ->subject('【キャリアアドバイザー.com】面談が承認されませんでした')
          ->view('emails.adviser.deniedMeeting')
          ->with([
              'meetingRequest' => $this->meetingRequest,
          ]);
    }
}
