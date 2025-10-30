<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login_form');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => [
                'required',
                'min:3',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/[A-Z]/', $value)) {
                        $fail('Password harus mengandung minimal satu huruf kapital.');
                    }
                }
            ],
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        // Logika login sederhana
        if ($username === $password) {
            // Simpan status login di session
            $request->session()->put('is_logged_in', true);
            $request->session()->put('username', $username);

            return view('auth.success', [
                'message' => "Selamat datang, $username! Login berhasil."
            ]);
        }

        return back()->withErrors(['login' => 'Username dan password harus sama untuk login.'])->withInput();
    }

    public function logout(Request $request)
    {
        // Hapus semua session login
        $request->session()->flush();

        // Redirect ke halaman login
        return redirect('/')->with('message', 'Berhasil logout.');
    }
}
