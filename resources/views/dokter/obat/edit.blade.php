@extends('layouts.app')


@section('title', 'Edit Obat')
@section('content_header')
<h1>Edit Obat</h1>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('obat.update', $obat->id) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- harus ada di form untuk proteksi, biar gaada anomali--}}
            <div class="form-group">
                <label for="nama">Nama obat</label>
                <input type="text" name="name_obat" id="nama" placeholder="Nama obat" class="form-control" value="{{ $obat->nama_obat }}" required>
            </div>
            <div class="form-group">
                <label for="nama">Kemasan</label>
                {{-- ambil template option di bawah ini di adminLTE nya https://jeroennoten.github.io/Laravel-AdminLTE/ -> components -> basic form components --}}
                <x-adminlte-select name="kemasan">
                    <option value="Sachet" {{ $obat->kemasan === 'pill' ? 'selected' : '' }}>Pill</option>
                    <option value="Sachet" {{ $obat->kemasan === 'sachet' ? 'selected' : '' }}>Sachet</option>
                    <option value="Sachet" {{ $obat->kemasan === 'botol' ? 'selected' : '' }}>Botol</option>
                </x-adminlte-select>
            </div>
            <div class="form-group">
                <label for="nama">Harga</label>
                <input type="number" name="harga" id="harga" placeholder="Harga obat" class="form-control" value={{ $obat->harga }} required>
            </div>
            <div class="wrappper d-flex justify-content-end" style="gap:10px;">
                <button type="submit" class="btn btn-success">Ubah</button>
                <a href="{{route('obat.index')}}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection