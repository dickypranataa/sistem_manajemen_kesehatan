<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Poli;
use App\Models\Obat;

class DashboardController extends Controller
{
    public function index()
    {
        $dokterCount = User::where('role', 'dokter')->count();
        $pasienCount = User::where('role', 'pasien')->count();
        $poliCount   = Poli::count();
        $obatCount   = Obat::count();

        return view('admin.dashboard', [
            'dokterCount' => $dokterCount,
            'pasienCount' => $pasienCount,
            'poliCount'   => $poliCount,
            'obatCount'   => $obatCount
        ]);
    }
}
