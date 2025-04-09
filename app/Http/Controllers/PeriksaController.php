<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periksa;

class PeriksaController extends Controller
{
    //
    public function index()
    {
        //menampilkan seluruh data table periksa
        $periksa = Periksa::all();
        return view('dokter/periksa.index', compact('periksa'));
    }


}
