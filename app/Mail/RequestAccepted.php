<?php

namespace App\Mail;

use App\Models\MovieRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;


class RequestAccepted extends Mailable
{
    use Queueable, SerializesModels;

    public $distressCall;

    public function __construct(MovieRequest $distressCall)
    {
        $this->distressCall = $distressCall;
    }

    public function build()
    {
        return $this->view('mails.accept');
    }

    /**
     * Get the message envelope.
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('admin@laraflix.com', 'Admin Laraflix'),
            subject: 'Request Accepted',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.accept',
        );
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
