<?php

namespace App\Services;

use App\Models\Authentication;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthService
{
    private MailerService $mailerService;

    /**
     * Constructor del servicio
     */
    public function __construct()
    {
        $this->mailerService = new MailerService();
    }
}
