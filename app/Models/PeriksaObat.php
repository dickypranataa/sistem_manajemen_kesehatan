<?php
//dokter
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeriksaObat extends Model
{
    protected $table = 'periksa_obat';
    protected $fillable = ['periksa_id', 'obat_id', 'jumlah', 'harga'];

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id');
    }
}
