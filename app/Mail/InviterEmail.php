<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InviterEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $inviter;
    // protected $invitationDetails;
    /**
     * Create a new message instance.
     */
    public function __construct($inviter)
    {
         $this->inviter = $inviter;
        // $this->invitationDetails = $invitationDetails;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Inviter Email',
        );
    }
 
 
  public function build()
    {
        
        return $this->view('emails.your_mail_view')
                    ->subject('Invitation to the Site')
                    ->with(['invitationDetails' => $this->inviter]);
    }
    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'pages.InviterEmail',
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
