@extends('layouts.app')

{{-- Customize layout sections --}}
@section('subtitle', 'Riwayat Periksa')
@section('content_header_title', 'Riwayat')
@section('content_header_subtitle', 'Riwayat Pemeriksaan Anda')

@section('content_body')
<div class="card">
    <h3>INI HALAMAN PASIEN</h3>
    <div class="card-header">Riwayat Pemeriksaan</div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Dokter</th>
                    <th scope="col">Tanggal Periksa</th>
                    <th scope="col">Catatan</th>
                    <th scope="col">Biaya Periksa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($periksa as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->id_dokter }}</td> {{-- Bisa diganti jadi nama dokter jika relasi sudah ada --}}
                    <td>{{ $p->tgl_periksa }}</td>
                    <td>{{ $p->catatan }}</td>
                    <td>Rp {{ number_format($p->biaya_periksa, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection