<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $fillable = ['username', 'password', 'email', 'active'];

    // Metode untuk mendapatkan ID pengguna
    public function getAuthIdentifierName()
    {
        return 'id_user';
    }

    // Metode untuk mendapatkan kunci autentikasi pengguna
    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    // Metode untuk mendapatkan password pengguna
    public function getAuthPassword()
    {
        return $this->password;
    }

    // Metode untuk mendapatkan token "remember me" pengguna
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    // Metode untuk mengatur token "remember me" pengguna
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    // Metode untuk mendapatkan nama kolom yang menyimpan token "remember me"
    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
