<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Periksa;

class DashboardPasienController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pasienId = $user->id;

        // Mengambil riwayat periksa berdasarkan ID pasien
        $riwayatPeriksa = Periksa::where('id_pasien', $pasienId)->get();

        return view('pasien.dashboard', compact('riwayatPeriksa'));
    }
}
