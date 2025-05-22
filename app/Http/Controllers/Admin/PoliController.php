<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarPoli;

class PoliController extends Controller
{
    public function index()
    {
        $polis = DaftarPoli::all();
        return view('admin.poli.index', compact('polis'));
    }

    public function create()
    {
        return view('admin.poli.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_poli' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        DaftarPoli::create($request->only('nama_poli', 'keterangan'));

        return redirect()->route('admin.poli.index')->with('success', 'Poli berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $poli = DaftarPoli::findOrFail($id);
        return view('admin.poli.edit', compact('poli'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_poli' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $poli = DaftarPoli::findOrFail($id);
        $poli->update($request->only('nama_poli', 'keterangan'));

        return redirect()->route('admin.poli.index')->with('success', 'Poli berhasil diupdate.');
    }

    public function destroy($id)
    {
        $poli = DaftarPoli::findOrFail($id);
        $poli->delete();

        return redirect()->route('admin.poli.index')->with('success', 'Poli berhasil dihapus.');
    }
}
