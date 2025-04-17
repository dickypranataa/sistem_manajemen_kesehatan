<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periksa;
use App\Models\Obat;
use Illuminate\Support\Facades\Auth;


class PeriksaController extends Controller
{
    //
    public function index()
    {
        $periksa = Periksa::with('pasien')->where('id_dokter', Auth::id())->get();
        return view('dokter/periksa.index', compact('periksa'));
    }

    public function edit(Periksa $periksa)
    {
        $obat = Obat::all(); // ambil semua obat
        $selectedObats = $periksa->obats->pluck('id')->toArray(); // ambil obat yg sudah dipilih
        return view('dokter.periksa.edit', compact('periksa', 'obat', 'selectedObats'));
    }


    public function update(Request $request, Periksa $periksa)
    {
        $request->validate([
            'tgl_periksa' => 'required',
            'catatan' => 'required',
            'biaya_periksa' => 'required',
            'obat_id' => 'array',
        ]);

        $periksa->update($request->only(['tgl_periksa', 'catatan', 'biaya_periksa']));
        $periksa->obats()->sync($request->obat_id); // update obat yang dipilih

        return redirect()->route('dokter.periksa.index')->with('success', 'Periksa updated successfully.');
    }
}
