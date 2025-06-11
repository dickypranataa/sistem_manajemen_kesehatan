@extends('adminlte::page')

@section('title', 'Daftar Periksa Pasien')

@section('content_header')
<h1>Daftar Periksa</h1>
@stop

@section('content')
<div class="mb-3">
    <a href="{{ route('pasien.periksa.create') }}" class="btn btn-primary">+ Tambah Periksa</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Poli</th>
            <th>Dokter</th>
            <th>Hari</th>
            <th>Mulai</th>
            <th>Selesai</th>
            <th>Antrian</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($periksas as $index => $periksa)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $periksa->daftarPoli->poli->nama_poli ?? '-' }}</td>
            <td>{{ $periksa->daftarPoli->dokter->name ?? '-' }}</td>
            <td>{{ $periksa->daftarPoli->hari }}</td>
            <td>{{ $periksa->daftarPoli->jam_mulai }}</td>
            <td>{{ $periksa->daftarPoli->jam_selesai }}</td>
            <td>{{ $periksa->no_antrian ?? '-' }}</td>
            <td>{{ $periksa->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop