@extends('adminlte::page')

@section('title', isset($pasien) ? 'Edit Pasien' : 'Tambah Pasien')

@section('content_header')
<h1>{{ isset($pasien) ? 'Edit Pasien' : 'Tambah Pasien' }}</h1>
@stop

@section('content')
<form action="{{ isset($pasien) ? route('admin.pasien.update', $pasien->id) : route('admin.pasien.store') }}" method="POST">
    @csrf
    @if (isset($pasien))
    @method('PUT')
    @endif

    <div class="form-group">
        <label>Nama Pasien</label>
        <input type="text" name="name" class="form-control" required value="{{ old('name', $pasien->name ?? '') }}">
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $pasien->alamat ?? '') }}">
    </div>

    <div class="form-group">
        <label>Nomor KTP</label>
        <input type="text" name="no_ktp" class="form-control" value="{{ old('no_ktp', $pasien->no_ktp ?? '') }}">
    </div>

    <div class="form-group">
        <label>Nomor HP</label>
        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $pasien->no_hp ?? '') }}">
    </div>

    <div class="form-group">
        <label>Nomor RM</label>
        <input type="text" name="no_rm" class="form-control" value="{{ old('no_rm', $pasien->no_rm ?? '') }}">
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.pasien.index') }}" class="btn btn-secondary">Batal</a>
</form>
@stop