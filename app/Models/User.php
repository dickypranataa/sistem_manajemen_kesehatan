<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Poli;
use App\Models\PeriksaPasien;

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
        'id_poli',
    ];


    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }



    public function daftarPoliSebagaiPasien()
    {
        return $this->hasMany(DaftarPoli::class, 'user_id');
    }

    public function daftarPoliSebagaiDokter()
    {
        return $this->hasMany(DaftarPoli::class, 'dokter_id');
    }


    protected $hidden = [
        'password',
        'remember_token',
    ];
}
