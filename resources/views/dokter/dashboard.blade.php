@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Dashboard Dokter</h2>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Jumlah Obat</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $jumlahObat }}</h5>
                </div>
            </div>
        </div>
    </div>

    <h4>Data Pemeriksaan</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Pasien</th>
                <th>Tanggal Periksa</th>
                <th>Catatan</th>
                <th>Biaya</th>
            </tr>
        </thead>
        <tbody>
            @foreach($periksas as $periksa)
            <tr>
                <td>{{ $periksa->pasien->name ?? 'Tidak Diketahui' }}</td>
                <td>{{ $periksa->tgl_periksa }}</td>
                <td>{{ $periksa->catatan }}</td>
                <td>Rp{{ number_format($periksa->biaya_periksa, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection