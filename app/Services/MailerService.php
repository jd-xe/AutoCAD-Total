<?php

namespace App\Services;

use App\Mail\EnrollmentApproved;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MailerService
{
    /**
     * Constructor del servicio
     */
    public function __construct()
    {
        // Constructor logic here
    }

    /**
     * Ejemplo de método del servicio
     */
    public function sendEnrollmentApprovedMail(User $user, string $resetUrl): void
    {
        Mail::to($user->email)
            ->send(new EnrollmentApproved($user, $resetUrl));
    }
}
