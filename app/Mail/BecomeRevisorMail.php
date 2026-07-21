<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User; // Importiamo il modello User

class BecomeRevisorMail extends Mailable
{
    use Queueable, SerializesModels;

    // Definiamo la proprietà dell'utente, sarà accessibile direttamente nella vista dell'email
    public User $user;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user) // Riceve l'utente che fa la richiesta
    {
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuova richiesta di collaborazione - Presto.it', 
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.email', 
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
