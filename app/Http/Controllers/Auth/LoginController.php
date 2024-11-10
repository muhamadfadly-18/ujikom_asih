<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
	public function authenticate()
	{
		$credentials = request()->only(['email','password']);

		if (Auth::attempt($credentials)) {
			return redirect()->intended('user');
		}else{
			return back()->with('error','Login gagal');
		}
	}
	public function login(Request $request)
    {
        // Validasi data yang dikirim
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Cek kredensial login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Ambil pengguna yang sedang login
            $user = Auth::user();

            // Generasi token jika login berhasil
            $token = $user->createToken('ujikom_asih')->plainTextToken;

            return response()->json([
                'message' => 'Login berhasil',
                'token' => $token,
            ]);
        }

        return response()->json(['message' => 'Email atau password salah'], 401);
    }
}
