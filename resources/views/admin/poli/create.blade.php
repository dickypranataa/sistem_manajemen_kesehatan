@extends('adminlte::page')

@section('title', 'Tambah Poli')

@section('content_header')
<h1>Tambah Poli</h1>
@stop

@section('content')
<form action="{{ route('admin.poli.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Nama Poli</label>
        <input type="text" name="nama_poli" class="form-control" required value="{{ old('nama_poli') }}">
    </div>
    <div class="form-group">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.poli.index') }}" class="btn btn-secondary">Batal</a>
</form>
@stop