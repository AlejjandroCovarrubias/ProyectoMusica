<?php

namespace App\Mail;

use App\Models\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewSong extends Mailable
{
    use Queueable, SerializesModels;
    public $song;
    public $owner;
    /**
     * Create a new message instance.
     */
    public function __construct(Client $cliente)
    {
        $this->song=$cliente->song()->get()->last();
        $this->owner=$cliente->username;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('info-artistas@MeloMusic.com', 'MeloMusic'),
            subject: 'Felicidades!, subiste una cancion: '.$this->owner,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown:'emails.newSong',
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
