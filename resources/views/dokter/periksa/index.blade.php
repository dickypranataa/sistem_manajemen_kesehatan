@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Daftar Pasien yang Siap Diperiksa</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Pasien</th>
                <th>Tanggal Daftar</th>
                <th>Keluhan</th>
                <th>Catatan</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($periksaList as $periksa)
            <tr>
                <td>{{ $periksa->pasien->name }}</td>
                <td>{{ $periksa->created_at->format('d-m-Y') }}</td>
                <td>{{ $periksa->keluhan }}</td>
                <td>{{ $periksa->catatan }}</td>
                <td>{{ $periksa->total_harga }}</td>
                <td>{{ $periksa->status }}</td>
                <td>
                    @if($periksa->status == 'Belum diperiksa')
                    <a href="{{ route('dokter.periksa.edit', $periksa->id) }}" class="btn btn-success btn-sm">Periksa</a>
                    @elseif($periksa->status == 'Selesai')
                    <a href="{{ route('dokter.periksa.edit', $periksa->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    @endif
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection