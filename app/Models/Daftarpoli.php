<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPoli extends Model
{
    use HasFactory;

    // Nama table jika tidak mengikuti konvensi Laravel
    protected $table = 'poli';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'nama_poli',
        'keterangan',
    ];

    /**
     * Relasi ke User (dokter) yang terhubung ke poli ini.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'id_poli');
    }
}
