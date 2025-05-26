<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarPoli extends Model
{
    protected $table = 'daftar_poli';

    protected $fillable = [
        'user_id',
        'dokter_id',
        'poli_id',
        'hari',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'status',
        'no_antrian',
    ];
}
