@extends('layouts.app')

@section('subtitle', 'Periksa')
@section('content_header_title', 'Form Pemeriksaan')
@section('content_header_subtitle', 'Input Nama Pasien dan Pilih Dokter')

@section('content_body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">{{ __('Form Pemeriksaan') }}</div>

                <div class="card-body">
                    <form method="POST" action="#">
                        @csrf

                        {{-- Nama Pasien --}}
                        <div class="mb-3">
                            <label for="nama_pasien" class="form-label">Nama Pasien</label>
                            <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" placeholder="Masukkan nama pasien" required>
                        </div>

                        {{-- Pilih Dokter --}}
                        <div class="mb-3">
                            <label for="dokter_id" class="form-label">Pilih Dokter</label>
                            <select name="dokter_id" id="dokter_id" class="form-select" required>
                                <option value="">-- Pilih Dokter --</option>
                                {{-- Contoh statis, nanti tinggal diganti dinamis --}}
                                <option value="6">Dicky - dicky123@gmail.com</option>
                                <option value="8">Dr. Contoh - contoh@email.com</option>
                            </select>
                        </div>

                        {{-- Submit --}}
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection