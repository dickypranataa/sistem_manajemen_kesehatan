<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarPoli;
use Illuminate\Support\Facades\Auth;

class JadwalPeriksaController extends Controller
{
    public function index()
    {
        $jadwals = DaftarPoli::where('dokter_id', Auth::id())->orderBy('hari')->get();
        return view('dokter.jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        return view('dokter.jadwal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'status' => 'required|in:aktif,tutup',
        ]);

        $user = Auth::user();

        DaftarPoli::create([
            'dokter_id' => $user->id,
            'poli_id' => $user->id_poli, // ambil otomatis dari user
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => $request->status,
        ]);

        return redirect()->route('dokter.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwal = DaftarPoli::findOrFail($id);

        if ($jadwal->dokter_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit jadwal ini.');
        }

        return view('dokter.jadwal.edit', compact('jadwal'));
    }


    public function update(Request $request, $id)
    {
        // Validasi hanya kolom status
        $request->validate([
            'status' => 'required|in:aktif,tutup',
        ]);

        // Ambil data jadwal yang ingin diubah
        $jadwal = DaftarPoli::findOrFail($id);

        // Cek apakah jadwal milik dokter yang sedang login
        if ($jadwal->dokter_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk mengubah jadwal ini.');
        }

        // Jika status yang dikirim adalah "aktif"
        if ($request->status === 'aktif') {
            // Tutup semua jadwal lain milik dokter yang sama
            DaftarPoli::where('dokter_id', Auth::id())
                ->where('id', '!=', $jadwal->id)
                ->update(['status' => 'tutup']);
        }

        // Update status pada jadwal ini
        $jadwal->update([
            'status' => $request->status,
        ]);

        return redirect()->route('dokter.jadwal.index')->with('success', 'Status jadwal berhasil diperbarui.');
    }
}
