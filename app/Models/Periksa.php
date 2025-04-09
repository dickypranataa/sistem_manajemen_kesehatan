<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Periksa extends Model
{
    //
    use HasFactory;
    protected $table = 'periksa';
    protected $fillable = [
        'id_pasien',
        'id_dokter',
        'tgl_periksa',
        'catatan',
        'biaya_periksa'
    ];
    public $timestamps = false;
}
