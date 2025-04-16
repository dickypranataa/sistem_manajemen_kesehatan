@extends('layouts.app')

@section('subtitle', 'Periksa')
@section('content_header_title', 'Form Pemeriksaan')
@section('content_header_subtitle', 'Input Nama Pasien dan Pilih Dokter')

@section('content_body')
{{-- Form Pemeriksaan --}}
<div class="card mb-4">
    <div class="card-header">Form Pemeriksaan</div>
    <div class="card-body">
        <form method="POST" action="{{ route('periksa.store') }}">
            @csrf

            {{-- Nama Pasien (otomatis dari Auth) --}}
            <div class="mb-3">
                <label for="nama_pasien" class="form-label">Nama Pasien</label>
                <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
            </div>

            {{-- Pilih Dokter --}}
            <div class="mb-3">
                <label for="dokter_id" class="form-label">Pilih Dokter</label>
                <select name="dokter_id" id="dokter_id" class="form-select" required>
                    <option value="">-- Pilih Dokter --</option>
                    @foreach($dokter as $d)
                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Pemeriksaan</button>
        </form>
    </div>
</div>

@endsection