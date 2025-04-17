<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    //
    public function index()
    {
        $obat = Obat::all();
        return view('dokter.obat.index', compact('obat'));
        
    }

    //fungsi untuk menampilkan form create
    public function create()
    {
        return view('dokter.obat.create');
    }

    //fungsi untuk tambah
    public function store(Request $request)
    {
        $request->validate([
            'name_obat' => 'required',
            'kemasan' => 'required',
            'harga' => 'required',
        ]);
        obat::create($request->all());
        return redirect()->route('dokter.obat.index')->with('success', 'Obat created successfully.');
    }

    //fungsi untuk edit
    public function edit(Obat $obat)
    {
        return view('dokter.obat.edit', compact('obat'));
    }

    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'name_obat' => 'required',
            'kemasan' => 'required',
            'harga' => 'required',
        ]);
        $obat->update($request->all());
        return redirect()->route('dokter.obat.index')->with('success', 'Obat updated successfully.');
    }

    //fungsi delete
    public function destroy(Obat $obat)
    {
        $obat->delete();
        return redirect()->route('dokter.obat.index')->with('success', 'Obat deleted successfully.');
    }

}
