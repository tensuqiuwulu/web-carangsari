<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'Login berhasil'
            ], 200);
        }

        // return json
        return response()->json([
            'message' => 'Email atau password salah'
        ], 401);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }
}
