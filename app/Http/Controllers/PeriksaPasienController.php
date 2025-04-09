<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // ✅ Import Request
use App\Models\Periksa;
use App\Models\User; // ✅ Import User
use Illuminate\Support\Facades\Auth; // ✅ Import Auth

class PeriksaPasienController extends Controller
{
    public function index()
    {
        // Menampilkan daftar periksa untuk pasien yang sedang login
        $periksa = Periksa::where('id_pasien', Auth::id())->get();
        return view('pasien.periksa.index', compact('periksa'));
    }

    public function create()
    {
        // Ambil user yang berperan sebagai dokter (contoh: role = 'dokter')
        $dokter = User::where('role', 'dokter')->get();
        return view('pasien.periksa.create', compact('dokter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required|exists:users,id',
        ]);

        Periksa::create([
            'id_pasien' => Auth::id(),
            'id_dokter' => $request->dokter_id,
            'tgl_periksa' => now(),
            'catatan' => '',
            'biaya_periksa' => 0,
        ]);

        return redirect()->route('periksa.index')->with('success', 'Pemeriksaan berhasil dibuat.');
    }
}