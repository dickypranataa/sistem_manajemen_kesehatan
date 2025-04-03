@extends('layouts.app')

{{-- Customize layout sections --}}
@section('subtitle', 'Welcome')

@section('content_body')
<div class="card">
    <div class="card-header">Riwayat Periksa</div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ID Pasien</th>
                    <th scope="col">ID Dokter</th>
                    <th scope="col">Tanggal Periksa</th>
                    <th scope="col">Catatan</th>
                    <th scope="col">Biaya Periksa</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- Data yang disimulasikan (static data) --}}
                <tr>
                    <th scope="row">1</th>
                    <td>101</td>
                    <td>201</td>
                    <td>2025-04-01</td>
                    <td>Pengobatan umum</td>
                    <td>200000</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        <form action="#" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>102</td>
                    <td>202</td>
                    <td>2025-04-02</td>
                    <td>Pemeriksaan darah</td>
                    <td>150000</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        <form action="#" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>103</td>
                    <td>203</td>
                    <td>2025-04-03</td>
                    <td>Konsultasi dokter spesialis</td>
                    <td>500000</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        <form action="#" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection