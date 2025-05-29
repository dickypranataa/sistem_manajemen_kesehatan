<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\PeriksaPasien;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokterPeriksaController extends Controller
{
    // Menampilkan pasien yang siap diperiksa oleh dokter ini
    public function index()
    {
        // Ambil data periksa_pasien yang statusnya "Belum diperiksa" untuk dokter yang login
        $periksaList = PeriksaPasien::whereHas('daftarPoli.poli', function ($q) {
            $q->where('dokter_id', Auth::id());
        })
            ->whereIn('status', ['Belum diperiksa', 'Selesai'])
            ->with(['pasien', 'daftarPoli.poli'])
            ->get();


        return view('dokter.periksa.index', compact('periksaList'));
    }

    public function edit($id)
    {
        $periksa = PeriksaPasien::where('id', $id)
            ->with(['pasien', 'daftarPoli.poli'])
            ->firstOrFail();

        $obatList = Obat::all();

        return view('dokter.periksa.edit', compact('periksa', 'obatList'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_periksa' => 'required|date',
            'catatan' => 'nullable|string',
            'obat_id' => 'nullable|array',
            'obat_id.*' => 'exists:obat,id',
        ]);

        $periksa = PeriksaPasien::findOrFail($id);

        $biayaPeriksa = 150000;
        $totalObat = 0;

        // Hapus data obat lama jika sebelumnya sudah pernah simpan
        $periksa->obat()->detach();

        if ($request->filled('obat_id')) {
            $obats = Obat::whereIn('id', $request->obat_id)->get();

            foreach ($obats as $obat) {
                $totalObat += $obat->harga;

                // Simpan data ke tabel periksa_obat
                $periksa->obat()->attach($obat->id, [
                    'jumlah' => 1, // default 1
                    'harga' => $obat->harga,
                ]);
            }
        }

        $totalBayar = $biayaPeriksa + $totalObat;

        // Update data periksa_pasien
        $periksa->update([
            'tanggal_periksa' => $request->tanggal_periksa,
            'catatan' => $request->catatan,
            'status' => 'Selesai',
            'total_harga' => $totalBayar,
        ]);

        return redirect()->route('dokter.periksa.index')->with('success', 'Pemeriksaan berhasil disimpan! Total biaya: Rp ' . number_format($totalBayar, 0, ',', '.'));
    }
}
