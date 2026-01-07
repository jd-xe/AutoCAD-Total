<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NewPasswordController extends Controller
{
    public function showCreatePasswordForm(Request $request)
    {
        $email = $request->query('email');
        $token = $request->query('token');

        $record = DB::table('password_reset_tokens')->where('email', $email)->first();

        if (
            !$record ||
            !Hash::check($token, $record->token)
        ) {
            return redirect()->route('home')->withErrors([
                'link' => 'El enlace de restablecimiento de contraseña no es válido o ha expirado.',
            ]);
        }

        return view('auth.password.create-password', [
            'token' => $token,
            'email' => $email,
        ]);
    }

    public function storeNewPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $record = DB::table('password_reset_tokens')->where('email', $request->email)->first();

        if (!$record || !Hash::check($request->token, $record->token)) {
            return back()->withErrors(['email' => 'El enlace de restablecimiento de contraseña no es válido o ha expirado.']);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        $authentication = $user->authentication;

        $authentication->update([
            'password' => $request->password,
        ]);

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();
        return redirect()->route('home')->with('success', 'Tu contraseña ha sido creada. Ahora puedes iniciar sesión.');
    }
}
