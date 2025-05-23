<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = User::where('role', 'pasien')->get();
        return view('admin.pasien.index', compact('pasiens'));
    }

    public function create()
    {
        return view('admin.pasien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'alamat'  => 'nullable|string',
            'no_ktp'  => 'nullable|string|max:50',
            'no_hp'   => 'nullable|string|max:50',
            // 'no_rm' dihapus dari validasi karena tidak diinput manual
        ]);

        // Generate nomor RM otomatis, format RM + 5 digit angka
        $lastUser = User::where('role', 'pasien')
            ->orderBy('no_rm', 'desc')
            ->first();

        if ($lastUser && preg_match('/RM(\d+)/', $lastUser->no_rm, $matches)) {
            $number = intval($matches[1]) + 1;
        } else {
            $number = 1;
        }

        $no_rm = 'RM' . str_pad($number, 5, '0', STR_PAD_LEFT);

        User::create([
            'name'    => $request->name,
            'alamat'  => $request->alamat,
            'no_ktp'  => $request->no_ktp,
            'no_hp'   => $request->no_hp,
            'no_rm'   => $no_rm,
            'role'    => 'pasien',
            'email'   => ($request->no_ktp ?: uniqid()) . '@mail.com', 
            'password' => bcrypt('password'), // default password
        ]);

        return redirect()->route('admin.pasien.index')->with('success', 'Pasien berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $pasien = User::findOrFail($id);
        return view('admin.pasien.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        $pasien = User::findOrFail($id);

        $request->validate([
            'name'    => 'required|string|max:255',
            'alamat'  => 'nullable|string',
            'no_ktp'  => 'nullable|string|max:50',
            'no_hp'   => 'nullable|string|max:50',
            'no_rm'   => 'nullable|string|max:50',
        ]);

        $pasien->update([
            'name'    => $request->name,
            'alamat'  => $request->alamat,
            'no_ktp'  => $request->no_ktp,
            'no_hp'   => $request->no_hp,
            'no_rm'   => $request->no_rm,
        ]);

        return redirect()->route('admin.pasien.index')->with('success', 'Pasien berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pasien = User::findOrFail($id);
        $pasien->delete();

        return redirect()->route('admin.pasien.index')->with('success', 'Pasien berhasil dihapus.');
    }
}
