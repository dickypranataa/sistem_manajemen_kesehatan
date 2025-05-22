@extends('adminlte::page')

@section('title', 'Tambah Dokter')

@section('content_header')
<h1>Tambah Dokter</h1>
@stop

@section('content')
<form action="{{ route('admin.dokter.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}">
    </div>

    <div class="form-group">
        <label>No. Hp</label>
        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}">
    </div>

    <div class="form-group">
        <label>Poli</label>
        <select name="id_poli" class="form-control" required>
            <option value="">-- Pilih Poli --</option>
            @foreach ($polis as $poli)
            <option value="{{ $poli->id }}" {{ old('id_poli') == $poli->id ? 'selected' : '' }}>
                {{ $poli->nama_poli }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.dokter.index') }}" class="btn btn-secondary">Batal</a>
</form>
@stop