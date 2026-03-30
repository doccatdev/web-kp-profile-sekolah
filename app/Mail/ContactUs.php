<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
{
    return new Envelope(
        subject: 'Pesan Kontak Baru: ' . $this->data['subject'],

        // FROM: Akun Gmail sekolah lu (biar aman dari spam)
        from: new Address('contact.smpalhusainiyyah@gmail.com', 'Notifikasi SMP Al-Husainiyyah'),

        // REPLY-TO: Email orang yang ngisi form (biar pas di-klik reply langsung ke dia)
        replyTo: [
            new Address($this->data['email'], $this->data['name']),
        ],
    );
}

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
