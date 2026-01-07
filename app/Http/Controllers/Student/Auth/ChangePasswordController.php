<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function edit()
    {
        return view('student.partials.profile.password');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password'      => ['required'],
            'password'              => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        /**
         * @var User $user
         */
        $user = Auth::guard('web')->user();

        if (! Hash::check($request->current_password, $user->authentication->password)) {
            return back()->withErrors(['current_password' => 'La contraseña actual no coincide.']);
        }

        // Usamos tu tabla authentications
        $user->authentication->update([
            'password'           => Hash::make($request->password),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Tu contraseña ha sido cambiada correctamente.');
    }
}
