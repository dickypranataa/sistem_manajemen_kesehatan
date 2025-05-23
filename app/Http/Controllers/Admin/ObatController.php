<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Obat;

class ObatController extends Controller
{
    // Tampilkan daftar obat
    public function index()
    {
        $obats = Obat::all();
        return view('admin.obat.index', compact('obats'));
    }

    // Tampilkan form tambah obat
    public function create()
    {
        return view('admin.obat.create');
    }

    // Simpan data obat baru
    public function store(Request $request)
    {
        $request->validate([
            'name_obat' => 'required|string|max:255',
            'kemasan'   => 'nullable|string|max:255',
            'harga'     => 'required|numeric|min:0',
        ]);

        Obat::create([
            'name_obat' => $request->name_obat,
            'kemasan'   => $request->kemasan,
            'harga'     => $request->harga,
        ]);

        return redirect()->route('admin.obat.index')->with('success', 'Obat berhasil ditambahkan.');
    }

    // Tampilkan form edit obat
    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('admin.obat.edit', compact('obat'));
    }

    // Update data obat
    public function update(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);

        $request->validate([
            'name_obat' => 'required|string|max:255',
            'kemasan'   => 'nullable|string|max:255',
            'harga'     => 'required|numeric|min:0',
        ]);

        $obat->update([
            'name_obat' => $request->name_obat,
            'kemasan'   => $request->kemasan,
            'harga'     => $request->harga,
        ]);

        return redirect()->route('admin.obat.index')->with('success', 'Obat berhasil diperbarui.');
    }

    // Hapus data obat
    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect()->route('admin.obat.index')->with('success', 'Obat berhasil dihapus.');
    }
}
