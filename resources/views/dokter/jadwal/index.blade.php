@extends('adminlte::page')

@section('title', 'Daftar Jadwal Periksa')

@section('content_header')
<h1>Daftar Jadwal Periksa</h1>
@stop

@section('content')
<a href="{{ route('dokter.jadwal.create') }}" class="btn btn-primary mb-3">+ Tambah Jadwal</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Hari</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jadwals as $index => $jadwal)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $jadwal->hari }}</td>
            <td>{{ $jadwal->jam_mulai }}</td>
            <td>{{ $jadwal->jam_selesai }}</td>
            <td>{{ $jadwal->status }}</td>
            <td>
                <a href="{{ route('dokter.jadwal.edit', $jadwal->id) }}" class="btn btn-warning btn-sm">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop