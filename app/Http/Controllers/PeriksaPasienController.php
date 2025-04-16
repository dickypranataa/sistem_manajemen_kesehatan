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
        $periksa = Periksa::where('id_pasien', Auth::id())->with('dokter')->get();
        $dokter = User::where('role', 'dokter')->get(); // kirim daftar dokter
        return view('pasien.periksa.index', compact('periksa', 'dokter'));
    }


    public function create()
    {
        // Ambil user yang berperan sebagai dokter (contoh: role = 'dokter')
        $dokter = User::where('role', 'dokter')->get();
        return view('pasien.periksa.index', compact('dokter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required|exists:users,id',
        ]);

        Periksa::create([
            'id_pasien' => Auth::id(),
            'id_dokter' => $request->dokter_id,
        ]);

        return redirect()->route('periksa.index')->with('success', 'Pemeriksaan berhasil dibuat.');
    }
}