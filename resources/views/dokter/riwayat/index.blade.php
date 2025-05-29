@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Daftar Pasien</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>No. KTP</th>
                <th>No. Telepon</th>
                <th>No. RM</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pasienList as $pasien)
            <tr>
                <td>{{ $pasien->name }}</td>
                <td>{{ $pasien->alamat ?? '-' }}</td>
                <td>{{ $pasien->no_ktp ?? '-' }}</td>
                <td>{{ $pasien->no_hp ?? '-' }}</td>
                <td>{{ $pasien->no_rm ?? '-' }}</td>
                <td>
                    <a href="{{ route('dokter.riwayat.show', $pasien->id) }}" class="btn btn-info btn-sm">Detail Riwayat</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada pasien terdaftar.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection