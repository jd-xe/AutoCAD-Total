<?php

namespace App\Mail;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UploadPaymentInstructions extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $payment;
    public string $contactPhone;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, Payment $payment, $contactPhone = '913318947')
    {
        $this->user = $user;
        $this->payment = $payment;
        $this->contactPhone = $contactPhone;
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Sube tu comprobante de pago - AMISAM',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.upload_payment',
            with: [
                'user' => $this->user,
                'paymentLink' => route('payment.upload.form', ['token' => $this->payment->upload_token]),
                'payment' => $this->payment,
                'contactPhone' => $this->contactPhone,
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
