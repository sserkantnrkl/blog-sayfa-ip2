<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 1. Giriş Sayfasını Göster
    public function showLogin()
    {
        return view('login');
    }

    // 2. Giriş İşlemini Gerçekleştir
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'login_error' => 'Bu e-posta adresine ait bir hesap bulunmamaktadır.'
            ])->withInput();
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors([
                'login_error' => 'Girdiğiniz şifre hatalı.'
            ])->withInput();
        }

        $request->session()->regenerate();
        return redirect()->intended('blog');
    }

    // 3. Çıkış Yap
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
