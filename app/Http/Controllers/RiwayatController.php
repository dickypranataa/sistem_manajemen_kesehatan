<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periksa;
use App\Models\User; // 
use Illuminate\Support\Facades\Auth; //

class RiwayatController extends Controller
{
    public function index()
    {
        // Ambil ID user yang sedang login
        $userId = Auth::id();

        // Ambil semua data periksa milik user tersebut
        $periksa = Periksa::where('id_pasien', $userId)
            ->with('dokter') // supaya relasi dokter langsung terload
            ->get();

        // Kirim ke view
        return view('pasien.riwayat.index', compact('periksa'));
    }
}
