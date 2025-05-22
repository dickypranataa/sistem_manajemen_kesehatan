<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DaftarPoli;
use App\Models\Poli;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    /**
     * Tampilkan daftar dokter.
     */
    public function index()
    {
        $dokters = User::with('poli')->where('role', 'dokter')->get();
        return view('admin.dokter.index', compact('dokters'));
    }

    /**
     * Tampilkan form tambah dokter.
     */
    public function create()
    {
        $polis = Poli::all(); // ganti ke model yang sesuai dengan tabel `poli`
        return view('admin.dokter.create', compact('polis'));
    }

    /**
     * Simpan data dokter baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6|confirmed',
            'alamat'    => 'nullable|string',
            'no_hp'     => 'nullable|string|max:255',
            'id_poli'   => 'nullable|exists:poli,id',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'alamat'   => $request->alamat,
            'no_hp'    => $request->no_hp,
            'id_poli'  => $request->id_poli,
            'role'     => 'dokter',
        ]);

        return redirect()->route('admin.dokter.index')->with('success', 'Dokter berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit dokter.
     */
    public function edit($id)
    {
        $dokter = User::findOrFail($id);
        $polis = Poli::all();
        return view('admin.dokter.edit', compact('dokter', 'polis'));
    }

    /**
     * Update data dokter.
     */
    public function update(Request $request, $id)
    {
        $dokter = User::findOrFail($id);

        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $dokter->id,
            'password'  => 'nullable|min:6|confirmed',
            'alamat'    => 'nullable|string',
            'no_hp'     => 'nullable|string|max:255',
            'id_poli'   => 'nullable|exists:poli,id',
        ]);

        $dokter->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'alamat'   => $request->alamat,
            'no_hp'    => $request->no_hp,
            'id_poli'  => $request->id_poli,
            'role'     => 'dokter',
            'password' => $request->password ? Hash::make($request->password) : $dokter->password,
        ]);

        return redirect()->route('admin.dokter.index')->with('success', 'Dokter berhasil diperbarui.');
    }

    /**
     * Hapus data dokter.
     */
    public function destroy($id)
    {
        $dokter = User::findOrFail($id);
        $dokter->delete();

        return redirect()->route('admin.dokter.index')->with('success', 'Dokter berhasil dihapus.');
    }
}
