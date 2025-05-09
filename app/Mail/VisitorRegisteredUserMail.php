<?php

namespace App\Mail;

use App\Models\Visitor;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class VisitorRegisteredUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $visitor;
    public $qrCode;

    public function __construct(Visitor $visitor, string $qrCode)
    {
        $this->visitor = $visitor;
        $this->qrCode = $qrCode;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Detail Pendaftaran',

        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.visitor.one-time',
            with: [
                'visitor' => $this->visitor,
                'qrCode' => $this->qrCode,
            ]
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