<?php
namespace Veneridze\LaravelUserActivation\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;

class DeactivatedMail extends Mailable {
    use Queueable, SerializesModels;
 
    /**
     * Create a new message instance.
     */
    public function __construct(
        public User $user
    ) {}
 
    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        
    }
}