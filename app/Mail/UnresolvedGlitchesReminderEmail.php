<?php

namespace App\Mail;

use App\Models\Glitch;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UnresolvedGlitchesReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $glitches, $recipients;

    public function __construct($glitches, $recipients)
    {
        $this->glitches = $glitches;
        $this->recipients = $recipients;
    }

    public function build()
    {
        return $this->subject('Reminder: Unresolved Glitches')
            ->view('emails.unresolved_glitches')
            ->with('glitches', $this->glitches);
    }



    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
