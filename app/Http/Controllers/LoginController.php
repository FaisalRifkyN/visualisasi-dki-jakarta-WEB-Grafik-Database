<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        } else {
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Kolom username tidak boleh kosong.',
            'password.required' => 'Kolom password tidak boleh kosong.',
        ]);

        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        $user = User::where('username', $data['username'])->first();

        if ($user && $user->active == 1 && Auth::attempt($data)) {
            return redirect()->intended('dashboard');
        } else {
            Session::flash('error', 'Username atau password salah, atau akun tidak aktif.');
            return redirect('/')->withErrors(['active' => 'Akun tidak aktif.']);
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
