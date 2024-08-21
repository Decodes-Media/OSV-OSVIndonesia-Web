<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FormCopyMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        public string $psubject,
        public string $formname,
        public array $informations,
    ) {
        // pass
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: config('app.name').' - '.$this->psubject,
        );
    }

    public function content(): Content
    {
        return new Content(markdown: 'emails.form-copy-submitted');
    }
}
