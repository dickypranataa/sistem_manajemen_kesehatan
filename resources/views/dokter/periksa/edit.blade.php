@extends('layouts.app')

@section('subtitle', 'Edit Pemeriksaan')
@section('content_header_title', 'Edit Pemeriksaan')
@section('content_header_subtitle', 'Isi data hasil pemeriksaan')

@section('content_body')
<div class="card">
    <div class="card-header">Form Edit Pemeriksaan</div>
    <div class="card-body">
        <form action="{{ route('dokter.periksa.update', $periksa->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Tanggal Periksa --}}
            <div class="mb-3">
                <label for="tgl_periksa" class="form-label">Tanggal Periksa</label>
                <input type="datetime-local" name="tgl_periksa" id="tgl_periksa" class="form-control"
                    value="{{ old('tgl_periksa', $periksa->tgl_periksa ? date('Y-m-d\TH:i', strtotime($periksa->tgl_periksa)) : '') }}" required>
            </div>

            {{-- Catatan --}}
            <div class="mb-3">
                <label for="catatan" class="form-label">Catatan</label>
                <textarea name="catatan" id="catatan" class="form-control" rows="3" required>{{ old('catatan', $periksa->catatan) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="obat_id" class="form-label">Obat yang Diberikan</label>
                <div class="form-control p-3" style="height:auto">
                    @foreach($obat as $o)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="obat_id[]" value="{{ $o->id }}"
                            id="obat_{{ $o->id }}"
                            {{ in_array($o->id, $selectedObats) ? 'checked' : '' }}>
                        <label class="form-check-label" for="obat_{{ $o->id }}">
                            {{ $o->name_obat }} - Rp {{ number_format($o->harga, 0, ',', '.') }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>


            {{-- Biaya Periksa --}}
            <div class="mb-3">
                <label for="biaya_periksa" class="form-label">Biaya Periksa (Rp)</label>
                <input type="number" name="biaya_periksa" id="biaya_periksa" class="form-control"
                    value="{{ old('biaya_periksa', $periksa->biaya_periksa) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('dokter.periksa.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection