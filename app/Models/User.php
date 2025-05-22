<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'alamat',
        'no_ktp',
        'no_hp',
        'no_rm',
        // Jika ada field lain yang mau diisi mass assignment, tambahkan juga di sini
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
