<?php

namespace App\Http\Controllers;

use App\Models\PeriksaPasien;
use App\Models\DaftarPoli;
use App\Models\User;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeriksaPasienController extends Controller
{
    public function create(Request $request)
    {
        $user = Auth::user();
        $no_rm = $user->no_rm;

        $polis = Poli::all();
        $poliTerpilih = $request->query('poli_id'); // Ambil poli yang dipilih (dari query param)

        // Filter jadwal sesuai poli_id yang terpilih (kalau ada)
        $jadwals = DaftarPoli::where('status', 'aktif')
            ->when($poliTerpilih, function ($query) use ($poliTerpilih) {
                $query->where('poli_id', $poliTerpilih);
            })
            ->get();

        return view('pasien.periksa.create', compact('polis', 'no_rm', 'jadwals', 'poliTerpilih'));
    }


    public function store(Request $request)
    {
        $request->validate([
            // 'poli_id' => 'required|exists:polis,id', // Tidak perlu validasi poli_id karena hanya daftar_poli_id yg digunakan
            'daftar_poli_id' => 'required|exists:daftar_poli,id',
            'keluhan' => 'nullable|string'
        ]);

        $user = Auth::user();

        // Cari no antrian terbaru untuk jadwal tersebut
        $daftarPoli = DaftarPoli::findOrFail($request->daftar_poli_id);
        $lastAntrian = PeriksaPasien::where('daftar_poli_id', $request->daftar_poli_id)->count();
        $daftarPoli->no_antrian = $lastAntrian + 1;
        $daftarPoli->save();

        // Simpan data periksa pasien
        PeriksaPasien::create([
            'pasien_id' => $user->id,
            'daftar_poli_id' => $request->daftar_poli_id,
            'keluhan' => $request->keluhan,
            'status' => 'Belum diperiksa',
        ]);

        return redirect()->route('pasien.periksa.index')->with('success', 'Pendaftaran periksa berhasil!');
    }

    public function index()
    {
        $periksas = PeriksaPasien::with(['pasien', 'daftarPoli'])->get();
        return view('pasien.periksa.index', compact('periksas'));
    }
}
