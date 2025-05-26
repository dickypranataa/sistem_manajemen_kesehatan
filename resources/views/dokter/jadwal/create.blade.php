@extends('adminlte::page')

@section('title', 'Tambah Jadwal Periksa')

@section('content_header')
<h1>Tambah Jadwal Periksa</h1>
@stop

@section('content')
<form action="{{ route('dokter.jadwal.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="hari">Hari</label>
        <select name="hari" id="hari" class="form-control @error('hari') is-invalid @enderror" required>
            <option value="" disabled selected>Pilih Hari</option>
            @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
            <option value="{{ $hari }}" {{ old('hari') == $hari ? 'selected' : '' }}>{{ $hari }}</option>
            @endforeach
        </select>
        @error('hari')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="jam_mulai">Jam Mulai</label>
        <input type="time" name="jam_mulai" id="jam_mulai" class="form-control @error('jam_mulai') is-invalid @enderror" value="{{ old('jam_mulai') }}" required>
        @error('jam_mulai')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="jam_selesai">Jam Selesai</label>
        <input type="time" name="jam_selesai" id="jam_selesai" class="form-control @error('jam_selesai') is-invalid @enderror" value="{{ old('jam_selesai') }}" required>
        @error('jam_selesai')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="tutup" {{ old('status') == 'tutup' ? 'selected' : '' }}>Tutup</option>
        </select>
        @error('status')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
    <a href="{{ route('dokter.jadwal.index') }}" class="btn btn-secondary">Batal</a>
</form>
@stop