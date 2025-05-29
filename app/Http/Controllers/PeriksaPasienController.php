<?php

namespace App\Http\Controllers;

use App\Models\PeriksaPasien;
use App\Models\DaftarPoli;
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
        $poliTerpilih = $request->query('poli_id');

        // Ambil jadwal aktif sesuai poli (jika poli_id dikirim)
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
            'daftar_poli_id' => 'required|exists:daftar_poli,id',
            'keluhan' => 'nullable|string',
        ]);

        $user = Auth::user();

        // Hitung no antrian untuk poli yang dipilih
        $lastAntrian = PeriksaPasien::where('daftar_poli_id', $request->daftar_poli_id)->count();

        // Tidak perlu update `no_antrian` di tabel DaftarPoli (biasanya disimpan di PeriksaPasien)
        // Buat data periksa
        PeriksaPasien::create([
            'pasien_id' => $user->id,
            'daftar_poli_id' => $request->daftar_poli_id,
            'keluhan' => $request->keluhan,
            'status' => 'Belum diperiksa',
            // Biasanya `no_antrian` kalau ada, disimpan di tabel ini, bukan di daftar_poli
        ]);

        return redirect()->route('pasien.periksa.index')->with('success', 'Pendaftaran periksa berhasil!');
    }

    public function index()
    {
        $user = Auth::user();
        $periksas = PeriksaPasien::with(['daftarPoli.poli', 'daftarPoli.dokter'])
            ->where('pasien_id', $user->id) // hanya data pasien login
            ->get();

        return view('pasien.periksa.index', compact('periksas'));
    }
}
