<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function actionregister(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'username' => 'required|regex:/^[a-zA-Z0-9_]+$/|unique:users',
            'password' => 'required|min:6',
        ], [
            'username.required' => 'Kolom username tidak boleh kosong.',
            'username.regex' => 'Username hanya boleh terdiri dari huruf dan angka.',
            'username.unique' => 'Username sudah digunakan. Mohon pilih username lain.',
            'password.required' => 'Kolom password tidak boleh kosong.',
            'password.min' => 'Kolom password minimun 6 huruf.',
            'email.email' => 'Format email tidak valid.',
            'email.required' => 'Kolom email tidak boleh kosong.',
        ]);

        // Cek validasi
        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator) // Mengembalikan error ke view
                ->withInput(); // Menyimpan input sebelumnya pada session
        } else {
            $user = User::create([
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'active' => 1
            ]);

            Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
            return redirect('register');
        }
    }
}
