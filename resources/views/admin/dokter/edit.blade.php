@extends('adminlte::page')

@section('title', 'Edit Dokter')

@section('content_header')
<h1>Edit Dokter</h1>
@stop

@section('content')
<form action="{{ route('admin.dokter.update', $dokter->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" required value="{{ old('name', $dokter->name) }}">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required value="{{ old('email', $dokter->email) }}">
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $dokter->alamat) }}">
    </div>

    <div class="form-group">
        <label>No. Hp</label>
        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $dokter->no_hp) }}">
    </div>

    <div class="form-group">
        <label>Poli</label>
        <select name="id_poli" class="form-control" required>
            <option value="">-- Pilih Poli --</option>
            @foreach ($polis as $poli)
            <option value="{{ $poli->id }}" {{ old('id_poli', $dokter->id_poli) == $poli->id ? 'selected' : '' }}>
                {{ $poli->nama_poli }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Password (kosongkan jika tidak ingin mengganti)</label>
        <input type="password" name="password" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('admin.dokter.index') }}" class="btn btn-secondary">Batal</a>
</form>
@stop