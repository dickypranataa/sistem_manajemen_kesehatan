@extends('adminlte::page')

@section('title', 'Daftar Dokter')

@section('content_header')
<h1>Daftar Dokter</h1>
<a href="{{ route('admin.dokter.create') }}" class="btn btn-primary mb-3">Tambah Dokter</a>
@stop

@section('content')
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. Hp</th>
            <th>Poli</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dokters as $dokter)
        <tr>
            <td>{{ $dokter->name }}</td>
            <td>{{ $dokter->alamat }}</td>
            <td>{{ $dokter->no_hp }}</td>
            <td>{{ $dokter->poli ? $dokter->poli->nama_poli : '-' }}</td>
            <td>
                <a href="{{ route('admin.dokter.edit', $dokter->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.dokter.destroy', $dokter->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus dokter ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop