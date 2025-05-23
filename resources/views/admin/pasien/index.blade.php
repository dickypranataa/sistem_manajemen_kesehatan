@extends('adminlte::page')

@section('title', 'Data Pasien')

@section('content_header')
<h1>Data Pasien</h1>
@stop

@section('content')
<a href="{{ route('admin.pasien.create') }}" class="btn btn-success mb-3">+ Tambah Pasien</a>

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. KTP</th>
            <th>No. HP</th>
            <th>No. RM</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pasiens as $pasien)
        <tr>
            <td>{{ $pasien->name }}</td>
            <td>{{ $pasien->alamat }}</td>
            <td>{{ $pasien->no_ktp }}</td>
            <td>{{ $pasien->no_hp }}</td>
            <td>{{ $pasien->no_rm }}</td>
            <td>
                <a href="{{ route('admin.pasien.edit', $pasien->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.pasien.destroy', $pasien->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop