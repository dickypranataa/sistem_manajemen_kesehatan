<?php

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RiwayatPasienController extends Controller
{
    // Menampilkan riwayat pasien yang telah diperiksa oleh dokter ini
    public function index()
    {
        //menampilkan data pasien dari tabel user
        $riwayatPasien = User::where('role', 'pasien')
            ->with(['periksaPasien' => function ($query) {
                $query->where('status', 'Selesai')
                    ->orderBy('created_at', 'desc');
            }])
            ->get();
        return view('dokter.riwayat.index', compact('riwayatPasien'));
    }
}