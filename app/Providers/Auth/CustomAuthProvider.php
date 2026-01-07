<?php

namespace App\Providers\Auth;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CustomAuthProvider implements UserProvider
{
    public function rehashPasswordIfRequired(Authenticatable $user, array $credentials, bool $force = false)
    {
        // Implement logic to rehash the password if required
        if ($force || Hash::needsRehash($user->authentication->password)) {
            $user->authentication->password = Hash::make($credentials['password']);
            $user->authentication->save();
        }
    }
    public function retrieveById($identifier)
    {
        return User::with('authentication')->find($identifier);
    }

    public function retrieveByToken($identifier, $token)
    {
        return null; // Puedes implementar esto si usas "remember me"
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        // Opcional
    }

    public function retrieveByCredentials(array $credentials)
    {
        return User::where('email', $credentials['email'])
            ->with('authentication')
            ->first();
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        $plainPassword = $credentials['password'];

        // Validar con la contraseña de la relación authentication
        return $user->authentication && Hash::check($plainPassword, $user->authentication->password);
    }
}
