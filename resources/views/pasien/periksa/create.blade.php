@extends('adminlte::page')

@section('title', 'Pendaftaran Periksa')

@section('content_header')
<h1>Pendaftaran Periksa Pasien</h1>
@stop

@section('content')

<form method="GET" action="{{ route('pasien.periksa.create') }}" class="mb-3">
    <div class="form-group">
        <label for="poli_id">Pilih Poli</label>
        <select class="form-control" id="poli_id" name="poli_id" required onchange="this.form.submit()">
            <option value="">-- Pilih Poli --</option>
            @foreach($polis as $poli)
            <option value="{{ $poli->id }}" {{ $poliTerpilih == $poli->id ? 'selected' : '' }}>
                {{ $poli->nama_poli }}
            </option>
            @endforeach
        </select>
    </div>
</form>

{{-- Form untuk submit data periksa --}}
<form action="{{ route('pasien.periksa.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="no_rm">Nomor Rekam Medis</label>
        <input type="text" class="form-control" id="no_rm" name="no_rm" value="{{ $no_rm }}" readonly>
    </div>

    <div class="form-group">
        <label for="daftar_poli_id">Pilih Jadwal</label>
        <select class="form-control" id="daftar_poli_id" name="daftar_poli_id" required>
            <option value="">-- Pilih Jadwal --</option>
            @foreach($jadwals as $jadwal)
            <option value="{{ $jadwal->id }}">
                {{ $jadwal->hari }} ({{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }})
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="keluhan">Keluhan</label>
        <textarea class="form-control" name="keluhan" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@stop