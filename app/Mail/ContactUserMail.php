<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactUserMail extends Mailable
{
  use Queueable, SerializesModels;

  public function __construct(public array $data) {}

  public function envelope(): Envelope
  {
    return new Envelope(
      subject: 'Ihre Anfrage bei SHIFT Altstetten',
      replyTo: [
        new Address('shift@cavegn-immobilien.ch', 'Cavegn Immobilien'),
      ],
    );
  }

  public function content(): Content
  {
    return new Content(
      view: 'emails.contact-user',
      with: ['data' => $this->data],
    );
  }
}
