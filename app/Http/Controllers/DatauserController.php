<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class DatauserController extends Controller
{
    function index()
    {
        $data['title'] = 'DATA USER';
        $data['DataUsers'] = Db::table('users')->get();

        return view('admin/user/user', $data);
    }

    public function tambahuser()
    {
        $data['title'] = 'TAMBAH DATA USER';
        return view('admin/user/usertambah', $data);
    }

    public function actionsimpanuser(Request $request)
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

        $data_array = array(
            'username' => trim($request->username),
            'password' => Hash::make($request->password),
            'email' => trim($request->email),
            'active' => 1
        );
        // Cek validasi
        if ($validator->fails()) {
            return redirect('usertambah')
                ->withErrors($validator) // Mengembalikan error ke view
                ->withInput(); // Menyimpan input sebelumnya pada session
        } else {
            $result = DB::table('users')->insertOrIgnore($data_array);
            Session::flash('message', 'User Berhasil Di Tambahkan');
            return redirect('user');
        }
    }

    public function edituser($id_user)
    {
        $data['title'] = 'EDIT DATA USER';
        $data['Datausers'] = DB::table('users')->where('id_user', $id_user)->get();
        return view('admin/user/useredit', $data);
    }

    public function actionupdateuser(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'username' => 'required|regex:/^[a-zA-Z0-9_]+$/',
            'active' => 'required',
        ], [
            'username.required' => 'Kolom username tidak boleh kosong.',
            'username.regex' => 'Username hanya boleh terdiri dari huruf dan angka.',
            'active.required' => 'Kolom status tidak boleh kosong.',
            'email.email' => 'Format email tidak valid.',
            'email.required' => 'Kolom email tidak boleh kosong.',
        ]);
        // Cek validasi
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Mengembalikan error ke view
                ->withInput(); // Menyimpan input sebelumnya pada session
        } else {
            $data_array = array(
                'username' => trim($request->username),
                'email' => trim($request->email),
                'active' => trim($request->active)
            );
            DB::table('users')->where('id_user', $request->id_user)->update($data_array);
            Session::flash('message', 'User Berhasil Di Update');
            return redirect('user');
        }
    }

    public function actionhapususer(Request $request)
    {
        $data_array = array(
            'username' => trim($request->username),
            'email' => trim($request->email),
            'active' => trim('0')
        );
        DB::table('users')->where('id_user', $request->id_user)->update($data_array);
        Session::flash('message', 'User Berhasil Di Hapus');
        return redirect('user');
    }
}
