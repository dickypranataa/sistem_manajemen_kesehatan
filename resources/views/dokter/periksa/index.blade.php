@extends('layouts.app')

{{-- Customize layout sections --}}
@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Welcome')

@section('content_body')
<div class="card">
    <h3>INI HALAMAN DOKTER</h3>
    <div class="card-header">Periksa</div>
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
                @foreach ($periksa as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->id_pasien }}</td>
                    <td>{{ $p->id_dokter }}</td>
                    <td>{{ $p->tgl_periksa }}</td>
                    <td>{{ $p->catatan }}</td>
                    <td>{{ $p->biaya_periksa }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection