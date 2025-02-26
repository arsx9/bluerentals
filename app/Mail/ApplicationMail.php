<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ApplicationMessage;

class ApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The message instance.
     *
     * @var \App\Models\ApplicationMessage
     */
    public $message;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\ApplicationMessage  $message
     * @return void
     */
    public function __construct(ApplicationMessage $message)
    {
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->subject($this->message->subject)->view('emails.application')->with(['msg' => $this->message]);

        foreach ($this->message->images as $image) {
            $email->attach($image->image);
        }

        return $email;
    }
}
