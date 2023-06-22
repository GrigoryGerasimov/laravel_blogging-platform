<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\{Address, Content, Envelope};
use Illuminate\Queue\SerializesModels;

class SendRegisteredUserPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct
    (
        protected string $name,
        protected string $email,
        protected string $password
    ) {
        //
    }

    /**
     * Get the message envelope.
     *
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('rehor.ger@gmail.com', 'Grigory Gerasimov'),
            replyTo: [
                new Address('rehor.ger@gmail.com', 'Grigory Gerasimov')
            ],
            subject: 'Your Password to Blog Platform',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return Content
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.password',
            with: [
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password
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
