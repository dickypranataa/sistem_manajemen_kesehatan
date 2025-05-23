@extends('adminlte::page')

@section('title', 'Edit Obat')

@section('content_header')
<h1>Edit Obat</h1>
@stop

@section('content')
<form action="{{ route('admin.obat.update', $obat->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Nama Obat</label>
        <input type="text" name="name_obat" class="form-control @error('name_obat') is-invalid @enderror" required value="{{ old('name_obat', $obat->name_obat) }}">
        @error('name_obat')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label>Kemasan</label>
        <input type="text" name="kemasan" class="form-control @error('kemasan') is-invalid @enderror" value="{{ old('kemasan', $obat->kemasan) }}">
        @error('kemasan')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" required min="0" value="{{ old('harga', $obat->harga) }}">
        @error('harga')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('admin.obat.index') }}" class="btn btn-secondary">Batal</a>
</form>
@stop