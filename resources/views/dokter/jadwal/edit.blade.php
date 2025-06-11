@extends('adminlte::page')

@section('title', 'Tambah Jadwal Periksa')

@section('content_header')
<h1>Tambah Jadwal Periksa</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('dokter.jadwal.update', $jadwal->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Hari (Readonly) --}}
            <div class="form-group">
                <label for="hari">Hari</label>
                <input type="text" class="form-control" value="{{ $jadwal->hari }}" readonly>
            </div>

            {{-- Jam Mulai (Readonly) --}}
            <div class="form-group">
                <label for="jam_mulai">Jam Mulai</label>
                <input type="time" class="form-control" value="{{ $jadwal->jam_mulai }}" readonly>
            </div>

            {{-- Jam Selesai (Readonly) --}}
            <div class="form-group">
                <label for="jam_selesai">Jam Selesai</label>
                <input type="time" class="form-control" value="{{ $jadwal->jam_selesai }}" readonly>
            </div>

            {{-- Status (Editable) --}}
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                    <option value="aktif" {{ old('status', $jadwal->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="tutup" {{ old('status', $jadwal->status) == 'tutup' ? 'selected' : '' }}>Tutup</option>
                </select>
                @error('status')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('dokter.jadwal.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@stop