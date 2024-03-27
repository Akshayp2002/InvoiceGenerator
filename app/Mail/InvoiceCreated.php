<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvoiceCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $invoiceDate;
    public $taxAmount;
    public $invoiceAmount;
    public $filePath;
    /**
     * Create a new message instance.
     */
    public function __construct($invoiceDate, $taxAmount, $invoiceAmount, $filePath)
    {
        $this->invoiceDate = $invoiceDate;
        $this->taxAmount = $taxAmount;
        $this->invoiceAmount = $invoiceAmount;
        $this->filePath = $filePath;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invoice Created',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.invoiceCreated',
        );
    }

    public function build()
    {
        $mail = $this->view('email.invoiceCreated')
        ->with([
            'invoiceDate' => $this->invoiceDate,
            'taxAmount' => $this->taxAmount,
            'invoiceAmount' => $this->invoiceAmount,
        ]);

        // Attach the file if it's not null
        if ($this->filePath !== null) {
            $mail->attach($this->filePath);
        } else {
            // Handle null attachment
            $mail->withSwiftMessage(function ($message) {
                $message->getBody()
                    ->addPart('No attachment provided.', 'text/plain');
            });
        }

        return $mail;
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
