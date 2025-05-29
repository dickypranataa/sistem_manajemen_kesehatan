<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PeriksaPasien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class RiwayatPasienController extends Controller
{
    public function index()
    {
        // Hanya pasien, bukan dokter
        $pasienList = User::where('role', 'pasien')->get();

        return view('dokter.riwayat.index', compact('pasienList'));
    }

    public function show($id)
    {
        $pasien = User::findOrFail($id);

        // Hanya ambil data untuk dokter yang login
        $dokterId = auth()->user()->id;

        $riwayatList = PeriksaPasien::where('pasien_id', $id)
            ->whereHas('daftarPoli', function ($query) use ($dokterId) {
                $query->where('dokter_id', $dokterId);
            })
            ->with(['daftarPoli.poli', 'pasien', 'daftarPoli.dokter', 'obat'])
            ->get();

        return view('dokter.riwayat.show', compact('pasien', 'riwayatList'));
    }
}
