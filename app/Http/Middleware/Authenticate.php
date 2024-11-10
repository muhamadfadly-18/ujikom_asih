<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }

        // Jika pengguna sudah terautentikasi, buat token
        if (Auth::check()) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;
            
            // Anda bisa menambahkan token ke dalam response jika perlu
            return response()->json([
                'status' => 'success',
                'message' => 'Authenticated',
                'token' => $token,
            ]);
        }
    }
}

