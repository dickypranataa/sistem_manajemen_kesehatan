<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Periksa;
use App\Models\Obat;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user(); 

        if (!$user) {
            return redirect()->route('login'); // Jika user tidak ditemukan, arahkan ke halaman login
        }

        if ($user->role === 'dokter') {
            $dokterId = $user->id;
            $jumlahObat = Obat::count();

            $periksas = Periksa::with('pasien')
                ->where('id_dokter', $dokterId)
                ->get();

            return view('dokter.dashboard', compact('periksas', 'jumlahObat'));
        } elseif ($user->role === 'pasien') {
            return view('pasien.dashboard');
        } elseif ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        


        return view('home');
    }
}
