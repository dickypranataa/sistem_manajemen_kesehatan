<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Obat extends Model
{
    //
    use HasFactory;

    public function periksas()
    {
        return $this->belongsToMany(Periksa::class, 'detail_periksa', 'id_obat', 'id_periksa');
    }

    public function periksaPasien()
    {
        return $this->belongsToMany(PeriksaPasien::class, 'periksa_obat', 'obat_id', 'periksa_pasien_id')
            ->withPivot('jumlah', 'harga');
    }


    protected $table = 'obat';
    protected $fillable = [
        'name_obat',
        'kemasan',
        'harga',
        'created_at',
        'updated_at'
    ];
}
