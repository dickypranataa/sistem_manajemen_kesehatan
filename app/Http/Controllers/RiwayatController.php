<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periksa;

class RiwayatController extends Controller
{
    public function index()
    {
        // Ambil semua data riwayat periksa
        $periksa = Periksa::all();

        // Kirim ke view
        return view('pasien.riwayat.index', compact('periksa'));
    }
}
