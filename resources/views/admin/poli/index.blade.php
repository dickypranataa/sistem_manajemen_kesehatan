@extends('adminlte::page')

@section('title', 'Daftar Poli')

@section('content_header')
<h1>Daftar Poli</h1>
<a href="{{ route('admin.poli.create') }}" class="btn btn-primary mb-3">Tambah Poli</a>
@stop

@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nama Poli</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($polis as $poli)
        <tr>
            <td>{{ $poli->nama_poli }}</td>
            <td>{{ $poli->keterangan }}</td>
            <td>
                <a href="{{ route('admin.poli.edit', $poli->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.poli.destroy', $poli->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus poli ini?')">
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