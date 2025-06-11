<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Obat;
use App\Models\Periksa;
use App\Models\DaftarPoli; // atau model JadwalDokter sesuai struktur Anda

class DashboardDokterController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dokterId = $user->id;

        $jumlahObat = Obat::count();
        $periksas = Periksa::with('pasien')->where('id_dokter', $dokterId)->get();
        $jadwalCount = DaftarPoli::where('id_dokter', $dokterId)->count();
        $riwayatCount = $periksas->count(); // dianggap sebagai riwayat

        return view('dokter.dashboard', compact(
            'jumlahObat',
            'periksas',
            'jadwalCount',
            'riwayatCount'
        ));
    }
}
