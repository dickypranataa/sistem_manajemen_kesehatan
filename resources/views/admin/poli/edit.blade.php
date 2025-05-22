@extends('adminlte::page')

@section('title', 'Edit Poli')

@section('content_header')
<h1>Edit Poli</h1>
@stop

@section('content')
<form action="{{ route('admin.poli.update', $poli->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Nama Poli</label>
        <input type="text" name="nama_poli" class="form-control" required value="{{ old('nama_poli', $poli->nama_poli) }}">
    </div>
    <div class="form-group">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control">{{ old('keterangan', $poli->keterangan) }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('admin.poli.index') }}" class="btn btn-secondary">Batal</a>
</form>
@stop