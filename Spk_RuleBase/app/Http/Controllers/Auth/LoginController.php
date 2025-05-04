<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        // Hanya tamu yang bisa mengakses halaman login, yang sudah login tidak.
        $this->middleware('guest')->except('logout');
    }

    /**
     * Override login method to add validation and custom error messages.
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Username harus diisi.',
            'password.required' => 'Password harus diisi.',
        ]);

        // Jika validasi berhasil, lakukan login
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // Jika login gagal, tampilkan pesan error
        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Handle failed login response with a custom message.
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => 'Username atau password salah.',
            ]);
    }
}
