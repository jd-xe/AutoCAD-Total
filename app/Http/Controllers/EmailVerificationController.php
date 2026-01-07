<?php

namespace App\Http\Controllers;

use App\Mail\UploadPaymentInstructions;
use App\Models\Authentication;
use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EmailVerificationController extends Controller
{
    public function verify(Request $request)
    {
        $token = $request->query('token');

        if (!$token) {
            abort(404, 'Token inválido.');
        }

        $verification = EmailVerification::where('token', $token)->first();

        if (!$verification || $verification->used || $verification->expires_at < now()) {
            return redirect('/')->with('error', 'El enlace de verificación ha expirado o es inválido.');
        }

        DB::transaction(function () use ($verification) {
            $verification->update(['used' => true]);

            #$user = User::findOrFail($verification->user_id);
            $user = User::where('id', $verification->user_id)->firstOrFail();

            Authentication::create([
                'user_id' => $user->id,
                'password' => Hash::make($user->dni),
            ]);

            DB::table('user_roles')->insert([
                'user_id' => $user->id,
                'role_id' => 4, # rol de estudiante
            ]);

            $conceptId = (int) request()->query('concept');
            $concept = \App\Models\PaymentConcept::findOrFail($conceptId);

            $payment = \App\Models\Payment::create([
                'user_id' => $user->id,
                'concept_id' => $concept->id, // o el que corresponda
                'payment_method_id' => 1, // Yape, etc.
                'amount' => $concept->amount, // o dinámico
                'upload_token' => Str::uuid(),
            ]);

            Mail::to($user->email)->send(new UploadPaymentInstructions($user, $payment));
        });

        return redirect('/')->with('success', 'Correo verificado correctamente. Revisa tu bandeja de entrada.');
    }
}
