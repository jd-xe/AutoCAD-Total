<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PasswordResetService
{
    private MailerService $mailerService;
    /**
     * Constructor del servicio
     */
    public function __construct(MailerService $mailerService)
    {
        $this->mailerService = $mailerService;
    }

    /**
     * Ejemplo de método del servicio
     */
    public function sendPasswordResetLink(User $user)
    {
        Log::info("Generando token de restablecimiento de contraseña para el usuario: {$user->email}");
        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            [
                'token' => Hash::make($token),
                'created_at' => Carbon::now(),
            ]
        );

        $resetUrl = url(route('password.reset.form', [
            'token' => $token,
            'email' => $user->email,
        ], false));

        Log::info("Enviando correo con enlace de restablecimiento a {$user->email} - URL: {$resetUrl}");

        $this->mailerService->sendEnrollmentApprovedMail($user, $resetUrl);
    }
}
