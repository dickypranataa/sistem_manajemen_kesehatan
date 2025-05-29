<?php
//pasien
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeriksaPasien extends Model
{
    protected $table = 'periksa_pasien';
    protected $fillable = [
        'pasien_id',
        'daftar_poli_id',
        'keluhan',
        'tanggal_periksa',
        'total_harga',
        'status',
    ];

    public function pasien()
    {
        return $this->belongsTo(User::class, 'pasien_id');
    }

    public function daftarPoli()
    {
        return $this->belongsTo(DaftarPoli::class, 'daftar_poli_id');
    }
    public function obat()
    {
        return $this->belongsToMany(Obat::class, 'periksa_obat', 'periksa_pasien_id', 'obat_id')
            ->withPivot('jumlah', 'harga');
    }
}
