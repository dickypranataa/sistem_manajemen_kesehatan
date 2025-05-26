<?php

use App\Models\Antrean;
use App\Models\DaftarPoli;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AntreanController extends Controller{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'poli_id' => 'required|exists:poli,id',
            'dokter_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
        ]);

        $no_antrian = DaftarPoli::where('tanggal', $request->tanggal)
            ->where('poli_id', $request->poli_id)
            ->count() + 1;

        DaftarPoli::create([
            'user_id' => $request->user_id,
            'dokter_id' => $request->dokter_id,
            'poli_id' => $request->poli_id,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => 'menunggu',
            'no_antrian' => $no_antrian,
        ]);

        return redirect()->route('admin.daftar_poli.index')->with('success', 'Berhasil menambahkan pasien ke antrian.');
    }
}