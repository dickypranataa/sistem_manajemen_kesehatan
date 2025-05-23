@extends('adminlte::page')

@section('title', 'Tambah Pasien')

@section('content_header')
<h1>Tambah Pasien</h1>
@stop

@section('content')
<form action="{{ route('admin.pasien.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Nama Pasien</label>
        <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}">
    </div>

    <div class="form-group">
        <label>Nomor KTP</label>
        <input type="text" name="no_ktp" class="form-control" value="{{ old('no_ktp') }}">
    </div>

    <div class="form-group">
        <label>Nomor HP</label>
        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}">
    </div>

    <div class="form-group">
        <label>Nomor RM (Akan diisi otomatis)</label>
        <input type="text" class="form-control" value="Akan dibuat otomatis" disabled>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.pasien.index') }}" class="btn btn-secondary">Batal</a>
</form>
@stop